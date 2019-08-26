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


      function checarNombre()
      {
        var regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/;
        if (regex.test($('#producto_nombre').val()))
        {
          //alert('Nombre correcto');
          $("#errorNombre").text("");
        }
        else
        {
          alert('Nombre INcorrecto o vacío');
          $("#errorNombre").text("Nombre no válido. Solo puede utilizar letras, números no.");
          errorNombre = true;
        }
      }

      function checarTelefono()
      {
        var regex = /^\d+(-\d+)*$/;
        if (regex.test($('#producto_tele').val()))
        {
          //alert('Apellido correcto');
          $("#errorTelefono").text("");
        }
        else
        {
          alert('Teléfono inválido');
          $("#errorTelefono").text("Teléfono no válido. Solo puede usar números y guiones (-), letras no.");
          errorTelefono = true;
        }
      }

      function checarHora()
      {
        if($('#producto_hora').val().length === 0 ) 
        {
          alert('Vacío.');
          $("#errorHora").text("Introduzca una hora completa (Hora:Minuto AM/PM");
          errorHora = true;
        }
        else
        {
          $("#errorHora").text("");
          errorHora =  false;
        }
      }

      function checarInicio()
      {
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        var fechaInput = new Date($('#producto_dias_inicio').val());
        //fechaInput.setFullYear(fechaInput.getFullYear() + 18); //sumar 18 años a su fecha de nacimiento
        //alert(fechaInput);
        //alert(now);

        if(fechaInput < now) //si la fechaInput es menor que now, es un error, porque es pasada
        {
          alert('Fecha del pasado Inicio error.');
          $("#errorFechaInicio").text("No puede establecer una fecha anterior a hoy.");
          errorFechaInicio = true;
        }
        else
        {
          $("#errorFechaInicio").text("");
          errorFechaInicio =  false;
        }
      }

      function checarFin()
      {
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        //now.setFullYear(now.getFullYear() + 18); //sumar 3 años a la fecha actual como tope

        var fechaInput = new Date($('#producto_dias_fin').val());

        if(fechaInput < now) //si la fechaInput es menor que now, es un error, porque es pasada
        {
          alert('Fecha erronea.');
          $("#errorFechaFin").text("No puede establecer una fecha demasiado lejana a hoy.");
          errorFechaInicio = true;
        }
        else
        {
          $("#errorFechaFin").text("");
          errorFechaInicio =  false;
        }
      }

      function checarPrecio()
      {
        if($('#producto_precio').val() > 0 ) 
        {
          //alert('Contraseñas coinciden.');
          $("#errorPrecio").text("");
        }
        else
        {
          alert('Error en precio');
          $("#errorPrecio").text("El precio debe ser mayor que cero.");
          errorPrecio = true;
        }
      }

      function checarDescripcion()
      {
        if($('#producto_desc').val().length === 0 ) 
        {
          alert('Vacío.');
          $("#errorDescripcion").text("No puede dejar el campo vacío");
          errorDescripcion = true;
        }
        else
        {
          $("#errorDescripcion").text("");
          errorDescripcion =  false;
        }
      }

      function validarSubmit(e)
      {
        var errorNombre = false;
        var errorTelefono = false;
        var errorHora =  false;
        var errorFechaInicio = false;
        var errorFechaFin = false;
        var errorPrecio = false;
        var errorDescripcion = false;

        checarNombre();
        console.log("NOMBRE: " + errorNombre);
        checarTelefono();
        console.log("TELEFONO: " + errorTelefono);
        checarHora();
        console.log("HORA: " + errorHora);
        checarInicio();
        console.log("FECHA INI: " + errorFechaInicio);
        checarFin();
        console.log("FECHA FIN: " + errorFechaFin);
        checarPrecio();
        console.log("PRECIO: " + errorPrecio);
        checarDescripcion();
        console.log("DESCRIPCIÓN: " + errorDescripcion);

        if(errorNombre == false && errorTelefono == false && errorHora ==  false && errorFechaInicio == false && errorFechaFin == false && errorPrecio == false && errorDescripcion == false)
        {
          //si no hay errores, hacer submit
          alert("Producto publicado en el mercado.");
        }
        else
        {
          alert("PRODUCTO NO PUBLICADO. Hay errores en uno o varios de los campos. Revise el texto en rojo y corríjalos antes de volver a intentar. No deje ningún campo vacío.");
          e.preventDefault();
        }
      }
    });
  </script>

      <script>
       /*function publicar(){
                    if (document.forms["forma_producto"]["producto_nombre"].value == "" ||
                     document.forms["forma_producto"]["producto_tele"].value == "" ||
                     document.forms["forma_producto"]["producto_dias_inicio"].value == "" ||
                     document.forms["forma_producto"]["producto_desc"].value == "" ||
                     document.forms["forma_producto"]["producto_hora"].value == "" ||
                     document.forms["forma_producto"]["producto_precio"].value == ""
                   ) {
                        alert("Llene todos los datos pertinentes");
                    }else{
                      document.getElementById("forma_producto").submit();
                    }

                  }*/
        function logout() {
                   window.location.replace("index.php");
                   return false;
               }


      </script>

  </head>



  <body>

    <?php require 'menu.php'; ?>

    <main>
      <!--Llamado del botón de NUEVO PRODUCTO -->
      <!--Form para agregar un nuevo producto al Mercadito-->
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4 id="titulo">Agregar Nuevo Producto al Mercado</h4>
            <form id="forma_producto" name="forma_producto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col-lg-12 formMargin">
          </div>
        </div>

        <div class="row formMargin">
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($confirm_password_err))
              echo "<div class = 'red-text col s12'>La confirmación de contraseña no coincide</div>";
              //en caso de presentar este error, mostrar valores con que llenó la forma

          ?>
          <div class='col-lg-6'>
            <label for="producto_nombre">Nombre del producto</label>
            <input placeholder="Ejemplo: Churros" name="producto_nombre" id="producto_nombre" type="text" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_nombre'])."'"; ?> maxlength="50" required>
          </div>
          <div class='col-lg-6'>
            <span id="errorNombre" class="errorSpan"></span>
          </div>            
        </div>
        <div class='row formMargin'>
          <div class='col-lg-6'>
            <label for="producto_tele">Teléfono de contacto</label>
            <input placeholder="Ejemplo: 811 123 4567" name="producto_tele" id="producto_tele" type="text" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_tele'])."'"; ?> maxlength="15" required>
          </div>
          <div class='col-lg-6'>
            <span id="errorTelefono" class="errorSpan"></span>
          </div>
        </div>
        <div class='row formMargin'>
          <div class='col-lg-6'>
            <label for="producto_hora">Hora de inicio de la venta</label>
            <input name="producto_hora" id="producto_hora" type="time" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_hora'])."'"; ?> required>
          </div>
          <div class='col-lg-6'>
            <span id="errorHora" class="errorSpan"></span>
          </div>
        </div>
        <div class='row formMargin'>
          <div class='col-lg-6'>
            <label for="producto_dias_inicio">Día en que inicia la venta</label>
            <input name="producto_dias_inicio" id="producto_dias_inicio" type="date" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_dias_inicio'])."'"; ?> min=<?php echo date("Y-m-d"); ?> max="2020-12-31" required>
          </div>
          <div class='col-lg-6'>
            <span id="errorFechaInicio" class="errorSpan"></span>
          </div>
        </div>
        <div class='row formMargin'>
          <div class='col-lg-6'>
            <label for="producto_dias_fin">Día en que termina la venta</label>
            <input name="producto_dias_fin" id="producto_dias_fin" type="date" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_dias_fin'])."'"; ?> min=<?php echo date("Y-m-d"); ?> max="2020-12-31" required>
          </div>
          <div class='col-lg-6'>
            <span id="errorFechaFin" class="errorSpan"></span>
          </div>
        </div>
        <div class='row formMargin'>
          <div class='col-lg-6'>
            <label for="producto_precio">Precio del producto</label>
            <input placeholder="Ejemplo: 20" name="producto_precio" id="producto_precio" type="number" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_precio'])."'"; ?> min="0" step="1" max="5000" required>
          </div>
          <div class='col-lg-6'>
            <span id="errorPrecio" class="errorSpan"></span>
          </div>
        </div>
        <div class='row formMargin'>
          <div class='col-lg-6'>
            <label for="producto_desc">Descripción del producto</label>
            <textarea placeholder="Ejemplo: Vendo churros hechos en casa afuera de la escuela." name="producto_desc" id="producto_desc" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['producto_desc'])."'"; ?> maxlength="250" rows="2" required></textarea>
          </div>
          <div class='col-lg-6'>
            <span id="errorDescripcion" class="errorSpan"></span>
          </div>
        </div>

        <center class='formMargin'>
            <button name='submitProduct' type="submit" class='btn btn-warning btn-lg'>Publicar</button>
              <a href="kiosco_main_menu2.php" class='btn btn-danger' role='button'>Cancelar</a>
        </center>

      </form>
      </div>

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
