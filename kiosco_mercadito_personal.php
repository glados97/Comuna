      <?php
      require 'kiosco_conectar_bdd.php';
      $sql = "SELECT * FROM Mercado JOIN Users WHERE Users.id =Mercado.usuarioID AND Users.id = $_SESSION[S_id]" ;
      $q1 = mysqli_query($conexion, $sql);
      if(mysqli_num_rows($q1)!=0){
      while($d=mysqli_fetch_assoc($q1)){
      ?>

      <div class="col s4">
        <div class="card amber accent-1" style="border-radius: 20px;">
          <div class="card-content black-text">
            <span class="card-title black-text center amber accent-2" style="border-radius: 20px 20px 0px 0px; padding-top:15px; padding-bottom: 10px; margin: -25px -25px 10px -25px; font-weight: bold;"><?php echo $d["nombre"]; ?></span>
            <div class="section">
              <p class = "dueño grey-text text-darken-1">
                <div class="valign-wrapper left" style="width:21px; margin-right: 7px;">
                  <img src="img/<?php echo $d["foto"];?>.png" alt="" class="circle responsive-img">
                </div>
                <?php echo $d["first_name"]." ".$d["last_name"]; ?>
              </p>
              <p><i class="material-icons prefix">phone</i> <span style="position: relative; top: -5px;"><?php echo $d["telefono"]?></span></p>
              <p><i class="material-icons prefix">attach_money</i> <span style="position: relative; top: -5px;"><?php echo $d["precio"]; ?></span></p>
            </div>
            <div class = "center">
              <a href="#modalProduct<?php echo $d['ventaID'];?>" class="white-text modal-trigger btn" style="background-color: #5F77B7">Detalles</a>
            </div>
          </div>

          </div>

          <div id="modalProduct<?php echo $d['ventaID'];?>" class="modal modal-fixed-footer">
              <div class="modal-content">
                <div class="left-align">
                  <h4 class="center"><?php echo $d['nombre'] ?></h4>
                  <div class="divider"></div>
                  <div class="row">
                    <div class="col s6">
                      <div class="section">
                        <i class="material-icons prefix">account_circle</i>
                        <?php echo $d["first_name"]." ".$d["last_name"]; ?>
                      </div>
                      <div class="section">
                        <i class="material-icons prefix">phone</i>
                        <?php echo $d["telefono"]?>
                      </div>
                      <div class="section">
                        <i class="material-icons prefix">attach_money</i>
                        <?php echo $d["precio"]?>
                      </div>
                      <div class="section">
                        <i class="material-icons prefix">date_range</i>
                         del <?php echo date('d/m/Y',strtotime($d["fecha_ini"]));?>
                         <br>
                         hasta <?php echo date('d/m/Y',strtotime($d["fecha_fin"]));?>
                      </div>
                      <div class="section">
                        <i class="material-icons prefix">access_time</i>
                        desde las <?php echo $d["hora"]?>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="section">
                        <i class="material-icons prefix">description</i> Descripcion:
                        <div class="divider"></div>
                        <p><?php echo $d['descripcion'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="modal-footer">
                <div class="center">
                  <a class="modal-close btn waves-effect waves-light red"><i class="material-icons">close</i></a>
                </div>
              </div>
            </form>
            </div>

      </div>



    <?php
  }
}
else {
  echo "No has agregado ningun producto al mercado!";
}
  require 'kiosco_desconectar_bdd.php';

      ?>
