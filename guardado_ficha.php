<?php
include('funciones1.php');   
  $vnombre=$_POST['nombre'];
  $vprograma=$_POST['progra'];
  
  
  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"insert into fichas (ficha_numero,ficha_progra) values ('{$vnombre}','{$vprograma}')");

  if ($resultado)
    {
        echo "Guardado exitoso";
        header('Location: crear_ficha.php');    }
  ?>