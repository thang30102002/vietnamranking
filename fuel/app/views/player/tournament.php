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
        <form class="btn-tournament" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $tournament -> id;?>"></input>
            <button name="action" value="detail" class="btn-player">
                <div class="player" data-bs-toggle="modal" data-bs-target="#myModal" type="submit">
                <div class="number-ranking">
                    
                </div>
                <div class="img-player">
                    <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" alt="player">
                </div>
                <div class="information">
                    <div class="name">
                        <span><?php echo $tournament -> name?> - <?php echo $tournament -> address;?></span>
                    </div>
                    <div class="money">
                        <span><?php echo number_format($tournament -> number_players);?> VND</span>
                    </div>
                </div>
            </div>
            </button>
        </form>
        <?php  endforeach;?>
        
    </div>
</body>
<?php include"footer.php";?>
</html>