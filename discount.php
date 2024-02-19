<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberNinjas - Акции</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";
        include "php-handler/header.php";
    ?>
    <main>
        <section class="discount">
            <div class="container discount_block">
                <?php
                    $id_discount = $_GET['id_discount'];
                    $select_discount = "SELECT * FROM discounts WHERE id_discount = '$id_discount';"; 
                    $discount_result = mysqli_query($connect, $select_discount) or die(mysqli_error($connect));
                    $discount_rows = mysqli_fetch_array($discount_result);

                    $start_date = date("d.m.Y", strtotime($discount_rows['start_date']));
                    $end_date = date("d.m.Y", strtotime($discount_rows['end_date']));
                    $date_check = "SELECT DATEDIFF(end_date, start_date)/365 FROM discounts WHERE id_discount = '$id_discount';";
                    $check_result = mysqli_query($connect, $date_check) or die(mysqli_error($connect));
                    $check_rows = mysqli_fetch_array($check_result);

                    if ($check_rows['0'] < 3) {
                        echo "<h2 class='discount_block_title'>".$discount_rows['name']."</h2>
                    <img src='".$discount_rows['img']."' alt='' class='discount_block_img'>
                    <span class='discount_block_date'>Срок действия: <span class='discount_block_date_blue'>с ".$start_date."</span> до <span class='discount_block_date_blue'>".$end_date."</span></span>
                    <p class='discount_block_txt'>".$discount_rows['description']."</p>";
                    } else {
                        echo "<h2 class='discount_block_title'>".$discount_rows['name']."</h2>
                    <img src='".$discount_rows['img']."' alt='' class='discount_block_img'>
                    <span class='discount_block_date'>Срок действия: <span class='discount_block_date_blue'>бессрочно</span></span>
                    <p class='discount_block_txt'>".$discount_rows['description']."</p>";
                    }
                ?>
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