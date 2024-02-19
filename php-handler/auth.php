<?php
    session_start();
    include "../php-connect/connect.php";
    if(isset($_POST['submit'])) {
        if(isset($_POST['email_address'])) {
            $email_address = $_POST['email_address'];
            if ($email_address === '') {
                unset($email_address);
            }
        }
        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            if ($password === '') {
                unset($password);
            }
        }
    }
    
    $email_address = trim($_POST['email_address']);
    $password = trim($_POST['password']);

    $check_user = "SELECT * FROM `users` WHERE `email_address` = '$email_address'";
    $result = mysqli_query($connect, $check_user);
    $info_user = mysqli_fetch_array($result);

    $check_admin = "SELECT * FROM `admins` WHERE `email_address` = '$email_address'";
    $result = mysqli_query($connect, $check_admin);
    $info_admin = mysqli_fetch_array($result);

    if((empty($info_user['id_user'])) and (empty($info_admin['id_admin']))){
        $_SESSION['message'] = 'Неправильный адрес или пароль!';
        header("location: ../index.php");
    } elseif((!empty($info_user['id_user'])) and (password_verify($password,$info_user['password']))) {
        $_SESSION['id_user'] = $info_user['id_user'];
        $_SESSION['second_name'] = $info_user['second_name'];
        $_SESSION['first_name'] = $info_user['first_name'];
        $_SESSION['birthday'] = $info_user['birthday'];
        $_SESSION['phone_number'] = $info_user['phone_number'];
        $_SESSION['email_address'] = $info_user['email_address'];
        $_SESSION['password'] = $info_user['password'];
        header("location: ../personal_area.php");
    } elseif((!empty($info_admin['id_admin'])) and (password_verify($password,$info_admin['password']))) {
        $_SESSION['id_admin'] = $info_admin['id_admin'];
        $_SESSION['second_name'] = $info_admin['second_name'];
        $_SESSION['first_name'] = $info_admin['first_name'];
        $_SESSION['phone_number'] = $info_admin['phone_number'];
        $_SESSION['email_address'] = $info_admin['email_address'];
        $_SESSION['password'] = $info_admin['password'];
        header("location: ../admin_area.php");
    } else {
        $_SESSION['message'] = 'Неправильный пароль!';
        header("location: ../index.php");
    }
?>