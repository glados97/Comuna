<?php
  session_start();
  require 'disable_right_click.php';
?>

<?php

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])){
  require 'kiosco_conectar_bdd.php';

  $fn=ucfirst(trim($_POST['perfil_nombre']));
  $ln=ucfirst(trim($_POST['perfil_apellido']));
  $dob = trim($_POST['perfil_fecha']);
  $sex = trim($_POST['sex']);

  if (isset($_POST['icons']))
    $pfp = $_POST['icons'];

  if (!isset($_POST['icons'])){ // no cambia la pfp

    if(!empty($_POST['newpassword']) && !empty($_POST['confirm_password'])){ /// si se cambia la contraseña
      $password = trim($_POST['newpassword']);
      $confirm_password = trim($_POST['confirm_password']);

      if($password != $confirm_password){
          $confirm_password_err = 'La contraseña no es la misma.';
      }

      if(empty($confirm_password_err)){ //no hay error en las contraseñas
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE Users SET first_name = '$fn', last_name= '$ln', dob='$dob', sex='$sex', password='$hash' WHERE id = $_SESSION[S_id]";

        if(mysqli_query($conexion, $sql)){
            // Redirect to home to the logged in page
            echo '<script language="javascript">';
            echo 'alert("cambios exitosos")';
            echo '</script>';
        } else{
            // echo "SHAME ON YOU AND YOUR COW.";
            echo '<script language="javascript">';
            echo 'alert("No se pudo editar el perfil, intente mas tarde o contacte a soporte")';
            echo '</script>';
           }
      }else{
        echo '<script language="javascript">';
        echo 'alert("las contraseñas no son iguales")';
        echo '</script>';
      }
    }else { //si no se cambia las contraseñas
      $sql = "UPDATE Users SET first_name = '$fn', last_name= '$ln', dob='$dob', sex='$sex' WHERE id = $_SESSION[S_id]";

      if(mysqli_query($conexion, $sql)){
          // Redirect to home to the logged in page
          echo '<script language="javascript">';
          echo 'alert("cambios exitosos")';
          echo '</script>';
      } else{
          // echo "SHAME ON YOU AND YOUR COW.";
          echo '<script language="javascript">';
          echo 'alert("No se pudo editar el perfil, intente mas tarde o contacte a soporte")';
          echo '</script>';
         }
    }

  }else{ //si cambia la pfp

    if(!empty($_POST['newpassword']) && !empty($_POST['confirm_password'])){ /// si se cambia la contraseña y pfp
      $password = trim($_POST['newpassword']);
      $confirm_password = trim($_POST['confirm_password']);

      if($password != $confirm_password){
          $confirm_password_err = 'La contraseña no es la misma.';
      }

      if(empty($confirm_password_err)){ //no hay error en las contraseñas
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE Users SET first_name = '$fn', last_name= '$ln', dob='$dob', sex='$sex', password='$hash', foto='$pfp' WHERE id = $_SESSION[S_id]";

        if(mysqli_query($conexion, $sql)){
            // Redirect to home to the logged in page
            echo '<script language="javascript">';
            echo 'alert("cambios exitosos")';
            echo '</script>';
        } else{
            // echo "SHAME ON YOU AND YOUR COW.";
            echo '<script language="javascript">';
            echo 'alert("No se pudo editar el perfil, intente mas tarde o contacte a soporte")';
            echo '</script>';
           }
      }else{
        echo '<script language="javascript">';
        echo 'alert("las contraseñas no son iguales")';
        echo '</script>';
      }
    }else { //si no se cambia las contraseñas
      $sql = "UPDATE Users SET first_name = '$fn', last_name= '$ln', dob='$dob', sex='$sex', foto='$pfp' WHERE id = $_SESSION[S_id]";

      if(mysqli_query($conexion, $sql)){
          // Redirect to home to the logged in page
          echo '<script language="javascript">';
          echo 'alert("cambios exitosos")';
          echo '</script>';
      } else{
          // echo "SHAME ON YOU AND YOUR COW.";
          echo '<script language="javascript">';
          echo 'alert("No se pudo editar el perfil, intente mas tarde o contacte a soporte")';
          echo '</script>';
         }
    }

  }

  require 'kiosco_desconectar_bdd.php';
}


//Open login page
?>





<html>
    <meta charset="UTF-8">
    <head>
      <?php
        // Show menu
        require 'kiosco_menu.php';
      ?>
<style media="screen">
  .modal { width: 80% !important ; }
</style>

    </head>
    <body>
      <div class = "row">
        <div class = "col l3 hide-on-med-and-down">
          menu-space
        </div>
        <div class = "col l9 s12">
          <br>

          <br>

          <div class = "row">

            <?php
            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            // Create QUERY para sacar info del usuario
            $query = "SELECT * FROM Users WHERE id = $_SESSION[S_id]";
            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
            $row = mysqli_fetch_row($result);
            // Set timezone
            date_default_timezone_set('America/New_York');
            $date = date_create($row[4]);

            ?>
            <div class = "row profile-data">

              <div class = "col s6 align center">
                  <?php echo "<img src = 'img/".$row[7].".png'>"; ?>
                  <br>

                  <!-- boton del modal de editar perfil -->
                  <a class="waves-effect waves-light red btn modal-trigger" href="#modal-edit"><i class="material-icons left">edit</i>editar perfil</a>
                  <!-- Modal Structure -->
                  <div id="modal-edit" class="modal modal-fixed-footer">
                    <div class="modal-content">

                      <form id="edit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <br>
                        <div class = "row center">

                          <div class="col s6">
                            <div class="row">

                              <div class="input-field col s6">
                                <i class="material-icons prefix">face</i>
                                <input required id="perfil_nombre" value="<?php echo $row[2]; ?>"; placeholder="Nombre" name="perfil_nombre" type="text">
                              </div>

                              <div class="input-field col s6">
                                <input required id="perfil_apellido" value="<?php echo $row[3]; ?>"; placeholder="Apellido" name="perfil_apellido" type="text">
                              </div>
                            </div>


                            <div class="input-field">
                              <i class="material-icons prefix">date_range</i>
                              <input required id="perfil_fecha" value='<?php $db = $row[4]; $timestamp = strtotime($db); echo date('Y-m-d', $timestamp); ?>' placeholder="Fecha nacimiento" name="perfil_fecha" type="date">
                            </div>

                            <div class="row">
                              <div class="col s2">
                                <i class="material-icons prefix">supervised_user_circle</i>
                                <p>Sexo</p>
                              </div>
                              <div class="input-field col s5">

                                  <label for="male">
                                  <input id="male" class="with-gap" name="sex" type="radio" value='m' <?php if($row[5]=='m'){echo "checked";} ?> />
                                  <span>Hombre</span>
                                  </label>

                              </div>
                              <div class="input-field col s5">

                                  <label for="female">
                                  <input id="female" class="with-gap" name="sex" type="radio" value='f' <?php if($row[5]=='f'){echo "checked";} ?>  />
                                  <span>Mujer</span>
                                  </label>

                              </div>
                            </div>

                            <div class="input-field col s6">
                  						<input name="newpassword" id="newpassword" type="password" class="validate">
                  						<label for="newpassword">Nueva Contraseña</label>
                  					</div>
                  					<div class="input-field col s6">
                  						<input name="confirm_password" id="confirm_password" type="password" class="validate">
                  						<label for="confirm_password">Confirme Constraseña</label>
                  					</div>


                          </div>



                          <div class="input-field col s6">
                            <select name="icons" id='icons' class="icons">
                              <option value="" disabled selected>Seleccionar imagen de perfil</option>
                              <option value="profile1" data-icon="img/profile1.png" class="left">Perfil 1</option>
                              <option value="profile2" data-icon="img/profile2.png" class="left">Perfil 2</option>
                              <option value="profile3" data-icon="img/profile3.png" class="left">Perfil 3</option>
                              <option value="profile4" data-icon="img/profile4.png" class="left">Perfil 4</option>
                              <option value="profile5" data-icon="img/profile5.png" class="left">Perfil 5</option>
                              <option value="profile6" data-icon="img/profile6.png" class="left">Perfil 6</option>
                              <option value="profile7" data-icon="img/profile7.png" class="left">Perfil 7</option>
                              <option value="profile8" data-icon="img/profile8.png" class="left">Perfil 8</option>
                              <option value="profile9" data-icon="img/profile9.png" class="left">Perfil 9</option>
                            </select>
                            <label>Imagenes de perfil</label>

                          <div class = "left-align">

                            <blockquote>
                              Su usuario es: <?php echo $row[1]; ?>
                            </blockquote>

                          </div>

                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="center">
                          <button name='edit' type="submit" class="modal-close waves-effect waves-green btn green">✓</button>
                        </div>
                      </div>
                      </form>

                  </div>
              </div>


              <div class = "col s6">

                <div class = "row flow-text"> <b> Nombre: </b> <?php echo $row[2]." ".$row[3];?> </div>
                <div class = "row flow-text"> <b> Fecha de Nacimiento: </b> <?php echo date_format($date,"d/M/Y"); ?> </div>
                <div class = "row flow-text"> <b> Género: </b> <?php echo ($row[5] == "m" ? "Masculino" : "Femenino"); ?> </div>
              </div>

            </div>

            <?php
              // Close database
             require 'kiosco_desconectar_bdd.php';

            ?>

            <div class = "row profile-sections">


              <div class = "col s4">
                <button data-target="modal-favores" class ="modal-trigger col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="img/boton_favores.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Descubra los voluntarios a los favores que ha pedido</a>

                </button>
              </div>

              <?php
              //require 'kiosco_desconectar_bdd';
              ?>


              <!-- modal de favores -->
              <div id="modal-favores" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php require 'kiosco_favores_personales.php'; ?>

                  </div>
                  <div class="modal-footer">
                    <div class="center">
                      <a class="modal-close btn waves-effect waves-light red"><i class="material-icons">close</i></a>
                    </div>
                  </div>
                </div>



              <div class = "col s4">
                <button data-target="modal-planes" class ="modal-trigger col s10 offset-s1 align center waves-effect waves-light z-depth-2 btn-profile amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="img/boton_planes.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Recuerde los próximos eventos y observe resultados de sus publicaciones</a>

                </button>
              </div>

              <!-- modal de planes -->
              <div id="modal-planes" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php require 'kiosco_planes_personales.php'; ?>

                </div>
                <div class="modal-footer">
                  <div class="center">
                    <a class="modal-close btn waves-effect waves-light red"><i class="material-icons">close</i></a>
                  </div>
                </div>
              </div>


              <div class = "col s4">
                <button data-target="modal-carrito" class ="modal-trigger col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="img/boton_mercado.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Vuelva a ver los servicios que ha compartido</a>

                </button>
              </div>

              <!-- modal de servicios -->
              <div id="modal-carrito" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php require 'kiosco_mercadito_personal.php'; ?>

                </div>
                <div class="modal-footer">
                  <div class="center">
                    <a class="modal-close btn waves-effect waves-light red"><i class="material-icons">close</i></a>
                  </div>
                </div>
              </div>


            </div>

          </div>

        </div>
      </div>

    </body>

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
      $('.modal').modal();
    });


    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
      $('select').formSelect();
    });

    </script>
</html>
