<div class="form_box2" id="tournament_form">
        <form action="php-handler/tournament_reg.php" class="form_box2_tournament" method="post">
            <div class="form_box2_tournament_block">
                <h3 class="form_box2_tournament_block_title">РЕГИСТРАЦИЯ НА ТУРНИР</h3>
                <button class="form_box2_tournament_block_close" type="button" onclick="closeTournamentForm()"><img src="assets/images/cross.svg" alt="" class="form_box2_tournament_block_close_img"></button>
                <?php 
                    $_SESSION['id_tournament'] = $tournament_rows['id_tournament'];

                    if(isset($_SESSION['id_user'])) {
                        $email_address = $_SESSION['email_address'];
                        $phone_number = $_SESSION['phone_number'];
                        $first_name = $_SESSION['first_name'];
                        $second_name = $_SESSION['second_name'];
                ?>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Название команды</label>
                    <input type="text" name="team" class="form_box2_tournament_block_item_input" required>
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Имя капитана</label>
                    <input type="text" name="captain_firstname" class="form_box2_tournament_block_item_input" required value="<?php echo $_SESSION['first_name'] ?>">
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Фамилия капитана</label>
                    <input type="text" name="captain_secondname" class="form_box2_tournament_block_item_input" required value="<?php echo $_SESSION['second_name'] ?>">
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Электронный адрес капитана</label>
                    <input type="email" name="captain_email" class="form_box2_tournament_block_item_input" required value="<?php echo $_SESSION['email_address'] ?>">
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Номер телефона капитана</label>
                    <input type="phone" name="captain_phone" class="form_box2_tournament_block_item_input" required value="<?php echo $_SESSION['phone_number'] ?>">
                </div>
                <?php 
                    } else {
                ?>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Название команды</label>
                    <input type="text" name="team" class="form_box2_tournament_block_item_input" required>
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Имя капитана</label>
                    <input type="text" name="captain_firstname" class="form_box2_tournament_block_item_input" required>
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Фамилия капитана</label>
                    <input type="text" name="captain_secondname" class="form_box2_tournament_block_item_input" required>
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Электронный адрес капитана</label>
                    <input type="email" name="captain_email" class="form_box2_tournament_block_item_input" required>
                </div>
                <div class="form_box2_tournament_block_item">
                    <label class="form_box2_tournament_block_item_label">Номер телефона капитана</label>
                    <input type="phone" name="captain_phone" class="form_box2_tournament_block_item_input" required>
                </div>
                <?php 
                    }
                ?>
                <button class="form_box2_tournament_block_btn" type="submit" id="tournament_btn"><span class="form_box2_tournament_block_btn_txt">Регистрация</span></button>
            </div>
        </form>
</div>
    <script src="assets/js/tournament_script.js"></script>