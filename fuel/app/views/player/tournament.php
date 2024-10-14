<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <?php echo Asset::css('player/style.css');?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php echo View::forge('player/header');?>
    <!-- <div class="ranking-player">
        <h1 class="title">Giải đấu</h1>
        <?php //foreach($tournaments as $tournament):?>
            <form action="" method="post">
                <button name="action" value="detail-tournament" style="submit">
                    <input type="hidden" name="id" value="<?php //echo $tournament -> id;?>"></input>
                    <div class="player tournament" type="button" data-toggle="modal" data-target="#myModal">
                        <div class="img-player">
                            <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" alt="player">
                        </div>
                        <div class="information-tournament">
                            <h4>The Billar House</h4>
                            <ul>
                                <li><span class="title-tournament">Hạng: </span>G H I</li>
                                <li><span class="title-tournament">Thời gian:</span> </li>
                                <li><span class="title-tournament">Địa điểm:</span> <?php //echo $tournament -> address?></li>
                                <li><span class="title-tournament">Số lượng:</span> <?php //echo $tournament -> number_players?></li>
                                <li><span class="title-tournament">Lệ phí:</span> 150000 VND</li>  
                            </ul>
                        </div>
                    </div>
                </button>
            </form>
        <?php  //endforeach;?>
        
    </div> -->
    <div class="ranking-player">
        <h1 class="title">Giải đấu</h1>
        <?php foreach($tournaments as $tournament):?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $tournament -> id;?>"></input>
            <button class="btn-player-1" name="action" value="detail" class="btn-player">
                <div class="player" data-bs-toggle="modal" data-bs-target="#myModal" type="submit">
                <div class="img-player">
                    <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" alt="player">
                </div>
                <div class="information info-tournament">
                    <ul>
                        <li><?php echo $tournament -> name?></li>
                        <li><?php echo $tournament -> address;?></li>
                        <li><?php echo $tournament -> start_date;?></li>
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