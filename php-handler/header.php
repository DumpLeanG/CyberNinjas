<header id="navbar">
        <div class="container">
            <nav class="menu">
                <a href="index.php" class="menu_logo" id="menu_logo"><img src="assets/images/Logo.svg" alt="" class="menu_logo_img"></a>
                <ul class="menu_list">
                    <li class="menu_list_item"><a href="halls.php" class="menu_list_item_link">Залы</a></li>
                    <li class="menu_list_item"><a href="rules.php" class="menu_list_item_link">Правила</a></li>
                    <li class="menu_list_item"><a href="news.php?page=1" class="menu_list_item_link">Новости</a></li>
                    <li class="menu_list_item"><a href="contacts.php" class="menu_list_item_link">Контакты</a></li>
                    <li class="menu_list_item"><a 
                    <?php if ((empty($_SESSION['id_user'])) and (empty($_SESSION['id_admin']))){ 
                    ?>
                        onclick="openLoginForm()"
                    <?php } elseif(!empty($_SESSION['id_user'])) {
                    ?>
                        href="personal_area.php"
                    <?php } else {
                    ?>
                        href="admin_area.php"
                    <?php
                    } ?> 
                    class="menu_list_item_link">Личный кабинет</a></li>
                </ul> 
                <a class="button menu_button" onclick="openBookingForm()"><span class="menu_button_txt">Забронировать</span></a>
            </nav>
        </div>
    </header>
    <script src="assets/js/booking_script.js"></script>