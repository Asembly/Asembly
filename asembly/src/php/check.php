<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);


    if(mb_strlen($login) < 5 || mb_strlen($login) > 10){
        echo "Ваш логин некорректно написан";
        exit();
    }
    else if(mb_strlen($email) < 4 || mb_strlen($email) > 40){
        echo "Ваша почта некорректно написана";
        exit();
    }
    else if(mb_strlen($password) < 5 || mb_strlen($password) > 10){
        echo "Ваш пароль не соответствует нашему регламенту";
        exit();
    }

    $password = md5($password + "qwerty");

    $mysql = new mysqli('sql305.byetcluster.com','epiz_31553304','DSFiJICfcO6','epiz_31553304_reg');
    $mysql->query("INSERT INTO `registration` (`login`,`email`,`password`) VALUES('$login','$email','$password')");
    $mysql->close();

    header('Location: /');
?>