<!DOCTYPE html>
<html>
<?php

use Fuel\Core\View;
use Fuel\Core\Session;
use Fuel\Core\Asset;
?>

<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <?php echo Asset::css('player/style.css'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php echo View::forge('player/header'); ?>
    <div class="ranking-player">
        <h1 class="title">Giải đấu</h1>
        <?php foreach ($tournaments as $tournament): ?>
            <?php
            $rankings = Model_RankingTournament::get_rankings_tournament($tournament->id);
            $stringranking = '';
            foreach ($rankings as $ranking):
                $stringranking .= $ranking->ranking . '';
            endforeach;
            ?>
            <button class="btn-player-1 btn-player btn-tournament" name="action" onclick="registerTournament(<?php echo $tournament->id ?>,<?php echo $tournament->fees ?>,'<?php echo $stringranking ?>')" value="detail" data-toggle="modal" data-target="#RegisterTournamentModal">
                <input type="hidden" name="id" value="<?php echo $tournament->id; ?>"></input>
                <div class="player" data-bs-toggle="modal" data-bs-target="#myModal" type="submit">
                    <div class="img-player">
                        <img src="https://icdn.24h.com.vn/upload/1-2023/images/2023-02-01/hoang-1-1675268027-825-width740height417.jpg" alt="player">
                    </div>
                    <div class="information info-tournament">
                        <div class="registed">
                            <div class="number-players"><span><?php echo $tournament->player_registed ?></span>/<span><?php echo $tournament->number_players ?></span></div>
                            <div class="text">Đã tham gia</div>
                        </div>
                        <ul>
                            <li><span class="text-color-red"><?php echo $tournament->name ?></span></li>
                            <li>Hạng : <span class="text-color-red"><?php $rankings = Model_RankingTournament::get_rankings_tournament($tournament->id);
                                                                    foreach ($rankings as $ranking) echo $ranking->ranking . " "; ?></span></li>
                            <li>Lệ phí: <span class="text-color-red"><?php echo number_format($tournament->fees) ?> VND</span></li>
                            <li>Địa chỉ: <span class="text-color-red"><?php echo $tournament->address; ?></span></li>
                            <li>Thời gian: <span class="text-color-red"><?php $timestamp = strtotime($tournament->start_date);
                                                                        echo date('d/m/Y h:i A', $timestamp); ?></span></li>
                            <li>Quán quân: <span class="text-color-red"><?php echo number_format($tournament->money_top_1); ?> VND</span></li>
                            <li>Á quân: <span class="text-color-red"><?php echo number_format($tournament->money_top_2); ?> VND</span></li>
                            <li>Giải 3: <span class="text-color-red"><?php echo number_format($tournament->money_top_3); ?> VND</span></li>
                        </ul>
                        <div>
                            <p style="text-align: right;">Ấn để đăng ký ngay</p>
                        </div>
                    </div>
                </div>
            </button>

        <?php endforeach; ?>
    </div>
    <!-- Modal -->
    <div class="modal-register-tournament modal fade" id="RegisterTournamentModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>Bạn đồng ý tham gia giải đấu </p>
                    <p id="nameTournament"></p>
                </div>
                <div class="modal-footer">
                    <button id="btn-qr" type="button" class="btn-register btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="">Đăng ký ngay</button>
                    <button type="button" class="btn-cancel btn btn-default " data-dismiss="modal">Huỷ</button>
                </div>
            </div>

        </div>
    </div>
    <?php echo View::forge('player/modal/modal_qr_tournament'); ?>
    <?php echo View::forge('player/modal/modal_not_register_tournament'); ?>
</body>
<?php include "footer.php"; ?>
<!-- Modal -->

<script>
    function registerTournament(id, fees, rankings) {
        var xhr = new XMLHttpRequest();

        // Cấu hình yêu cầu
        xhr.open("GET", "http://localhost:8000/api/tournament/" + id, true);

        // Thiết lập hàm callback cho khi yêu cầu hoàn tất
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Xử lý dữ liệu trả về
                var data = JSON.parse(xhr.responseText);
                console.log(xhr.responseText);
                document.getElementById("nameTournament").innerHTML = data.name;
                document.getElementById("btn-qr").onclick = function() {
                    <?php
                    if (!empty(Session::get('logged_in'))) {
                        $check_login = true;
                        $player = Model_Player::get_detail_player(Session::get('id'));
                        $player_id = $player->id;
                        $player_rank = $player->ranking;
                    } else {
                        $check_login = false;
                    }
                    ?>
                    var checkLogin = <?php echo json_encode($check_login); ?>;
                    if (checkLogin == true) {
                        <?php
                        if (!empty($player_id)) {
                            echo "var playerId = " . json_encode($player_id) . ";";
                            echo "var playerRank = " . json_encode($player_rank) . ";";
                        }
                        ?>
                        if (rankings.includes(playerRank)) {
                            document.getElementById("btn-qr").setAttribute("data-target", "#QrModal");
                            var srcImg = "https://img.vietqr.io/image/BIDV-12410003157606-compact2.png?amount=" + fees + "&addInfo=" + playerId + " " + id;
                            document.getElementById("img-qr").src = srcImg;
                            console.log("co the dk giai");
                        } else {
                            console.log("khong the dk giai");
                            document.getElementById("btn-qr").setAttribute("data-target", "#NotRegisterModal");
                        }
                    } else {

                        document.getElementById("btn-qr").setAttribute("data-target", "#exampleModal");
                    }

                }
            } else {
                console.error("Error: " + xhr.status);
            }
        };
        xhr.send();
    }
</script>

</html>