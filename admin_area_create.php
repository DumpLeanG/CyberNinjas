<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>CyberNinjas - Панель администратора</title>
</head>
<body>
    <?php
        session_start();
        include "php-connect/connect.php";

        if (isset($_SESSION['id_admin'])) {
            $IDadmin = $_SESSION['id_admin'];
            if ($IDadmin === '') {
                unset($IDadmin);
            }
        
        include "php-handler/admin_header.php";
    ?>
    <main>
        <section class="admin_create_section">
            <div class="container admin_create_section_block">
                <?php
                if (isset($_GET['table_name'])) {
                    $table_name = $_GET['table_name'];
                    echo "<form action='php-handler/create_line.php?table_name=$table_name' class='admin_create_section_block_form' method='post' enctype='multipart/form-data'>";
                        $show_columns = "SHOW COLUMNS FROM $table_name;"; 
                        $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
                        while ($columns_row = mysqli_fetch_assoc($columns_result)) {
                            $columns_array[] = $columns_row;
                        } 
                        $index_col = 0;
                        foreach ($columns_array as $array){
                            $index_col++;
                            if ($index_col > 1){
                                if($array['Field'] === 'img') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Изображение</label>
                                    <input type='file' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'second_name') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Фамилия</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'first_name') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Имя</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'phone_number') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Номер телефона</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'email_address') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Электронный адрес</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'birthday') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Дата рождения</label>
                                    <input type='date' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'password') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Пароль</label>
                                    <input type='password' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'id_user') {
                                    $select_users = "SELECT * FROM users"; 
                                    $users_result = mysqli_query($connect, $select_users) or die(mysqli_error($connect));
                                    while ($users_row = mysqli_fetch_assoc($users_result)) {
                                        $users_array[] = $users_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Пользователь</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='users' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($users_array as $arr){
                                        echo "<option>".$arr['second_name']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'id_place') {
                                    $select_places = "SELECT * FROM places"; 
                                    $places_result = mysqli_query($connect, $select_places) or die(mysqli_error($connect));
                                    while ($places_row = mysqli_fetch_assoc($places_result)) {
                                        $places_array[] = $places_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Место</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='places' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($places_array as $arr){
                                        echo "<option>".$arr['id_place']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'id_pc_club') {
                                    $select_pc_clubs = "SELECT * FROM pc_clubs"; 
                                    $pc_clubs_result = mysqli_query($connect, $select_pc_clubs) or die(mysqli_error($connect));
                                    while ($pc_clubs_row = mysqli_fetch_assoc($pc_clubs_result)) {
                                        $pc_clubs_array[] = $pc_clubs_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Компьютерный клуб</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='pc_clubs' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($pc_clubs_array as $arr){
                                        echo "<option>".$arr['name']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'id_device') {
                                    $select_devices = "SELECT * FROM devices"; 
                                    $devices_result = mysqli_query($connect, $select_devices) or die(mysqli_error($connect));
                                    while ($devices_row = mysqli_fetch_assoc($devices_result)) {
                                        $devices_array[] = $devices_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Устройство</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='devices' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($devices_array as $arr){
                                        echo "<option>".$arr['id_device']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'gpu') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Видеокарта</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'cpu') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Процессор</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'display') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Дисплей</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'headset') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Гарнитура</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'mouse') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Мышь</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'keyboard') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Клавиатура</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'vr_headset') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>VR гарнитура</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'console') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Приставка</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'date') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Дата</label>
                                    <input type='date' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'start_time') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Время начала</label>
                                    <input type='time' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'end_time') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Время окончания</label>
                                    <input type='time' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'name') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Название</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'start_date') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Дата начала</label>
                                    <input type='date' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'end_date') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Дата окончания</label>
                                    <input type='date' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'discount') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Скидка</label>
                                    <input type='number' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'description') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Описание</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'specifications') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Характеристики</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'price') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Цена</label>
                                    <input type='number' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'id_rental_tariff') {
                                    $select_tariffs = "SELECT * FROM rental_tariffs"; 
                                    $tariffs_result = mysqli_query($connect, $select_tariffs) or die(mysqli_error($connect));
                                    while ($tariffs_row = mysqli_fetch_assoc($tariffs_result)) {
                                        $tariffs_array[] = $tariffs_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Тариф аренды</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='rental_tariffs' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($tariffs_array as $arr){
                                        echo "<option>".$arr['name']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'address') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Адрес</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'id_tournament') {
                                    $select_tournaments = "SELECT * FROM tournaments"; 
                                    $tournaments_result = mysqli_query($connect, $select_tournaments) or die(mysqli_error($connect));
                                    while ($tournaments_row = mysqli_fetch_assoc($tournaments_result)) {
                                        $tournaments_array[] = $tournaments_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Турнир</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='tournaments' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($tournaments_array as $arr){
                                        echo "<option>".$arr['name']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'id_tournament_participant') {
                                    $select_tournament_participants = "SELECT * FROM tournament_participants"; 
                                    $tournament_participants_result = mysqli_query($connect, $select_tournament_participants) or die(mysqli_error($connect));
                                    while ($tournament_participants_row = mysqli_fetch_assoc($tournament_participants_result)) {
                                        $tournament_participants_array[] = $tournament_participants_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Участник турнира</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='tournament_participants' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($tournament_participants_array as $arr){
                                        echo "<option>".$arr['name']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                } elseif ($array['Field'] === 'team') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Команда</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'discipline') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Дисциплина</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'format') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Формат</label>
                                    <input type='text' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                }  elseif ($array['Field'] === 'prize_pool') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Призовой фонд</label>
                                    <input type='number' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'participants_amount') {
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Кол-во участников</label>
                                    <input type='number' class='admin_create_section_block_form_row_input' name='".$array['Field']."'>
                                </div>";
                                } elseif ($array['Field'] === 'id_hall') {
                                    $select_halls = "SELECT * FROM halls"; 
                                    $halls_result = mysqli_query($connect, $select_halls) or die(mysqli_error($connect));
                                    while ($halls_row = mysqli_fetch_assoc($halls_result)) {
                                        $halls_array[] = $halls_row;
                                    } 
                                    echo "<div class='admin_create_section_block_form_row'>
                                    <label class='admin_create_section_block_form_row_txt'>Зал</label>
                                    <div class='admin_create_section_block_form_row_block'>
                                        <select name='halls' class='admin_create_section_block_form_row_block_input'>";
                                    foreach ($halls_array as $arr){
                                        echo "<option>".$arr['name']."</option>";
                                    }
                                        echo "</select>
                                    </div>
                                </div>";
                                }
                            }
                        }
                    }
                ?>
                    <button type="submit" class="admin_create_section_block_form_create"><span class="admin_create_section_block_form_create_txt">Добавить запись</span></button>
                </form>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/admin_footer.php";
                }
    ?>
</body>
</html>