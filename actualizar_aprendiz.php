<?php
// actualizar aprendiz
  include('funciones1.php');
  session_start();
  $vide=$_SESSION['ide1'];
  $vnombres=$_POST['Apre_nombres'];
  $vapellidos=$_POST['Apre_apellidos'];
  $vdireccion=$_POST['Apre_direccion'];
  $vtelefono=$_POST['Apre_telefono'];

  $miconexion=conectar_bd('', 'sena_bd');
  $resulado=consulta($miconexion,"update aprendices set  Apre_id='{$vide}',Apre_nombres='{$vnombres}',Apre_apellidos='{$vapellidos}',Apre_direccion='{$vdireccion}',Apre_telefono='{$vtelefono}'	where Apre_id='{$vide}'");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>

<input style="width: 40%;" class="btn btn-info" type="button" onclick="location.href ='menu.php'" value="volver">
