<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberNinjas - Главная</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="contacts">
            <div class="container contacts_block">
                <h2 class="contacts_block_title">контакты</h2>
                <ul class="contacts_block_list">
                    <li class="contacts_block_list_item contacts_block_list_item1">
                        <div class="contacts_block_list_item1_text">
                            <h3 class="contacts_block_list_item1_text_title">Напишите нам</h3>
                            <span class="contacts_block_list_item1_text_txt">Если вы хотите поделиться своим мнением</span>
                            <span class="contacts_block_list_item1_text_email">helpguests@cyberninjas.ru</span>
                        </div>
                        <img src="assets/images/logoicon.svg" alt="" class="contacts_block_list_item1_img">
                    </li>
                    <li class="contacts_block_list_item contacts_block_list_item2">
                        <div class="contacts_block_list_item2_text">
                            <h3 class="contacts_block_list_item2_text_title">Управляющая компания CYBER NINJAS</h3>
                            <span class="contacts_block_list_item2_text_txt">г. Москва, Пресненская Набережная 12, БЦ башня Федерация (башня Восток), 33 этаж с 10:00 до 20:00</span>
                            <div class="contacts_block_list_item2_text_box">
                                <span class="contacts_block_list_item2_text_box_phone">+7 968 785-03-03</span>
                                <span class="contacts_block_list_item2_text_box_email">info@colizeum.ru</span>
                            </div>
                            <span class="contacts_block_list_item2_text_time">с 10:00 до 20:00</span>
                        </div>
                    </li>
                    <li class="contacts_block_list_item contacts_block_list_item3">
                        <div class="contacts_block_list_item3_text">
                            <h3 class="contacts_block_list_item3_text_title">РЕКЛАМОДАТЕЛЯМ</h3>
                            <span class="contacts_block_list_item3_text_txt">Размещение рекламы в клубах</span>
                            <span class="contacts_block_list_item3_text_phone">+7 968 785-03-05</span>
                            <span class="contacts_block_list_item3_text_email">commercial@cyberninjas.ru</span>
                        </div>
                    </li>
                    <li class="contacts_block_list_item contacts_block_list_item4">
                        <div class="contacts_block_list_item4_text">
                            <h3 class="contacts_block_list_item4_text_title">АДРЕСА И КОНТАКТЫ КЛУБОВ</h3>
                            <button class="contacts_block_list_item4_text_btn"><span class="contacts_block_list_item4_text_btn_txt">нАЙТИ</span></button>
                        </div>
                    </li>
                    <li class="contacts_block_list_item contacts_block_list_item5">
                        <div class="contacts_block_list_item5_text">
                            <h3 class="contacts_block_list_item5_text_title">ФРАНШИЗА</h3>
                            <span class="contacts_block_list_item5_text_txt">Узнайте подробные условия открытия своего клуба</span>
                            <span class="contacts_block_list_item5_text_phone">+7 968 785-03-04</span>
                            <span class="contacts_block_list_item5_text_email">franchise@cyberninjas.ru</span>
                        </div>
                    </li>
                </ul>
                <div class="contacts_block_map">
                    <div class="contacts_block_map_box">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3bfcd584db5ee629ced9c3cd04fe8cccbf67d89d2e0280216975323241acb49c&amp;width=1340&amp;height=850&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>
                    <ul class="contacts_block_map_list">
                        <li class="contacts_block_map_list_item">
                            <span class="contacts_block_map_list_item_title">Cyber Ninjas Профсоюзная</span>
                            <span class="contacts_block_map_list_item_address">г. Москва, ул. Профсоюзная, д. 5/9</span>
                            <span class="contacts_block_map_list_item_phone">8 968 785 01 01</span>
                        </li>
                        <li class="contacts_block_map_list_item">
                            <span class="contacts_block_map_list_item_title">Cyber Ninjas Железнодорожный</span>
                            <span class="contacts_block_map_list_item_address">г. Железнодорожный, Октябрьская ул., 1к1</span>
                            <span class="contacts_block_map_list_item_phone">8 968 785 01 02</span>
                        </li>
                        <li class="contacts_block_map_list_item">
                            <span class="contacts_block_map_list_item_title">Cyber Ninjas Профсоюзная</span>
                            <span class="contacts_block_map_list_item_address">г. Балашиха, проспект Ленина, д. 32Д, ЖК Акварели</span>
                            <span class="contacts_block_map_list_item_phone">8 968 785 01 03</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/booking_form.php";
    ?>
</body>
</html>