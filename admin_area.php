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
        <section class="admin_section">
            <div class="container admin_section_block">
                <ul class="admin_section_block_list">
                    <?php
                        $show_tables = "SHOW FULL TABLES FROM pcclub WHERE Table_Type != 'VIEW'"; 
                        $tables_result = mysqli_query($connect, $show_tables) or die(mysqli_error($connect));
                        while ($tables_row = mysqli_fetch_assoc($tables_result)) {
                            $tables_array[] = $tables_row;
                        } 
                        foreach ($tables_array as $array){
                            if ($array['Tables_in_pcclub'] == 'admins') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Админы</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Админы</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'users') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Пользователи</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Пользователи</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'bookings') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Бронирования</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Бронирования</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'discounts') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Акции</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Акции</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'news') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Новости</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Новости</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'rentals') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Аренда</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Аренда</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'rental_tariffs') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Тарифы аренды</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Тарифы аренды</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'tournaments') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Турниры</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Турниры</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'tournament_participants') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Участники турниров</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Участники турниров</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'halls') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Залы</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Залы</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'devices') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Устройства</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Устройства</a></li>";
                                }
                            } elseif ($array['Tables_in_pcclub'] == 'places') {
                                if (isset($_GET['table_name']) and $_GET['table_name'] == $array['Tables_in_pcclub']) {
                                    echo "<li class='admin_section_block_list_item'><a style='color: #0583F2;' class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Места</a></li>";
                                } else {
                                    echo "<li class='admin_section_block_list_item'><a class='admin_section_block_list_item_link' href='?table_name=".$array['Tables_in_pcclub']."'>Места</a></li>";
                                }
                            }
                        }
                    ?>
                </ul>
                <div class="admin_section_block_bottom">
                        <?php
                            if (isset($_GET['table_name'])) {
                                echo "<table class='admin_section_block_bottom_table'>
                                    <tr class='admin_section_block_bottom_table_row_title'>";
                                $table_name = $_GET['table_name'];
                                $show_columns = "SHOW COLUMNS FROM $table_name;"; 
                                $columns_result = mysqli_query($connect, $show_columns) or die(mysqli_error($connect));
                                while ($columns_row = mysqli_fetch_assoc($columns_result)) {
                                    $columns_array[] = $columns_row;
                                } 
                                $index_col = 0;
                                $col_array = array();
                                foreach ($columns_array as $array){
                                    if($array['Field'] === 'img') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Изображение</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'second_name') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Фамилия</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'first_name') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Имя</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'phone_number') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Номер телефона</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'email_address') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Электронный адрес</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'birthday') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата рождения</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'password') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Пароль</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_user') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Пользователь</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_device') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Устройство</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'gpu') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Видеокарта</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'cpu') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Процессор</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'display') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дисплей</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'headset') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Гарнитура</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'mouse') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Мышь</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'keyboard') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Клавиатура</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'vr_headset') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>VR гарнитура</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'console') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Приставка</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_place') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Место</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'date') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'start_time') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Время начала</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'end_time') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Время окончания</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'name') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Название</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'start_date') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата начала</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'end_date') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дата окончания</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'discount') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Скидка</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'description') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Описание</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'specifications') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Особенности</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'price') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Цена</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_rental_tariff') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Тариф аренды</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'address') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Адрес</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_tournament') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Турнир</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'prize_pool') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Призовой фонд</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'discipline') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Дисциплина</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'format') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Формат</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'participants_amount') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Кол-во участников</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_hall') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Зал</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_admin') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Администратор</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_booking') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Бронирование</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_discount') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Акция</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_new') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Новость</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_rental') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Аренда</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_tournament_participant') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Участник турнира</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'team') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Команда</span>
                                    </th>";
                                    } elseif ($array['Field'] === 'id_pc_club') {
                                        echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                        <span class='admin_section_block_bottom_table_row_title_cell_txt'>Компьютерный клуб</span>
                                    </th>";
                                    }
                                    $index_col++;
                                    $col_array[$index_col] = $array['Field'];
                                }
                                echo "<th class='admin_section_block_bottom_table_row_title_cell'>
                                    <span class='admin_section_block_bottom_table_row_title_cell_txt'>Действие</span>
                                </th>
                            </tr>";

                            include "php-handler/delete_line.php";

                                $select_info = "SELECT * FROM $table_name;"; 
                                $info_result = mysqli_query($connect, $select_info) or die(mysqli_error($connect));
                                while ($info_row = mysqli_fetch_assoc($info_result)) {
                                    $info_array[] = $info_row;
                                } 
                                if (isset($info_array)) {
                                    foreach ($info_array as $arr){
                                        $index = 0;
                                        echo "<tr class='admin_section_block_bottom_table_row'>";
                                        foreach ($columns_array as $array) {
                                            $index++;
                                            if($array['Field'] === 'img') {
                                            echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <span class='admin_section_block_bottom_table_row_cell_txt'><img src='".$arr[$col_array[$index]]."' alt='' class='admin_section_block_bottom_table_row_cell_txt_img'></span>
                                            </td>";
                                            } else if($array['Field'] === 'description') {
                                                $description = substr($arr[$col_array[$index]], 0, 200);
                                                $description = $description . "...";
                                                echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <span class='admin_section_block_bottom_table_row_cell_txt'>".$description."</span>
                                            </td>";
                                            } else {
                                            echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <span class='admin_section_block_bottom_table_row_cell_txt'>".$arr[$col_array[$index]]."</span>
                                            </td>";
                                            }
                                        }
                                        $id_line = $arr[$col_array[1]];
                                        echo "<td class='admin_section_block_bottom_table_row_cell'>
                                                <div class='admin_section_block_bottom_table_row_cell_buttons'>
                                                    <a href='admin_area_edit.php?table_name=$table_name&edit_id_line=$id_line' class='admin_section_block_bottom_table_row_cell_buttons_btn'><img src='assets/images/edit.svg' alt='' class='admin_section_block_bottom_table_row_cell_buttons_btn_img'></a>
                                                    <a href='?table_name=$table_name&delete_id_line=$id_line' class='admin_section_block_bottom_table_row_cell_buttons_btn'><img src='assets/images/delete.svg' alt='' class='admin_section_block_bottom_table_row_cell_buttons_btn_img'></a>
                                                </div>
                                            </td>
                                        </tr>";
                                    }
                                }
                            echo "</table>
                            <a href='admin_area_create.php?table_name=$table_name' class='button admin_section_block_bottom_create'><span class='admin_section_block_bottom_create_txt'>Добавить запись</span></a>
                            </div>";
                            }
                        ?>
                </div>
            </div>
            <div class="message">
                <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="message_txt">' . $_SESSION['message'] . '</p>'; 
                    } else {
                        echo ' ';
                    }
                    unset($_SESSION['message']);
                ?>
            </div>
        </section>
    </main>
    <?php
        include "php-handler/admin_footer.php";
                }
    ?>
</body>
</html>