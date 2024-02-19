<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberNinjas - Личный кабинет</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="personal_area">
            <div class="container personal_area_block">
                <form action="php-handler/personal_edit.php" class="personal_area_block_form" method="post">
                    <h2 class="personal_area_block_form_title">Персональные данные</h2>
                    <span class="personal_area_block_form_txt">Эти данные необходимы, чтобы автоматически заполнять соответствующие поля и ускорять процесс бронирования</span>
                    <div class="personal_area_block_form_block">
                        <div class="personal_area_block_form_block_item">
                            <label   class="personal_area_block_form_block_item_label">Фамилия</label>
                            <input type="text" class="personal_area_block_form_block_item_input" name="second_name" value="<?php echo $_SESSION['second_name'] ?>" required>
                        </div>
                        <div class="personal_area_block_form_block_item">
                            <label   class="personal_area_block_form_block_item_label">Имя</label>
                            <input type="text" class="personal_area_block_form_block_item_input" name="first_name" value="<?php echo $_SESSION['first_name'] ?>" required>
                        </div>
                        <div class="personal_area_block_form_block_item">
                            <label  class="personal_area_block_form_block_item_label">Дата рождения</label>
                            <input type="date" class="personal_area_block_form_block_item_input" name="birthday" value="<?php echo $_SESSION['birthday'] ?>" required>
                        </div>
                        <div class="personal_area_block_form_block_item">
                            <label  class="personal_area_block_form_block_item_label">Номер телефона</label>
                            <input type="tel" class="personal_area_block_form_block_item_input" name="phone_number" value="<?php echo $_SESSION['phone_number'] ?>" required>
                        </div>
                        <div class="personal_area_block_form_block_item">
                            <label  class="personal_area_block_form_block_item_label">Электронный адрес</label>
                            <input type="email" class="personal_area_block_form_block_item_input" name="email_address" value="<?php echo $_SESSION['email_address'] ?>" required>
                        </div>
                        <div class="personal_area_block_form_block_item">
                            <label  class="personal_area_block_form_block_item_label">Пароль</label>
                            <input type="password" class="personal_area_block_form_block_item_input" name="password" value="<?php echo $_SESSION['password'] ?>" required disabled>
                        </div>
                        <button class="personal_area_block_form_block_btn" type="submit"><span class="personal_area_block_form_block_btn_txt">Сохранить</span></button>
                    </div>
                </form>
                <a class="personal_area_block_exit" href="php-handler/session_exit.php">Выйти</a>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/password_form.php";
        include "php-handler/booking_form.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
</body>
</html>