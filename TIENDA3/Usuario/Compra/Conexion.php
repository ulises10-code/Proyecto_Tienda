<?php
    $server ="localhost";
    $user = "root";
    $pass = "";
    $db = "venta";

    $conexion = new mysqli($server, $user, $pass, $db);

    if($conexion->connect_errno){
        die("La conexión ha fallado" . $conexion->connect_errno);
    }

    if(isset($_POST['Borrar'])){
        borrar($conexion);
    }

        function borrar($conexion){
            $Id_producto = $_POST['Id_producto'];
    
            $consulta = "DELETE FROM lista_c WHERE Id_producto ='$Id_producto'";
            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
        }

    function C_tabla($conexion){
        $consulta = "SELECT * FROM lista_c";
        $resultado = mysqli_query($conexion, $consulta);

        while($fila = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>".$fila['Id_producto'];
            echo "<td>".$fila['Nombre'];
            echo "<td>".$fila['Precio_V'];
            echo "<td>".$fila['Cantidad'];
            echo "<td>".$fila['Precio_T'];
            echo "<tr>";
        }
        mysqli_close($conexion);
    }
    
    
?>

