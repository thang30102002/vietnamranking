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
    <?php
    ?>
    <div class="ranking-player">
        <h1 class="title">TOP RANKING</h1>
        <?php $number=1; foreach($players as $player):?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $player -> id;?>"></input>
            <button class="btn-player-1" name="action" value="detail" class="btn-player">
                <div class="player" data-bs-toggle="modal" data-bs-target="#myModal" type="submit">
                <div class="number-ranking">
                    <h1>#<?php echo $number;$number+=1;?></h1>
                </div>
                <div class="img-player">
                    <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" alt="player">
                </div>
                <div class="information">
                    <div class="name">
                        <span><?php echo $player -> name?> - <?php echo $player -> ranking?></span>
                    </div>
                    <div class="money">
                        <span><?php echo number_format($player -> money);?> VND</span>
                    </div>
                </div>
            </div>
            </button>
        </form>
        <?php  endforeach;?>
        <?php foreach($players_2 as $player_2):?>
        <form action="">
            <button class="btn-player-2">
                <div class="player_2">
                <div class="number-ranking_2">
                    <h3><?php echo $number;$number+=1;?></h3>
                </div>
                <div class="information_2">
                    <div class="name_2">
                        <span><?php echo $player_2 -> name?></span>
                    </div>
                    <div class="money_2">
                        <span><?php echo number_format($player_2 -> money);?> VND</span>
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