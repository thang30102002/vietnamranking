<!DOCTYPE html>
<html>
<head>
<title>Detail Player</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="fuel/public/">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<?php echo Asset::css('player/detail.css');?>
 <?php echo Asset::css('player/index.css');?>
 <?php echo Asset::css('player/footer.css');?>
</head>
<body class="w3-light-grey">
<?php echo View::forge('player/header');?>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class=" w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" style="width:100%" alt="Avatar">
          <div class="div-name w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $tournament -> name?></h2>
          </div>
        </div>
        <div class="w3-container information-tournament">
                <p><i class="fa fa-money" aria-hidden="true"></i>Lệ phí: 150000 VND </p>
          <p><i class="fa fa-star" aria-hidden="true"></i>Hang: G H I </p>
          <p><i class="fa fa-users" aria-hidden="true"></i></i>Số lượng: <?php echo $tournament -> number_players?> </p>
          <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $tournament -> start_date?> - <?php echo $tournament -> end_date?></p>
          <p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $tournament -> address?></p>
          <p><i class="fa fa-phone" aria-hidden="true"></i>0384705005</p>
          <p><i class="fa fa-trophy" aria-hidden="true"></i>Quán quân: 3.000.000 VND</p>
          <p><i class="fa fa-usd" aria-hidden="true"></i></i>Á quân: 3.000.000 VND</p>
          <p><i class="fa fa-usd" aria-hidden="true"></i></i>Giải ba: 500.000 VND</p>
          <hr>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa-solid fa-medal"></i>Thông tin</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Quán Quân</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>30-10-2002</h6>
          <p>The Billar House</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Quán Quân</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>30-10-2002</h6>
          <p>The Billar House</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Quán Quân</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>30-10-2002</h6>
          <p>The Billar House</p>
          <hr>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
<div class="d-grid gap-2 btn-in-tournament">
  <button class="btn btn-primary" type="button">Đăng ký thi đấu</button>
</div>



</body>
</html>
