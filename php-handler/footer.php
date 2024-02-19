<footer><!--Футер-->
        <div class="container footer">
            <div class="footer_top">
                <img src="assets/images/Logo.svg" alt="" class="footer_top_logo">
                <ul class="footer_top_list">
                    <li class="footer_top_list_column">
                        <span class="footer_top_list_column_title">Разделы</span>
                        <ul class="footer_top_list_column_list">
                            <li class="footer_top_list_column_list_item"><a href="halls.php" class="footer_top_list_column_list_item_link">Залы</a></li>
                            <li class="footer_top_list_column_list_item"><a href="rules.php" class="footer_top_list_column_list_item_link">Правила</a></li>
                            <li class="footer_top_list_column_list_item"><a href="news.php?page=1" class="footer_top_list_column_list_item_link">Новости</a></li>
                            <li class="footer_top_list_column_list_item"><a href="contacts.php" class="footer_top_list_column_list_item_link">Контакты</a></li>
                            <li class="footer_top_list_column_list_item"><a 
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
                            class="footer_top_list_column_list_item_link">Личный кабинет</a></li>
                        </ul>
                    </li>
                    <li class="footer_top_list_column">
                        <span class="footer_top_list_column_title">Соцсети</span>
                        <ul class="footer_top_list_column_list">
                            <li class="footer_top_list_column_list_item"><a href="#" class="footer_top_list_column_list_item_link"><img src="assets/images/vk.svg" alt="" class="footer_top_list_column_list_item_link_img">ВКонтакте</a></li>
                            <li class="footer_top_list_column_list_item"><a href="#" class="footer_top_list_column_list_item_link"><img src="assets/images/tiktok.svg" alt="" class="footer_top_list_column_list_item_link_img">TikTok</a></li>
                            <li class="footer_top_list_column_list_item"><a href="#" class="footer_top_list_column_list_item_link"><img src="assets/images/Youtube.svg" alt="" class="footer_top_list_column_list_item_link_img">YouTube</a></li>
                        </ul>
                    </li>
                    <li class="footer_top_list_column">
                        <span class="footer_top_list_column_title">Сотрудничество</span>
                        <ul class="footer_top_list_column_list">
                            <li class="footer_top_list_column_list_item"><a href="#" class="footer_top_list_column_list_item_link">Франшиза</a></li>
                            <li class="footer_top_list_column_list_item"><a href="#" class="footer_top_list_column_list_item_link">Партнерство</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="footer_bottom">
                <span class="footer_bottom_copyright">© 2023, CyberNinjas. Все права защищены</span>
                <a href="#" class="footer_bottom_politic">Политика конфиденциальности</a>
            </div>
        </div>
    </footer>