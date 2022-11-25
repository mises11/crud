<!DOCTYPE html>
<html>
  <head>
    <title>Modificación de Aprendices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="divconsulta" class="container">
       <br>
       <div id="div2">
          <div id="div4">
               <form name="formulario" role="form" method="post">
                 <div class="col-md-12">
                    <strong class="lgris">Ingrese criterio de busqueda</strong>
                    <br><br>
                    <div class="form-row">
                     <div class="form-group col-md-5">
                     <input class="form-control" type="number" name="numid" min="9999" max="9999999999" autofocus value="" placeholder="IDENTIFICACIÓN" />
                     </div>
                       <div class="form-group cold-md-3">
                       <input class="btn btn-primary" type="submit" value="consultar" >
                       <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
                       </div>
                    </div>
                    <br>
                 </div>
               </form>
               <br>
          </div>

          <div id="divconsulta2">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones1.php');
              session_start();
              $vnumid=$_POST['numid'];
              $miconexion=conectar_bd('', 'sena_bd');
              $resultado=consulta($miconexion,"select * from aprendices where Apre_Numid='{$vnumid}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['ide1']=$fila->Apre_id;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_aprendiz.php">
                    <div class="col-md-12">
                       <strong class="lgris">Datos del aprendiz</strong><br>

                       <label class="lgris">Nombres:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="Apre_nombres" required value="<?php echo $fila->Apre_nombres ?>"/>

                       <label class="lgris">Apellidos:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="Apre_apellidos" value="<?php echo $fila->Apre_apellidos ?>" required/>

                       <label class="lgris">Dirección:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="Apre_direccion" value="<?php echo $fila->Apre_direccion ?>" required/>

                       <label class="lgris">Teléfono:</label>
                       <input class="form-control" type="number" name="Apre_telefono" min="9999" max="9999999999" value="<?php echo $fila->Apre_telefono ?>" required/>
                       <br>
                       <input class="btn btn-primary" type="submit" value="Actualizar">
                       <br>
                    </div>
                </form>
                <?php
              }
            else{
                echo "No existen registros";
                }
            $miconexion->close();
          }?>
          </div>
       </div>
    </div>
  </body>
</html>