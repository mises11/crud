<?php
  include('funciones1.php');
  session_start();
  $vide=$_SESSION['ide1'];
  $vnombre=$_POST['nombre'];
  $vtipo=$_POST['otipo'];


  $miconexion=conectar_bd('', 'sena_bd');
  $resulado=consulta($miconexion,"update programa set Progra_Nombre='{$vnombre}',Progra_tipo='{$vtipo}' where programa_id=$vide");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>

<input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
