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




  </style>

  <?php require 'kiosco_materialize.php'; ?>

    <script type="text/javascript">


$(document).ready(function(){
$('.carousel').carousel(); 
//toggle(); 
});


var instance = M.Carousel.init({
  fullWidth: true,
  indicators: true
});

// Or with jQuery
$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: true
});

//mover el carousel con los anuncios cada cierto tiempo
setTimeout(autoplay, 15000);
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 15000);
}

//o se muestran los anuncios o se muestra el form de login
function toggle() {
    var x = document.getElementById("anuncios");
    var y = document.getElementById("menu");
    if (y.style.display == "block") {
        y.style.display = "none";
        x.style.display = 'block';
        x.style.height = "100vh";


    } else {
        x.style.display = "none";
        y.style.display = 'block';
    }
}




  </script>
</head>

<body>

<?php
$username = "";
$password = "";
$username_err = "";
$password_err = "";

?>

        <!--ANUNCIOS-->
        <div id='anuncios' class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php
              $colors = ['amber', 'red', 'green','blue','purple'];
              $c=0;
              require 'kiosco_conectar_bdd.php';
              $sql = "SELECT * FROM Publicacion ORDER BY publicacionID DESC LIMIT 5" ;
              $q1 = mysqli_query($conexion, $sql);
              if(mysqli_num_rows($q1)!=0){
                while($d=mysqli_fetch_assoc($q1))
                {
            ?>
              <div class="carousel-item <?php echo $colors[$c];?>" href="#one!">
                  <div class="container-fluid">
                    <div class="row">

                      <div class="card-panel valign-wrapper <?php echo $colors[$c]; $c++;?> accent-2">
                        <div class=" col s2">
                          <img style="background-color:white" src=
                           <?php if ($d['tipo']=='votacion') echo "'img/manos.png'"; ?>
                           <?php if ($d['tipo']=='evento') echo "'img/planes.png'"; ?>
                           <?php if ($d['tipo']=='anuncio') echo "'img/anuncio.png'"; ?>
                          alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>

                        <div class="col s10">
                          <h2 class="grey-text text-darken-3  left-align"><?php echo $d['titulo'];?></h2>
                          <p class='grey-text text-darken-3  flow-text left-align' class=""><?php echo $d['contenido']; ?></p>
                          <?php if ($d['tipo']=='votacion') {
                            echo "<ul class='collection'>";
                            echo "<li class='collection-item'>".$d['opc1']."</li>";
                            echo "<li class='collection-item'>".$d['opc2']."</li>";
                            if ($d['opc3']!= NULL) {
                              echo "<li class='collection-item'>".$d['opc3']."</li>";
                            }
                            echo "</ul>";
                          } ?>
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
          </div>

          
          </div>

          <div class="carousel-fixed-item center">
            <section>
              <img src="img/comuna_sm.png" alt=""  class="responsive">
            </section>
            <section style="margin-top: 25px;">
              <!--<button class='btn btn-warning' onclick="toggle()" id="btnEntrar">Entrar al sistema</button>-->
              <a class='btn btn-warning' id="btnEntrar" href='elegirEntrar.php'>Entrar al sistema</a>
            </section>

          </div>


          

         
        </div>
        <!--FIN ANUNCIOS-->
<!-- <script type="text/javascript">
  var x = document.getElementById("anuncios");
  x.style.display='none';
</script> -->




  <div class="section"></div>



 
    <!--FIN SIGNUP-->

  </div>
</div>


</body>

</html>
<?php ?>
