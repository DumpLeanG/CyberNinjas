<?php
    session_start();
    include "../php-connect/connect.php";
    
    $id_tournament = $_SESSION['id_tournament'];
    $first_name = $_POST['captain_firstname'];
    $second_name = $_POST['captain_secondname'];
    $email_address = $_POST['captain_email'];
    $phone_number = $_POST['captain_phone'];
    if (isset($_POST['team'])) {
        $team = $_POST['team'];
        if($team === '') {
            unset($team);
        }
    }
    $team = trim($_POST['team']);

    if (isset($_POST['captain_firstname'])) {
        $first_name = $_POST['captain_firstname'];
        if($first_name === '') {
            unset($first_name);
        }
    }
    $first_name = trim($_POST['captain_firstname']);

    if (isset($_POST['captain_secondname'])) {
        $second_name = $_POST['captain_secondname'];
        if($second_name === '') {
            unset($second_name);
        }
    }
    $second_name = trim($_POST['captain_secondname']);

    if (isset($_POST['captain_email'])) {
        $email_address = $_POST['captain_email'];
        if($email_address === '') {
            unset($email_address);
        }
    }
    $email_address = trim($_POST['captain_email']);

    if (isset($_POST['captain_phone'])) {
        $phone_number = $_POST['captain_phone'];
        if($phone_number === '') {
            unset($phone_number);
        }
    }
    $phone_number = trim($_POST['captain_phone']);

    $select_user = "SELECT `id_user` FROM `users` WHERE `first_name` = '$first_name' and `second_name` = '$second_name' and `email_address` = '$email_address' and `phone_number` = '$phone_number';";
    $user_result = mysqli_query($connect, $select_user);
    $info_users = mysqli_fetch_array($user_result);

    if (isset($info_users['id_user'])) {
        $id_user = $info_users['id_user'];
        $create_line = "INSERT INTO `tournament_participants`(`id_tournament`, `team`, `id_user`) VALUES ('$id_tournament', '$team', '$id_user')";
        addslashes($create_line);
        $create_result = mysqli_query($connect, $create_line) or die(mysqli_error($connect));
        echo "<script>alert('Успешная аренда!'); window.location.href='../index.php';</script>";
    } else {
        $previous = $_SERVER['HTTP_REFERER'];
        echo "<script>alert('Несуществующий пользователь!'); window.location.href='$previous';</script>";
    }
?>