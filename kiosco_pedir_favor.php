            <!-- Modal Trigger -->
            <div class = " row post nuevo-favor z-depth-2" style="border-radius: 20px; display: flex;">
              <div class = "col s1 amber accent-2" style="border-radius: 20px 0px 0px 20px">
                <i class="medium material-icons">add</i>
              </div>
                <button data-target="modal-favor" class="modal-trigger col s11 amber accent-1  left-align flow-text amber accent-1 waves-effect" style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;"> <div class = "col s12">Nuevo Favor</div></button>

            </div>
            <!-- Modal Structure -->
            <div id="modal-favor" class="modal  modal-fixed-footer">
              <div class="modal-content valign-wrapper">

                <div id = "ventana-favor" class = " row col s12">

                  <?php
                  // Open new favour form
                  require 'kiosco_nuevo_favor.php';
                  ?>

                </div>


              </div>
              <div class="modal-footer">
                <div class="center">
                  <a href="#!" id = "boton-publicar" class="modal-action modal-close waves-effect white-text waves-green btn-flat green" onclick="publicar()"><i class="material-icons">check</i></a>
                  <a href="#!" class="modal-action modal-close waves-effect white-text waves-red btn-flat red"><i class="material-icons">close</i></a>
                </div>
              </div>
            </div>

            <script>
              //ajustes para que el modal funcione con la version jquery-1.9.1.min.js del menu
                document.addEventListener('DOMContentLoaded', function() {
                  var elems = document.querySelectorAll('.modal');
                  var instances = M.Modal.init(elems, options);
                });

                $(document).ready(function(){
                  $('.modal').modal();
                });

            </script>
            <script>


              //alert(<?php echo $_SESSION['S_id']; ?>);

              function publicar(){
                // Check for filled form on post button
                if (document.forms["forma-favor"]["titulo-favor"].value == "" ||
                 document.forms["forma-favor"]["contenido-favor"].value == "" ||
                 document.forms["forma-favor"]["contacto-favor"].value == "" ||
                 document.forms["forma-favor"]["categoria-favor"].value == "" ) {

                    alert("Llene todos los datos pertinentes");
                  }else{
                    // Post an announcement without exiting or reloading page
                      $.ajax({
                          url:'kiosco_publicar_favor.php',
                          type:'post',
                          data:$('#forma-favor').serialize(),
                          success:function(data){
                              alert(data);
                              //alert("¡Su solicitud de favor se ha publicado!");
                          }
                      });
                  }

              }

            </script>
