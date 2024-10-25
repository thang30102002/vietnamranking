
<nav class="navbar navbar-expand-sm navbar-dark bg-dark menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="/player/index">Logo</a>
    <?php 
      if(Session::get('logged_in') === true)
      {
        $player = Model_Player::get_detail_player(Session::get('id'));
        echo "
          <a class='name_player_menu'>".$player -> name."</a>
          ";
      }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto ul-menu">
        <li class="nav-item">
          <a class="nav-link" href="/player/index">Ranking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/player/tournament">Giải đấu</a>
        </li>
        <?php
          if (Session::get('logged_in') === true)
          {
            echo "<li class='nav-item'>
          <a class='nav-link' href='/player/info'>Hồ sơ</a>
        </li>";
          }
        ?>
      </ul>
      <?php
        if (Session::get('logged_in') === true)
        {
          echo "
          <form action='/logout'>
            <button name='action' value='logout' type='submit' class='btn btn-primary' >
              Logout
            </button>
          </form>";
          Session::set('url',Uri::string());

        }
        else
        {
          echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
        Login
      </button>";
          Session::set('url',Uri::string());
        }
      ?>
      
    </div>
  </div>
</nav>
<!-- Button trigger modal -->
<?php echo View::forge('player/login');?>





