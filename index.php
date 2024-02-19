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
        <section class="start">
            <img src="assets/images/back_block.svg" alt="" class="start_back">
            <div class="container start_block">
                <div class="start_block_left">
                    <h1 class="start_block_left_title">Компьютерный клуб CYBER NINJAS</h1>
                    <ul class="start_block_left_list">
                        <li class="start_block_left_list_item"><span class="start_block_left_list_item_red">75</span> МОЩНЫХ ИГРОВЫХ КОМПЬЮТЕРОВ</li>
                        <li class="start_block_left_list_item">РАБОТАЕМ <span class="start_block_left_list_item_red">КРУГЛОСУТОЧНО</span></li>
                        <li class="start_block_left_list_item">ТУРНИРЫ <span class="start_block_left_list_item_red">КАЖДЫЙ МЕСЯЦ</span></li>
                        <li class="start_block_left_list_item"><span class="start_block_left_list_item_red">про</span> перифирия</li>
                    </ul>
                </div>
                <div class="start_block_right">
                    <ul class="start_block_right_pictures">
                        <li class="start_block_right_pictures_item start_block_right_pictures_pc">
                            <img src="assets/images/pc.svg" alt="" class="start_block_right_pictures_item_img">
                            <span class="start_block_right_pictures_item_txt">pc</span>
                        </li>
                        <li class="start_block_right_pictures_item start_block_right_pictures_vr">
                            <img src="assets/images/vr.svg" alt="" class="start_block_right_pictures_item_img">
                            <span class="start_block_right_pictures_item_txt">vr</span>
                        </li>
                        <li class="start_block_right_pictures_item start_block_right_pictures_ps5">
                            <img src="assets/images/ps5.svg" alt="" class="start_block_right_pictures_item_img">
                            <span class="start_block_right_pictures_item_txt">PS5</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tournaments">
            <div class="container tournaments_block">
                <h2 class="tournaments_block_title">турниры</h2>
                <ul class="tournaments_block_list">
                    <?php
                        $select_tournaments = "SELECT * FROM tournaments ORDER BY id_tournament DESC LIMIT 0,3;"; 
                        $tournaments_result = mysqli_query($connect, $select_tournaments) or die(mysqli_error($connect));
                        while ($tournaments_row = mysqli_fetch_assoc($tournaments_result)) {
                            $tournaments_array[] = $tournaments_row;
                        } 
                        if (isset($tournaments_array)) {
                            foreach ($tournaments_array as $array){
                                echo "<li class='tournaments_block_list_item'>
                                    <div class='tournaments_block_list_item_block'>
                                        <img src='".$array['img']."' alt='' class='tournaments_block_list_item_block_img'>
                                        <a class='tournaments_block_list_item_block_btn button' href='tournament.php?id_tournament=".$array['id_tournament']."'><span class='tournaments_block_list_item_block_btn_txt'>Подробнее</span></a>
                                    </div>
                                </li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="gallery">
            <div class="container gallery_block">
                <h2 class="gallery_block_title">галерея</h2>
                <div class="gallery_block_items">
                    <button class="gallery_block_items_left_arrow"><img src="assets/images/arrow.svg" alt="" class="gallery_block_items_left_arrow_img"></button>
                    <img src="assets/images/cabels.svg" alt="" class="gallery_block_items_left_cabels">
                    <div class="gallery_block_items_pictures">
                        <img src="assets/images/gallery.svg" alt="" class="gallery_block_items_pictures_img">
                    </div>
                    <img src="assets/images/cabels.svg" alt="" class="gallery_block_items_right_cabels">
                    <button class="gallery_block_items_right_arrow"><img src="assets/images/arrow.svg" alt="" class="gallery_block_items_right_arrow_img"></button>
                </div>
                <div class="gallery_block_circles">
                    <span class="gallery_block_circles_item gallery_block_circles_current_item"></span>
                    <span class="gallery_block_circles_item"></span>
                    <span class="gallery_block_circles_item"></span>
                    <span class="gallery_block_circles_item"></span>
                    <span class="gallery_block_circles_item"></span>
                </div>
            </div>
        </section>
        <section class="discounts">
            <div class="container discounts_block">
                <h2 class="discounts_block_title">акции</h2>
                <ul class="discounts_block_list">
                    <?php
                        $select_discounts = "SELECT * FROM discounts ORDER BY id_discount DESC LIMIT 0,3;"; 
                        $discounts_result = mysqli_query($connect, $select_discounts) or die(mysqli_error($connect));
                        while ($discounts_row = mysqli_fetch_assoc($discounts_result)) {
                            $discounts_array[] = $discounts_row;
                        } 
                        if (isset($discounts_array)) {
                            foreach ($discounts_array as $array){
                                echo "<li class='discounts_block_list_item'>
                                    <div class='discounts_block_list_item_block'>
                                    <img src='".$array['img']."' alt='' class='discounts_block_list_item_block_img'>
                                    <a class='discounts_block_list_item_block_btn button' href='discount.php?id_discount=".$array['id_discount']."'><span class='discounts_block_list_item_block_btn_txt'>Подробнее</span></a>
                                </li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="latest_news">
            <div class="container latest_news_block">
                <h2 class="latest_news_block_title">последние новости</h2>
                <ul class="latest_news_block_list">
                    <?php
                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT 0,4;"; 
                        $news_result = mysqli_query($connect, $select_news) or die(mysqli_error($connect));
                        while ($news_row = mysqli_fetch_assoc($news_result)) {
                            $news_array[] = $news_row;
                        } 
                        if (isset($news_array)) {
                            foreach ($news_array as $array){
                                echo "<li class='latest_news_block_list_item'>
                                <div class='latest_news_block_list_item_block'>
                                    <img src='".$array['img']."' alt='' class='latest_news_block_list_item_block_img'>
                                    <div class='latest_news_block_list_item_block_text'>
                                        <span class='latest_news_block_list_item_block_text_title'>".$array['name']."</span>
                                        <span class='latest_news_block_list_item_block_text_date'>".$array['date']."</span>
                                    </div>
                                    <a class='latest_news_block_list_item_block_btn button' href='new.php?id_new=".$array['id_new']."'><span class='latest_news_block_list_item_block_btn_txt'>Подробнее</span></a>
                                </div>
                            </li>";
                            }
                        }
                    ?>
                </ul>
            </div>
        </section>
        <section class="games">
            <div class="container games_block">
                <h2 class="games_block_title">ваши любимые игры</h2>
                <span class="games_block_txt">УСТАНОВИМ ЛЮБУЮ ИГРУ ЗА 30 МИНУТ И ВОЗМЕСТИМ ВРЕМЯ ЗА СКАЧИВАНИЕ</span>
                <ul class="games_block_list">
                    <li class="games_block_list_item">
                        <img src="assets/images/csgo.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/hearthstone.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/dota2.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/rust.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/overwatch2.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/gta5.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/fortnite.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/wow.png" alt="" class="games_block_list_item_img">
                    </li>
                    <li class="games_block_list_item">
                        <img src="assets/images/valorant.png" alt="" class="games_block_list_item_img">
                    </li>
                </ul>
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