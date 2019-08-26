<html>
<style>
  .post{
    -border: solid black .5px;
    margin-top: 5px;
  }
  .titulo{
    font-weight: bold;
  }
  .oculto{
    display: none;
  }
</style>
  <head>
    <?php require 'kiosco_materialize.php'; ?>
    <style media="screen">


    header{
      padding-left: 300px;
      height: 70px;
      margin-top: -2px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    li#nav{
      padding: .75em;
    }

    .menu-img{
      max-width:90%;
      height: auto;
      padding: .5em;
    }

    .btn-menu{
      border: none;
      height: 125px;
      width: 125px;

    }

    .btn-profile{
      border: none;

    }

    .post{
      -border: solid black .5px;
      margin-top: 5px;
    }
    .titulo{
      font-weight: bold;
    }
    .oculto{
      display: none;
    }

    </style>

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  </head>


  <body>



    <!-- Navbar goes here -->

<header style="background-color: #5F77B7">
  <?php require 'kiosco_conectar_bdd.php'; ?>
  <?php
  if(!isset($_SESSION["S_id"])){
    header("location: error.php");
  }?>
  <?php // aux query for user
    $query = "SELECT foto , puntaje FROM Users WHERE id = $_SESSION[S_id]";
    $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
    $row = mysqli_fetch_row($result);
    $profile = "img/".$row[0].".png";
  ?>
  <div class="valign-wrapper right">
    <a onclick="logout()" class=" btn btn-large right grey-text" style="margin-top:10px;background-color: #455685;"> <i class="material-icons right">exit_to_app</i>Salir </a>
  </div>

  <div class="valign-wrapper right" style="width:70px;">
    <img src="<?php echo $profile;?>" alt="" onclick="location.href='perfil.php';" class="circle responsive-img right menu-img waves-effect waves-light ">
  </div>
  <div class="valign-wrapper right" style="margin-bottom: -20px; margin-top: -5px;">
    <p class="white-text flow-text"> <?php echo $row[1]; ?></p>
  </div>
  <div class="valign-wrapper right" style="width:50px; margin-right:5px;">
    <img  src="img/beecoin3.png" alt="" onclick="location.href='kiosco_favores.php';" class="circle  z-depth-2 responsive-img right menu-img waves-effect waves-light" style="padding:0px; margin-top:10px;">
  </div>


  <div class="valign-wrapper center">
  <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only orange-text text-lighten-2 "><i class="material-icons medium">format_indent_decrease</i></a>
  <img src="img/comuna_sm.png" alt=""  class="right menu-img">
  </div>
  <?php require 'kiosco_desconectar_bdd.php'; ?>
  <!-- <div class = "white-text hide-on-large-only">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons white">menu</i></a>
  Menu
  </div> -->
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo center hide-on-small-only" ><img class="menu-img" src ="img/comuna_amarillo.png" style="max-width:150px;"></img></li>
    <li id="nav" class="center" ><button class = "waves-effect waves-light z-depth-2 blue light-blue lighten-4 btn-menu" onclick="location.href='kiosco_publicaciones.php';" > <img class="menu-img" src ="img/planes.png"></img></button></li>
    <li id="nav" class="center" ><button class = "waves-effect waves-light z-depth-2 blue light-blue lighten-4 btn-menu" onclick="location.href='kiosco_main_menu.php';"  > <img class="menu-img" src ="img/mercado.png"></img></button></li>
    <li id="nav" class="center" ><button class = "waves-effect waves-light z-depth-2 blue light-blue lighten-4 btn-menu" onclick="location.href='kiosco_favores.php';"  > <img class="menu-img" src ="img/favores.png"></img></button></li>
  </ul>

</header>


  </body>
</html>

    <!-- Page Layout here -->
<main>



      <div class="row">


        <div class="col teal s12">


      <div  class="fixed-action-btn"  style="bottom: 45px; right: 24px;">
        <button id="scroll-btn" onClick="topFunction()" class="btn-floating btn-large red">
          <i class="material-icons">arrow_upward</i>
        </button>
      </div>
    </div>
  </div>


</main>



 <!-- scripts go here -->





<script>
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.sidenav');
   var instances = M.Sidenav.init(elems, options);
 });


 $(document).ready(function(){
   $('.sidenav').sidenav();
 });

 function logout(){
   window.location.replace("logout.php");
   return false;
 }



</script>
