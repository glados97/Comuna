<?php
session_start();
date_default_timezone_set('America/New_York');
require 'disable_right_click.php';
// $id = $_SESSION('id');
// echo $id;
// var_dump($_SESSION);
$counter=1;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php require 'kiosco_materialize.php'; ?>
    <style media="screen">

    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    li#nav{
      padding: 2em;
    }

    .menu-img{
      max-width:100%;
      height: auto;
      padding: .5em;
    }

    .btn-menu{
      border: none;
      height: 200px;

    }

    #titulo
    {
      text-align: center;
    }

    /*.submitContainer 
    {
      display: flex;
      align-items: center;
    }
    .btnSubmit 
    {
      margin-left: 30vw;
      flex-grow: 1;
    }
    .btnCancel 
    {
      margin-right: 30vw;
    }*/

    main{
      padding: 0;
    }
    .formMargin
    {
      margin-top: 20px;
      margin-left: 15px;
      margin-right: 15px;
    }
    .errorSpan
    {
      color: red;
      vertical-align: middle;
    }

    </style>
<script>
    $(document).ready(function(){
      var errorNombre = false;
      var errorTelefono = false;
      var errorHora =  false;
      var errorFechaInicio = false;
      var errorFechaFin = false;
      var errorPrecio = false;
      var errorDescripcion = false;

      $("#producto_nombre").focusout(function(){
        checarNombre();
      });

      $("#producto_tele").focusout(function(){
        checarTelefono();
      });

      $("#producto_hora").change(function(){
        checarHora();
      });

      $("#producto_dias_inicio").focusout(function(){
        checarInicio();
      });

      $("#producto_dias_fin").focusout(function(){
        checarFin();
      });

      $("#producto_precio").focusout(function(){
        checarPrecio();
      });

      $("#producto_desc").focusout(function(){
        checarDescripcion();
      });

      $("#submitProduct").submit(function(e){
        validarSubmit(e);
      });
      </script>

<form id = "forma-favor" name= "forma-favor" class = "col s12" method = "POST" enctype="multipart/form-data" >
  <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION['S_id']; ?>">


  <br><br><br>
  <div class = "col s12">

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">title</i>
      <textarea placeholder="Título del favor" name ="titulo-favor" class = "validate materialize-textarea" required = "true" maxlength = "55" data-length = "55"></textarea>
    </div>
  </div>

  <div class = "col s4" style="padding-left: 35px;">
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "fisico" checked />
        <span>Físico</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "tecnologia"  />
        <span>Tecnología</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "bienestar"  />
        <span>Bienestar</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "hogar" />
        <span>Hogar</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "otros" />
        <span>Otros</span>
      </label>
    </p>

    <div class = "col s12">
      <i class="grey-text">(seleccionar categoría)</i>
    </div>
  </div>

  <div class = "col s8">
    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">mode_edit</i>
      <textarea  placeholder="¿Qué favor quiere pedir?" name ="contenido-favor"  class="validate materialize-textarea" required = "true" maxlength = "150" data-length = "150"></textarea>
    </div>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">perm_contact_calendar</i>
      <textarea  placeholder="Contacto: teléfono/dirección/etc." name ="contacto-favor"  class="validate materialize-textarea" required = "true" maxlength = "150" data-length = "150"></textarea>
    </div>
  </div>


</form>

 <!-- <div class="row">
 <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($confirm_password_err))
              echo "<div class = 'red-text col s12'>La confirmación de contraseña no coincide</div>";
              //en caso de presentar este error, mostrar valores con que llenó la forma

          ?>
          <div class="input-field col s4">
            <input placeholder="Ejemplo: Churros" name="producto_nombre" id="producto_nombre" type="text" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_nombre'])."'"; ?> maxlength="100" required>
            <label for="producto_nombre">Nombre del producto</label>
          </div>
          <div class="input-field col s4">
            <input placeholder="Ejemplo: 811 123 4567" name="producto_tele" id="producto_tele" type="text" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_tele'])."'"; ?> maxlength="15" required>
            <label for="producto_tele">Teléfono de Contacto</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h6>Teléfono de contacto</h6>
            <input id="producto_tele" type="tel" class="form-control" placeholder="Ejemplo: 811 123 4567" name="producto_tele" type="text" maxlength="15">
            </br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h6>Horario de venta</h6>
            <input required id="producto_hora" class="form-control" type="time" name="producto_hora">
            </br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h6>Día en que inicia la venta</h6>
            <input required id="producto_dias_inicio" class="form-control" name="producto_dias_inicio" type="date" min=<?php echo date("Y-m-d"); ?> max="2020-12-31">
            </br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h6>Día en que termina la venta</h6>
            <input required id="producto_dias_fin" class="form-control" type="date" name="producto_dias_fin" name="producto_dias_fin" min=<?php echo date("Y-m-d"); ?> max="2020-12-31">
            </br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h6>Precio del producto</h6>
            <input required id="producto_precio" class="form-control" type="number" min="0" step="1" placeholder="Ejemplo: $15" name="producto_precio" max="5000" min="0">
            </br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h6>Descripción del producto</h6>
            <textarea required id="producto_desc" class="form-control" name="producto_desc" placeholder="Ejemplo: Vendo churros hechos en casa afuera de la escuela." maxlength="250" rows="2"></textarea>
            </br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="submitContainer">
              <div class="btnSubmit">
                <button name='submitProduct' type="submit" class='btn btn-warning btn-lg'>Publicar</button>
              </div>
              <div class="btnCancel">
                  <a href="kiosco_main_menu.php" class='btn btn-danger' role='button'>Cancelar</a>
              </div>     
            </div>   --> 
          <!--</form>
           </div>
        </div>       
      </div>-->


      <!-- <div class="content">
        <h4 id="titulo">Agregar Nuevo Producto</h4>
          <form id="forma_producto" name="forma_producto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col s12">
            <h6>Nombre del producto</h6>
            <input required id="producto_nombre" placeholder="Ejemplo: Churros" name="producto_nombre" type="text" maxlength="100">
            <h6>Teléfono de contacto</h6>
            <input id="producto_tele" type="tel" placeholder="Ejemplo: 811 123 4567" name="producto_tele" type="text" maxlength="15">
            <h6>Horario de venta</h6>
            <input required id="producto_hora" type="time" name="producto_hora">
            <h6>Día en que inicia la venta</h6>
            <input required id="producto_dias_inicio" name="producto_dias_inicio" type="date" min=<?php echo date("Y-m-d"); ?> max="2020-12-31">
            <h6>Día en que termina la venta</h6>
            <input required id="producto_dias_fin" type="date" name="producto_dias_fin" name="producto_dias_fin" min=<?php echo date("Y-m-d"); ?> max="2020-12-31">
            <h6>Precio del producto</h6>
            <input required id="producto_precio" type="number" min="0" step="1" placeholder="Ejemplo: $15" name="producto_precio" max="5000" min="0">
            <h6>Descripción del producto</h6>
            <textarea required id="producto_desc" name="producto_desc" placeholder="Ejemplo: Vendo churros hechos en casa afuera de la escuela." maxlength="250"></textarea>
                <br>    
                <br>      
            <div class="submitContainer">
              <div class="btnSubmit">
                <button name='submitProduct' type="submit" class='btn btn-warning btn-lg'>Publicar</button>
              </div>
              <div class="btnCancel">
                  <a href="kiosco_main_menu.php" class='btn btn-danger' role='button'>Cancelar</a>
              </div>     
            </div>   
          </form>
      </div> -->
    </main>

  </body>
</html>
