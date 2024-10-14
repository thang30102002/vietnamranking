
<nav class="navbar navbar-expand-sm navbar-dark bg-dark menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="/player/index">Logo</a>
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
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Link</a>
        </li>
      </ul>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Login
      </button>
    </div>
  </div>
</nav>
<!-- Button trigger modal -->
<?php echo View::forge('player/login');?>





