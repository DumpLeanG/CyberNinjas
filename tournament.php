<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberNinjas - Турниры</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="tournament">
            <div class="container tournament_block">
            <?php
                    $id_tournament = $_GET['id_tournament'];
                    $select_tournament = "SELECT * FROM tournaments WHERE id_tournament = '$id_tournament';"; 
                    $tournament_result = mysqli_query($connect, $select_tournament) or die(mysqli_error($connect));
                    $tournament_rows = mysqli_fetch_array($tournament_result);

                    $start_date = date("d.m.Y", strtotime($tournament_rows['start_date']));
                    $end_date = date("d.m.Y", strtotime($tournament_rows['end_date']));
                    $first = $tournament_rows['prize_pool']/2;
                    $second = $tournament_rows['prize_pool']/3;
                    $third = $tournament_rows['prize_pool']/6;
                    echo "<h2 class='tournament_block_title'>".$tournament_rows['name']."</h2>
                    <img src='".$tournament_rows['img']."' alt='' class='tournament_block_img'>
                    <span class='tournament_block_date'>Даты проведения: с <span class='tournament_block_date_blue'>".$start_date."</span> по <span class='tournament_block_date_blue'>".$end_date."</span></span>
                    <ul class='tournament_block_list'>
                        <li class='tournament_block_list_item'>Дисциплина: <span class='tournament_block_list_item_blue'>".$tournament_rows['discipline']."</span></li>
                        <li class='tournament_block_list_item'>Формат:  <span class='tournament_block_list_item_blue'>".$tournament_rows['format']."</span></li>
                        <li class='tournament_block_list_item'>Призовой фонд:  <span class='tournament_block_list_item_blue'>".$tournament_rows['prize_pool']." рублей</span></li>
                        <li class='tournament_block_list_item'>Кол-во участников:  <span class='tournament_block_list_item_blue'>".$tournament_rows['participants_amount']."</span></li>
                    </ul>
                    <ul class='tournament_block_prizes'>
                        <li class='tournament_block_prizes_item'>
                            <img src='assets/images/gold.svg' alt='' class='tournament_block_prizes_item_img'>
                            <div class='tournament_block_prizes_item_box'>
                                <span class='tournament_block_prizes_item_box_gold'>1 Место</span>
                                <span class='tournament_block_prizes_item_box_prize'>".$first." рублей</span>
                            </div>
                        </li>
                        <li class='tournament_block_prizes_item'>
                            <img src='assets/images/silver.svg' alt='' class='tournament_block_prizes_item_img'>
                            <div class='tournament_block_prizes_item_box'>
                                <span class='tournament_block_prizes_item_box_silver'>2 Место</span>
                                <span class='tournament_block_prizes_item_box_prize'>".$second." рублей</span>
                            </div>
                        </li>
                        <li class='tournament_block_prizes_item'>
                            <img src='assets/images/bronze.svg' alt='' class='tournament_block_prizes_item_img'>
                            <div class='tournament_block_prizes_item_box'>
                                <span class='tournament_block_prizes_item_box_bronze'>3 Место</span>
                                <span class='tournament_block_prizes_item_box_prize'>".$third." рублей</span>
                            </div>
                        </li>
                    </ul>
                    <button class='tournament_block_btn' onclick='openTournamentForm()'><span class='tournament_block_btn_txt'>Принять участие</span></button>";
                ?>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/footer.php";
        include "php-handler/login_form.php";
        include "php-handler/register_form.php";
        include "php-handler/tournament_form.php";
        include "php-handler/booking_form.php";
    ?>
</body>
</html>