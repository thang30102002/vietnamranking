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
            <h2><?php echo $player -> name;?></h2>
          </div>
        </div>
        <div class="w3-container ">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Hang: <?php echo $player -> ranking?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Viet Nam</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $player -> phone;?></p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          <p>Adobe Photoshop</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
          </div>
          <p>Photography</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              <div class="w3-center w3-text-white">80%</div>
            </div>
          </div>
          <p>Illustrator</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
          </div>
          <p>Media</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
          </div>
          <br>

        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa-solid fa-medal"></i>Danh hiệu</h2>
        <div class="w3-container">
          <h4 class="w3-opacity"><b>Quán Quân</b></h4>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>30-10-2002</h6>
          <p>The Billar House</p>
          <hr>
        </div>
        <div class="w3-container">
          <h4 class="w3-opacity"><b>Quán Quân</b></h4>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>30-10-2002</h6>
          <p>The Billar House</p>
          <hr>
        </div>
        <div class="w3-container">
          <h4 class="w3-opacity"><b>Quán Quân</b></h4>
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



</body>
</html>
