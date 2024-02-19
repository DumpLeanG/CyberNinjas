<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberNinjas - Новости</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="new">
            <div class="container new_block">
                <div class="new_block_main">
                <?php
                    $id_new = $_GET['id_new'];
                    $select_new = "SELECT * FROM news WHERE id_new = '$id_new';"; 
                    $new_result = mysqli_query($connect, $select_new) or die(mysqli_error($connect));
                    $new_rows = mysqli_fetch_array($new_result);

                    $date = date("d.m.Y", strtotime($new_rows['date']));
                    echo "<h2 class='new_block_main_title'>".$new_rows['name']."</h2>
                    <img src='".$new_rows['img']."' alt='' class='new_block_main_img'>
                    <p class='new_block_main_txt'>".$new_rows['description']."</p>
                    <span class='new_block_main_date'>".$new_rows['date']."</span>";
                ?>
                </div>
                <div class="new_block_similars">
                    <h2 class="new_block_similars_title">последние новости</h2>
                    <ul class="new_block_similars_list">
                    <?php
                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT 0,4;"; 
                        $news_result = mysqli_query($connect, $select_news) or die(mysqli_error($connect));
                        while ($news_row = mysqli_fetch_assoc($news_result)) {
                            $news_array[] = $news_row;
                        } 
                        if (isset($news_array)) {
                            foreach ($news_array as $array){
                                echo "<li class='new_block_similars_list_item'>
                                <div class='new_block_similars_list_item_block'>
                                    <img src='".$array['img']."' alt='' class='new_block_similars_list_item_block_img'>
                                    <div class='new_block_similars_list_item_block_text'>
                                        <span class='new_block_similars_list_item_block_text_title'>".$array['name']."</span>
                                        <span class='new_block_similars_list_item_block_text_date'>".$array['date']."</span>
                                    </div>
                                    <a class='new_block_similars_list_item_block_btn button' href='new.php?id_new=".$array['id_new']."'><span class='new_block_similars_list_item_block_btn_txt'>Подробнее</span></a>
                                </div>
                            </li>";
                            }
                        }
                    ?>
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