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
        <section class="news">
            <div class="container news_block">
                <h2 class="news_block_title">новости</h2>
                <ul class="news_block_list">
                    <?php
                    if(isset($_GET['page'])) {
                        $page = $_GET['page'];
                        $page_items = ($page-1)*12;
                        $select_news = "SELECT * FROM news ORDER BY id_new DESC LIMIT $page_items,12;"; 
                        $news_result = mysqli_query($connect, $select_news) or die(mysqli_error($connect));
                        while ($news_row = mysqli_fetch_assoc($news_result)) {
                            $news_array[] = $news_row;
                        } 
                        if (isset($news_array)) {
                            foreach ($news_array as $array){
                                echo "<li class='news_block_list_item'>
                                    <div class='news_block_list_item_block'>
                                        <img src='".$array['img']."' alt='' class='news_block_list_item_block_img'>
                                        <div class='news_block_list_item_block_text'>
                                            <span class='news_block_list_item_block_text_title'>".$array['name']."</span>
                                            <span class='news_block_list_item_block_text_date'>".$array['date']."</span>
                                        </div>
                                        <a class='news_block_list_item_block_btn button' href='new.php?id_new=".$array['id_new']."'><span class='news_block_list_item_block_btn_txt'>Подробнее</span></a>
                                    </div>
                                </li>";
                            }
                        }
                    ?>
                </ul>
                <div class="news_block_pages">
                    <?php
                        $select_pages = "SELECT CEILING(COUNT(*)/12) FROM `news`;"; 
                        $pages_result = mysqli_query($connect, $select_pages) or die(mysqli_error($connect));
                        while ($pages_row = mysqli_fetch_array($pages_result)) {
                            if (isset($pages_row)) {
                                for ($i = 1; $i <= $pages_row[0]; ++$i) {
                                    if ($i==$page) {
                                        echo "<span class='news_block_pages_item news_block_pages_current_item'><a href='?page=$i' class='news_block_pages_item_link'>".$i."</a></span>";
                                    } else {
                                        echo "<span class='news_block_pages_item'><a href='?page=$i' class='news_block_pages_item_link'>".$i."</a></span>";
                                    }
                                }
                            }
                        }
                    }
                    ?>
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