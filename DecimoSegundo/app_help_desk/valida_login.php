﻿<?php
	//valida_login e arquivo deve ser mantido fora do htdocs
    session_start();


    //varivael de autentificao de usuario
    $usuario_autentificado = false;
    $usuario_id = null;


    //criando um grupo
    $perfis = array(1 => 'Administrativo', 2 => 'Usuario');
    $usuario_perfil_id = null;


    // usuarios do sistema
    $usuarios_app = array(
        array('id'=> 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id'=> 2, 'email' => 'user@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id'=> 3, 'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
        array('id'=> 4, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
        

    );

    //percorrendo o array usuarios
    foreach($usuarios_app as $user){
        //comparando os dados recebidos
        //verficando
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autentificado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($usuario_autentificado){
        echo 'Usuario autentificado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
    }


?>