<?php      
require 'kiosco_conectar_bdd.php';

//require 'disable_right_click.php';

require 'kiosco_desconectar_bdd.php';

//Open login page
?>
<html>
<meta charset="utf-8">
<head>

  <style>
  body
  {
  	background: #f5f5f5;
  }

  h5
  {
  	font-weight: 400;
  }

  .container
  {
  	margin-top: 30px;
  	width: 800px;
  	height: 600px;
  }

  .tabs .indicator
  {
  	background-color: #e0f2f1;
  	height: 60px;
  	opacity: 0.3;
  }

  .form-container
  {
  	padding: 40px;
  	padding-top: 10px;
  }

  .confirmation-tabs-btn
  {
  	position: absolute;
  }

  .card-panel{
    min-width: 50vh;
    min-height: 50vh;
  }

  .anuncios{
    display:none;
  }

  .verde
  {
    background-color: #41C48F;
  }

  .morado
  {
    background-color: #833AAA;
  }

  .naranja
  {
    background-color: #E98B36;
  }

  .amarillo
  {
    background-color: #FBDE54;
  }

  .carousel
  {
    height: 60%;
  }

  .item, .active, .carousel-inner, .carousel-item
  {
    height: 100%;
  }

  .mainImg
  {
    max-height: 100px;
  }

  .carousel-item
  {
    padding-top: 8.5%;
  }

  html,body{height:100%;}

  .marginBtnEntrar
  {
    margin-top: 30px;
  }


  </style>

  <?php require 'kiosco_materialize.php'; ?>

    
</head>

<body>

<?php
$username = "";
$password = "";
$username_err = "";
$password_err = "";

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 text-center">
    <img src="img/Comuna-02.png" class="img-fluid mainImg">
    </div>
  </div>

  <div class="row mitadheight">
    <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
        <div class="carousel-inner">
            <?php
                $colors = ['verde', 'morado', 'naranja','amarillo'];
                $c=0;
                require 'kiosco_conectar_bdd.php';
                $sql = "SELECT * FROM Publicacion ORDER BY publicacionID DESC LIMIT 4" ;
                $q1 = mysqli_query($conexion, $sql);
                //echo "rows ".mysqli_num_rows($q1);
                if(mysqli_num_rows($q1)!=0)
                {
                  while($d=mysqli_fetch_assoc($q1))
                  {
                      if($c == 0)
                        $class= "carousel-item active ".$colors[$c];
                      else
                        $class= "carousel-item ".$colors[$c];
              ?>

                    <div class="<?php echo $class; $c++; ?>">
                      <!--<img src="img/beetcoin.png" alt="Los Angeles">
                      <span>HOLAAAAA<?php echo $d['titulo']; ?></span>-->
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-3"></div>
                          <div class="col-6">
                            <div class="row">
                              <div class="col-3">
                                <!--<img src="img/beetcoin.png" alt="Los Angeles" class="img-thumbnail">-->
                                <img style="background-color:white" src=
                                     <?php if ($d['tipo']=='votacion') echo "'img/manos.png'"; ?>
                                     <?php if ($d['tipo']=='evento') echo "'img/planes.png'"; ?>
                                     <?php if ($d['tipo']=='anuncio') echo "'img/anuncio.png'"; ?>
                                    alt="" class="img-thumbnail">

                              </div>
                              <div class="col-9">
                                <!--<span>HOLAAAAA<?php echo $d['titulo']; ?></span>-->
                                <h2 class="grey-text text-darken-3  left-align"><?php echo $d['titulo'];?></h2>
                                <p class='grey-text text-darken-3  flow-text left-align' class=""><?php echo $d['contenido']; ?></p>
                                <?php 
                                  if ($d['tipo']=='votacion') 
                                  {
                                    echo "<ul class='collection'>";
                                    echo "<li class='collection-item'>".$d['opc1']."</li>";
                                    echo "<li class='collection-item'>".$d['opc2']."</li>";
                                    if ($d['opc3']!= NULL) {
                                      echo "<li class='collection-item'>".$d['opc3']."</li>";
                                    }
                                    echo "</ul>";
                                  } 
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              <?php
                  }
                }
                 require 'kiosco_desconectar_bdd.php';
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-lg-12 text-center marginBtnEntrar">
      <a class='btn btn-warning' id="btnEntrar" href='elegirEntrar.php'>Entrar al sistema</a>
    </div>
  </div>

        <!--ANUNCIOS-->
        <!--
        <div id='anuncios' class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php
              $colors = ['amber', 'red', 'green','blue','purple'];
              $c=0;
              require 'kiosco_conectar_bdd.php';
              $sql = "SELECT * FROM Publicacion ORDER BY publicacionID DESC LIMIT 5" ;
              $q1 = mysqli_query($conexion, $sql);
              //echo "rows ".mysqli_num_rows($q1);
              if(mysqli_num_rows($q1)!=0)
              {
                while($d=mysqli_fetch_assoc($q1))
                {
            ?>
                  <div class="carousel-item <?php echo $colors[$c];?>" href="#one!">
                      <span>HOLAAAAA<?php echo $d['titulo']; ?></span>
                  </div>
            <?php
                }
              }
               require 'kiosco_desconectar_bdd.php';
            ?>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        -->

<script type="text/javascript">


    $(document).ready(function(){
    //$('.carousel').carousel({interval: 3000}); 
    //toggle(); 
    });

</script>

</body>

</html>
<?php ?>
