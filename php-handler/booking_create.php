<?php
    session_start();
    include "../php-connect/connect.php";

    if(isset($_POST['service_radio'])) {
        $service_radio = $_POST['service_radio'];
        if($service_radio === '') {
            unset($service_radio);
        }
    }
    $service_radio = trim($_POST['service_radio']);

    if($service_radio == 'booking') {
        if (isset($_POST['club_radio'])) {
            $club_radio = $_POST['club_radio'];
            if($club_radio === '') {
                unset($club_radio);
            }
        }
        $club_radio = trim($_POST['club_radio']);

        if (isset($_POST['device_radio'])) {
            $device_radio = $_POST['device_radio'];
            if($device_radio === '') {
                unset($device_radio);
            }
        }
        $device_radio = trim($_POST['device_radio']);

        if (isset($_POST['hall_radio'])) {
            $hall_radio = $_POST['hall_radio'];
            if($hall_radio === '') {
                unset($hall_radio);
            }
        }
        $hall_radio = trim($_POST['hall_radio']);

        if (isset($_POST['bname'])) {
            $bname = $_POST['bname'];
            if($bname === '') {
                unset($bname);
            }
        }
        $bname = trim($_POST['bname']);

        if (isset($_POST['bphone'])) {
            $bphone = $_POST['bphone'];
            if($bphone === '') {
                unset($bphone);
            }
        }
        $bphone = trim($_POST['bphone']);

        if (isset($_POST['bdate'])) {
            $bdate = $_POST['bdate'];
            if($bdate === '') {
                unset($bdate);
            }
        }
        $bdate = trim($_POST['bdate']);

        if (isset($_POST['bstart'])) {
            $bstart = $_POST['bstart'];
            if($bstart === '') {
                unset($bstart);
            }
        }
        $bstart = trim($_POST['bstart']);

        if (isset($_POST['bend'])) {
            $bend = $_POST['bend'];
            if($bend === '') {
                unset($bend);
            }
        }
        $bend = trim($_POST['bend']);

        $select_user = "SELECT `id_user` FROM `users` WHERE `first_name` = '$bname' and `phone_number` = '$bphone'";
        $user_result = mysqli_query($connect, $select_user);
        $info_users = mysqli_fetch_array($user_result);

        $select_pclub = "SELECT `id_pc_club` FROM `pc_clubs` WHERE `name` = '$club_radio';";
        $pclub_result = mysqli_query($connect, $select_pclub);
        $info_pclub = mysqli_fetch_array($pclub_result);

        if (isset($info_users['id_user'])) {
            $id_user = $info_users['id_user'];
            $id_pc_club = $info_pclub['id_pc_club'];
            if($hall_radio == 'STANDARD') {
                if (isset($_POST['placesstandard'])) {
                    $place = $_POST['placesstandard'];
                    if($place === '') {
                        unset($place);
                    }
                }
                $place = trim($_POST['placesstandard']);
            } elseif($hall_radio == 'GOLD') {
                if (isset($_POST['placegold'])) {
                    $place = $_POST['placegold'];
                    if($place === '') {
                        unset($place);
                    }
                }
                $place = trim($_POST['placegold']);
            } elseif($hall_radio == 'PLATINUM') {
                if (isset($_POST['placeplatinum'])) {
                    $place = $_POST['placeplatinum'];
                    if($place === '') {
                        unset($place);
                    }
                }
                $place = trim($_POST['placeplatinum']);
            } elseif($hall_radio == 'DIAMOND') {
                if (isset($_POST['placediamond'])) {
                    $place = $_POST['placediamond'];
                    if($place === '') {
                        unset($place);
                    }
                }
                $place = trim($_POST['placediamond']);
            } elseif($hall_radio == 'PS5') {
                if (isset($_POST['placeps5'])) {
                    $place = $_POST['placeps5'];
                    if($place === '') {
                        unset($place);
                    }
                }
                $place = trim($_POST['placeps5']);
            } elseif($hall_radio == 'VR') {
                if (isset($_POST['placevr'])) {
                    $place = $_POST['placevr'];
                    if($place === '') {
                        unset($place);
                    }
                }
                $place = trim($_POST['placevr']);
            }
            $create_line = "INSERT INTO `bookings`(`id_user`, `id_place`, `date`, `start_time`, `end_time`, `id_pc_club` ) VALUES ('$id_user', '$place', '$bdate', '$bstart', '$bend', '$id_pc_club')";
            addslashes($create_line);
            $create_result = mysqli_query($connect, $create_line) or die(mysqli_error($connect));
            echo "<script>alert('Успешное бронирование!'); window.location.href='../index.php';</script>";
        } else {
            $previous = $_SERVER['HTTP_REFERER'];
            echo "<script>alert('Несуществующий пользователь!'); window.location.href='$previous';</script>";
        }
    } else {
        if (isset($_POST['device_radio'])) {
            $device_radio = $_POST['device_radio'];
            if($device_radio === '') {
                unset($device_radio);
            }
        }
        $device_radio = trim($_POST['device_radio']);

        if (isset($_POST['hall_radio'])) {
            $hall_radio = $_POST['hall_radio'];
            if($hall_radio === '') {
                unset($hall_radio);
            }
        }
        $hall_radio = trim($_POST['hall_radio']);

        if (isset($_POST['rental_address'])) {
            $rental_address = $_POST['rental_address'];
            if($rental_address === '') {
                unset($rental_address);
            }
        }
        $rental_address = trim($_POST['rental_address']);

        if (isset($_POST['rname'])) {
            $rname = $_POST['rname'];
            if($rname === '') {
                unset($rname);
            }
        }
        $rname = trim($_POST['rname']);

        if (isset($_POST['rphone'])) {
            $rphone = $_POST['rphone'];
            if($rphone === '') {
                unset($rphone);
            }
        }
        $rphone = trim($_POST['rphone']);

        if (isset($_POST['rstart'])) {
            $rstart = $_POST['rstart'];
            if($rstart === '') {
                unset($rstart);
            }
        }
        $rstart = trim($_POST['rstart']);

        if (isset($_POST['rend'])) {
            $rend = $_POST['rend'];
            if($rend === '') {
                unset($rend);
            }
        }
        $rend = trim($_POST['rend']);

        $select_user = "SELECT `id_user` FROM `users` WHERE `first_name` = '$rname' and `phone_number` = '$rphone'";
        $user_result = mysqli_query($connect, $select_user);
        $info_users = mysqli_fetch_array($user_result);

        if (isset($info_users['id_user'])) {
            $id_user = $info_users['id_user'];

            $select_tariff = "SELECT `id_rental_tariff` FROM `rental_tariffs` WHERE `name` = '$hall_radio';";
            $tariff_result = mysqli_query($connect, $select_tariff);
            $info_tariff = mysqli_fetch_array($tariff_result);

            $id_tariff = $info_tariff['id_rental_tariff'];

            $create_line = "INSERT INTO `rentals` (`id_user`, `id_rental_tariff`, `address`, `start_date`, `end_date`) VALUES ('$id_user', '$id_tariff', '$rental_address', '$rstart', '$rend')";
            addslashes($create_line);
            $create_result = mysqli_query($connect, $create_line) or die(mysqli_error($connect));
            echo "<script>alert('Успешная аренда!'); window.location.href='../index.php';</script>";
        } else {
            $previous = $_SERVER['HTTP_REFERER'];
            echo "<script>alert('Несуществующий пользователь!'); window.location.href='$previous';</script>";
        }
    }
    
?>