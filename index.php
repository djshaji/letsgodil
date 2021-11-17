<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "config.php";
$theme = "red_blue";
$skin = "materia";
// $config ['header-bg'] = 'none text-danger';
$config ['footer-bg'] = 'text-danger';
$config ['logo'] = 'anneli/assets/img/logo.png';
// $config ['header'] = false;
include "anneli/header.php" ;
include "anneli/db.php" ;
include "anneli/ui.php" ;
// var_dump ($uid);
$cols = json_decode (file_get_contents("anneli/assets/json/feed.json"), true);
$basename = $_SERVER['REQUEST_URI'] ;

$data = sql_exec ("SELECT * from store where module = '$basename' order by auto_id desc", false);
// var_dump ($uid);
?>

<?php if ($uid == null) {?>
  <div class="section">
    <div class="container" style='margin-top:20px'>
      <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center">
          <img class="profile" src="anneli/assets/img/logo.png">

        </div>
        <h1 class="col-12 d-flex justify-content-center mt-3 text-danger bold"><?php echo $config ["codename"] ;?></h1>
        <h4 class="d-flex email justify-content-center text-muted"><?php echo $config ['description'];?></h4>
      </div>
      <div class="row justify-content-center mt-2">
        <button class="d-none btn-login btn-lg col-md-2 col-5 text-white btn nav-link btn-primary" data-bs-toggle="modal" data-bs-target="#login" id="menu-login" onclick="ui('login-spinner').classList.remove ('d-none');">
          <i class="fa fa-shield-alt"></i> Login
          <div id="login-spinner" class="ml-1 d-none spinner-border text-white" style="width:20;height:20" role="status">
            <span class="sr-only">Loading...</span>
          </div>

        </button>
      </div>
    </div>
  </div>

    <?php } else { ?>
      <div class="section">
        <div class="container m-2">
        <?php
          if (sizeof ($data) > 0)
            ui_cards ($data, "Title", "Description", "Images");
          ui_table_dialog ($cols, "Feed", "store", true, "json", 'setperm|$Images|'.$uid .'|read|public');
        ?>
      </div>
    </div>
    <?php } ?>
<?php
// fab ("fab") ;
include "anneli/footer.php" ;
?>