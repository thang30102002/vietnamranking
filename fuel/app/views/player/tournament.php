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
                        <li><span class="text-color-red"><?php echo $tournament -> name?></span></li>
                        <li>Hạng : <span class="text-color-red">G H I</span></li>
                        <li>Địa chỉ: <span class="text-color-red"><?php echo $tournament -> address;?></span></li>
                        <li>Thời gian: <span class="text-color-red"><?php $timestamp = strtotime($tournament -> start_date); echo date('d/m/Y h:i A',$timestamp);?></span></li>
                        <li>Quán quân: <span class="text-color-red"><?php echo $tournament -> money_top_1?> VND</span></li>
                        <li>Á quân: <span class="text-color-red"><?php echo $tournament -> money_top_2?> VND</span></li>
                        <li>Giải 3: <span class="text-color-red"><?php echo $tournament -> money_top_3?> VND</span></li>
                        <li></li>
                        <li></li>
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