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
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style media="screen">


    header{
      padding-left: 300px;
      height: 70px;
      margin-top: -2px;
    }

    body{
      font-family: "Poppins";
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

    .logo
    {
      max-height: 100px;
      max-width: 150px;
    }

    .sticky-offset {
        margin-top: 100px;
    }

    .opcion
    {
      max-height: 75px;
      max-width: 75px;
      margin-top: 10px;
    }

    .barraLado
    {
      padding-left: 20px;
      background-color: #E2E2E2;
      position: fixed;
      height: 100%;
    }

    .margenSidebar
    {
      margin-top: 10px;
    }

    .bg-miColor
    {
      background-color: #E2E2E2;
    }

    .side
    {
      text-decoration: none;
      color: black;
    }

  .side:hover
  {
    text-decoration: none;
  }

  .miLogo
  {
    /*dimensiones originales: w=1260px y h=238px;*/
    max-height: 75px;
  }

    </style>


  </head>


  <body>



    <!-- Navbar goes here -->
  <?php require 'kiosco_conectar_bdd.php'; ?>
  <?php

  if(!isset($_SESSION["S_id"])){
    //header("location: error.php");
  }?>
  <?php // aux query for user
    //$sid = $_SESSION['S_id'];
    $sid = 1;
    $query = "SELECT foto , puntaje FROM Users WHERE id = '$sid'";
    $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error($conexion));
    $row = mysqli_fetch_row($result);
    $profile = "img/".$row[0].".png";
  ?>
  
  <?php require 'kiosco_desconectar_bdd.php'; ?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-miColor">
  <a class="navbar-brand" href="dashboard.php">
    <img src="img/Logo COMUNA black.png" alt=""  class="img-fluid miLogo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="navbar-nav ml-auto" id="navbarSupportedContent">
    <li class="dropdown">
      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
        PUBLICAR
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Evento</a>
        <a class="dropdown-item" href="kiosko_publicar_producto2.php">Producto</a>
        <a class="dropdown-item" href="kiosco_nuevo_favor.php">Favor</a>
      </div>
    </li>
    
    <li>
      <a class="nav-link">Mi cuenta</a>
    </li>

    <li>
      <a class="nav-link" href="logout.php">Salir</a>
    </li>
  </ul>
  
</nav>


  <div class="row sticky-offset">
    <div class="sidebar-expanded col-2 d-md-block barraLado text-center">
      <br>
      <ul class="list-group sticky-top">
        <li>
          <a class="side" href="kiosco_publicaciones.php">
            <img class="img-fluid opcion" src="img/calendario.png"><br><span><b>Calendario</b></span>
          </a>
        </li>
        <br>
        <li>
          <a class="side" href="kiosco_main_menu2.php">
            <img class="img-fluid opcion" src="img/carrito.png"><br><span><b>Venta de Productos</b></span>
          </a>
        </li>
        <br>
        <li>
          <a class="side" href="kiosco_favores.php">
            <img class="img-fluid opcion" src="img/manos_favores.png"><br><span><b>Favores</b></span>
          </a>
        </li>
      </ul>
      
    </div>

    <div class="col-10 offset-2">
    







  </body>
</html>



 <!-- scripts go here -->





<script>
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

document.addEventListener('DOMContentLoaded', function() {
   //var elems = document.querySelectorAll('.sidenav');
   //var instances = M.Sidenav.init(elems, options);
 });


 $(document).ready(function(){
   //$('.sidenav').sidenav();
 });

 function logout(){
   window.location.replace("logout.php");
   return false;
 }



</script>
