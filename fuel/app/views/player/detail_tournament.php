<!DOCTYPE html>
<html>
  <head>
    <title>Detail Player</title>
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
<body class="w3-light-grey">
<?php echo View::forge('player/header');?>
<!-- Page Container -->
<div class="w3-content w3-margin-top body-detail-player" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class=" w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="https://matchroompool.com/wp-content/uploads/eklent-kaci_profile.webp" style="width:100%" alt="Avatar">
          <div class="div-name w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $tournament -> name;?></h2>
          </div>
        </div>
        <div class="w3-container ">
          
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>
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






