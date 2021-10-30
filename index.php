<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "config.php";
$theme = "red_blue";
$skin = "materia";
$config ['header-bg'] = 'none';
$config ['footer-bg'] = 'text-danger';
$config ['logo'] = 'anneli/assets/img/logo.png';
$config ['header'] = false;
include "anneli/header.php" ;
include "anneli/db.php" ;
// var_dump ($uid);
?>

<div class="section">
  <div class="container" style='margin-top:100px'>
    <div class="row justify-content-center">
      <div class="col-12 d-flex justify-content-center">
        <img class="profile" src="anneli/assets/img/logo.png">

      </div>
      <h1 class="col-12 d-flex justify-content-center mt-3 text-danger bold"><?php echo $config ["codename"] ;?></h1>
      <h4 class="d-flex email justify-content-center text-muted"><?php echo $config ['description'];?></h4>
    </div>
    <div class="row justify-content-center mt-2">
      <?php if ($uid == null) {?>
        <button class="d-none btn-login btn-lg col-2 text-white btn nav-link btn-primary" data-bs-toggle="modal" data-bs-target="#login" id="menu-login" onclick="ui('login-spinner').classList.remove ('d-none');">
          <i class="fa fa-shield-alt"></i> Login
          <div id="login-spinner" class="ml-1 d-none spinner-border text-white" style="width:20;height:20" role="status">
            <span class="sr-only">Loading...</span>
          </div>

        </button>


        <?php } else {?>
        <!-- <div class="d-flex justify-content-center">
          <img class="profile me-2" width="40">
          <span id="email" class="email text-muted h6 text-center"></span>
        </div> -->
        <button class="btn m-1 btn-primary col-2 btn-lg">
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill bg-primary">2</span>
        </button>
        <a class="btn m-1 btn-success col-2" href="/anneli/messages.php">
          <i class="fas fa-comment-dots"></i>
          <span class="badge rounded-pill bg-success"><?php echo messages_get_unread () ;?></span>
        </a>
        <button class="btn m-1 btn-info col-2" data-bs-toggle="modal" data-bs-target="#colors">
          <i class="fas fa-cog"></i>
        </button>
        <button class="btn m-1 btn-warning col-2" onclick="logout ()">
          <i class="fas fa-sign-out-alt"></i>
        </button>
      <?php } ?>
    </div>
  </div>
</div>

<?php
include "anneli/footer.php" ;
?>