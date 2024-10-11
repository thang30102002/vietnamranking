<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo Asset::css('player/index.css');?>
    <?php echo Asset::css('player/footer.css');?>
    <?php echo Asset::css('player/tournament.css');?>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo View::forge('player/header');?>
    <div class="ranking-player">
        <h1 class="title">Giải đấu</h1>
        <?php foreach($tournaments as $tournament):?>
            <form action="" method="post">
                <button name="action" value="detail-tournament" style="submit">
                    <input type="hidden" name="id" value="<?php echo $tournament -> id;?>"></input>
                    <div class="player tournament" type="button" data-toggle="modal" data-target="#myModal">
                        <div class="img-player">
                            <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" alt="player">
                        </div>
                        <div class="information-tournament">
                            <h4>The Billar House</h4>
                            <ul>
                                <li><span class="title-tournament">Hạng: </span>G H I</li>
                                <li><span class="title-tournament">Thời gian:</span> </li>
                                <li><span class="title-tournament">Địa điểm:</span> <?php echo $tournament -> address?></li>
                                <li><span class="title-tournament">Số lượng:</span> <?php echo $tournament -> number_players?></li>
                                <li><span class="title-tournament">Lệ phí:</span> 150000 VND</li>  
                            </ul>
                        </div>
                    </div>
                </button>
            </form>
        <?php  endforeach;?>
        
    </div>
</body>
<?php include"footer.php";?>

</html>