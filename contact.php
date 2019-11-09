<?php 
include_once("model/data.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/contact.css">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <?php 
  if (!isset($_SESSION["login"])) {
    header('Location: /login.php');
  }
  if(isset($_REQUEST['dangxuat'])){
    session_unset();
    header('Location: /login.php');
  }
  if (isset($_REQUEST['submitadd'])) {
    $tenadd   = $_REQUEST['tenadd'];
    $emailadd = $_REQUEST['emailadd'];
    $phoneadd = $_REQUEST['phoneadd'];
    $addNhom  = $_REQUEST['addNhom'];
    danhba::addDB($tenadd, $emailadd, $phoneadd,$addNhom);
    header('Location: /contact.php');
  }
  elseif (isset($_REQUEST['submitnhomadd'])) {
    $nhomadd= $_REQUEST['nhomadd'];
    if ($nhomadd !="") {
      nhom::addNhom($nhomadd);
      header('Location: /contact.php');
    }
  }
  ?>
  <div class="modal fade" id="exampleModalnhom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 110px;">
      <form action="" method="get" accept-charset="utf-8">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm nhãn</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group row">
              <label for="inputEmail10" class="col-sm-2 col-form-label">Tên Nhãn:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nhomadd" id="inputEmail10" placeholder="Tên nhãn..">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitnhomadd" class="btn btn-primary" >Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 110px;">
      <form action="" method="get" accept-charset="utf-8">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tenadd" id="inputEmail3" placeholder="Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail4" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="emailadd" id="inputEmail4" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail5" class="col-sm-2 col-form-label">Số điện thoại:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phoneadd" id="inputEmail5" placeholder="Số điện thoại..">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Chọn nhóm</label>
              <select class="form-control" id="exampleFormControlSelect1" name="addNhom">
               <?php 
               $listnhom= nhom::getListNhom();
               foreach ($listnhom as $value) { ?>
                <option value="<?php echo $value->maNhom; ?>"><?php echo $value->tenNhom; ?></option>
              <?php }
              ?>

            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submitadd" class="btn btn-primary" >Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="page-topbar">
 <div class="logo-area"> </div>
 <div class="quick-area">
<button id="shiled-button"><i class="fa fa-bars" aria-hidden="true"></i></button>
  <ul class="pull-left info-menu  user-notify">
    <a class="danh-ba" href="contact.php">
      <img src="img/contacts_48dp.png" alt="contacts" id="menu_contacts"> <span id="danhba"> Danh bạ</span>
    </a>

  </ul>

  <div class="search-container">
    <form action="/action_page.php" class="search">
      <input type="text" placeholder="Search.." name="search" id="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  
  <ul class="info-menu user-info info-top">
   <li class="profile">
     <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
       <img src="img/contacts_48dp.png" class="">
       <span style="color: #ab6464;; font-weight: 600;"><?php 
       $asds = danhba::showname();
       echo $asds; ?><i class="fa fa-angle-down"></i></span>
     </a>
     <ul class="dropdown-menu profile fadeIn " style="top: -40px;">
      <li>
        <a href="#settings">
          <i class="fa fa-wrench"></i>
          Chào <span style="color: #ab6464;; font-weight: 600;"><?php 
          $asds = danhba::showname();
          echo $asds; ?></span>
        </a>
      </li>
      <li>
        <a href="#profile">
          <i class="fa fa-user"></i>
          Profile
        </a>
      </li>

      <li class="last">
        <a href="?dangxuat">
          <i class="fa fa-lock"></i>
          Sign Out
        </a>
      </li>
    </ul>


  </li>
</ul>

</div>
</div>

<div class="page-sidebar expandit">
  <div class="sidebar-inner" id="main-menu-wrapper">
   <div class="profile-info row ">
     <div class="">
      <button class="btn-create-contacts" type="button" data-toggle="modal" data-target="#exampleModal">
        <span>
          <svg width="36" height="36" viewBox="0 0 36 36">
            <path fill="#34A853" d="M16 16v14h4V20z"></path>
            <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
            <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
            <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
            <path fill="none" d="M0 0h36v36H0z"></path>
          </svg>
        </span>
        <span class="justify-content-center" id="taoLH" >Tạo liên hệ</span>

      </button>   

    </div>

  </div>

  <ul class="wraplist" style="height: auto;"> 
    <!--          <li class="menusection">Main</li>-->
    <li>
      <a href="">
        <span class="sidebar-icon">
          <i class="fas fa-user-alt"></i>
        </span> 
        <span class="menu-title">Danh bạ</span>
      </a>
    </li>
    <li>
      <a href="">
        <span class="sidebar-icon">
          <i class="fas fa-history"></i>
        </span> 
        <span class="menu-title">Thường xuyên liên hệ</span>
      </a>
    </li>
    <li>
      <a href="">
        <span class="sidebar-icon">
          <i class="fas fa-copy"></i>
        </span> 
        <span class="menu-title">Liên hệ trùng lặp</span>
      </a>
    </li>
    <li class="nhan">
      <a href="#" title="" >
        <span class="sidebar-icon" style="padding-left: 10px;">
          <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe null tranform">
            <path fill="none" d="M0 0h24v24H0V0z"></path>
            <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"></path>
          </svg>
        </span> 
        <span onclick="myFunction()"class="menu-title" style="padding-left: 10px;">Nhãn</span>
      </a>
      
    </li>
    <li>
      <ul class="item-nhan item-show" style="overflow-y: auto;">
        <?php 

        foreach ($listnhom as $value) { ?>
          <li><a href="?mn=<?php echo $value->maNhom; ?>" title="">
            <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16zM16 17H5V7h11l3.55 5L16 17z"></path></svg>
            <?php echo $value->tenNhom; ?></a></li>
          <?php }
          ?>
          <li><a href="#" data-toggle="modal" data-target="#exampleModalnhom" title="#"><i class="fas fa-plus" ></i>Tạo nhãn</a></li>

        </ul>
      </li>
    </ul>
  </div>  
</div>
<section id="main-content">
 <section class="wrapper main-wrapper row">        
  <div class="row dsDanhBa">
    <div class="col-5">
      <span class="pl-5">Tên</span>
    </div>
    <div class="col-5">
      <span class="pl-5">Email</span>
    </div>
    <div class="col-2">
      <span>Số điện thoại</span>
    </div>
  </div>
  <hr style="width: 98%">
  <?php 
  if (isset($_REQUEST['mn'])) {
    $mn      = $_REQUEST['mn'];
    $dsBD = danhba::getListDBforNhom($mn);
  }
  else{
    $dsBD = danhba::getListDB(); }
    foreach ($dsBD as $value) { ?>
      <div class="form-check myrow">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck<?php echo $value->iddb; ?>">
        <label class="form-check-label" for="defaultCheck<?php echo $value->iddb; ?>">

          <div class="row pt-1 ">
            <div class="col-5">
              <span class="pl-3" style="color: #ab6464;"><?php echo $value->tendb; ?></span>
            </div>
            <div class="col-5">
              <span style="color: #ab6464;"><?php echo $value->emaildb; ?></span>
            </div>
            <div class="col-2">
              <span style="color: #ab6464;"><?php echo $value->sdtdb; ?></span>
            </div>
          </div>

        </label>
      </div>
    <?php }

    ?>

  </section>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    
    $('button#shiled-button').click(function() {
      if ($('.page-sidebar').hasClass('expandit')){
        $('.page-sidebar').addClass('collapseit');
        $('.page-sidebar').removeClass('expandit');
        $('.profile-info').addClass('short-profile');
        $('.logo-area').addClass('logo-icon');
        $('#main-content').addClass('sidebar_shift');
        $('.menu-title').css("display", "none");
        $('#taoLH').css('display', 'none');
      } else {
        $('.page-sidebar').addClass('expandit');
        $('.page-sidebar').removeClass('collapseit');
        $('.profile-info').removeClass('short-profile');
        $('.logo-area').removeClass('logo-icon');
        $('#main-content').removeClass('sidebar_shift');
        $('.menu-title').css("display", "inline-block");
        $('#taoLH').css({'display': 'inline-block', 'transition' : 'all 5s'});
      }
    });

    $('li.nhan').click(function() {
      if ( $('svg.NSy2Hd.RTiFqe.null').hasClass('notranform')) {
       $('svg.NSy2Hd.RTiFqe.null').addClass('tranform');
       $('svg.NSy2Hd.RTiFqe.null').removeClass('notranform');
       $('.item-nhan').addClass('item-show');
       $('.item-nhan').removeClass('item-hidden');
     } else{
      $('svg.NSy2Hd.RTiFqe.null').removeClass('tranform');
      $('svg.NSy2Hd.RTiFqe.null').addClass('notranform');

      $('.item-nhan').addClass('item-hidden');
      $('.item-nhan').removeClass('item-show');

    }
  });
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".myrow").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    function myFunction() {
  alert("Hello! I am an alert box!");
}
  });
</script>
</body>
</html>