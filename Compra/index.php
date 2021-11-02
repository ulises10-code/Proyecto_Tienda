<?php include('Conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGTC</title>
    <link rel="stylesheet" href="Bootstrap-5-5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Main.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="background-color: rgb(244, 245, 253)">
            <a class="navbar-brand" href="#">
            <img src="logo2.png" alt="" width="30" height="24">  
            SGTC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link " href="#" style="width: 5rem;  font-size: 130%;">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" style="width: 6rem;  font-size: 130%;">Perfiles</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" style="width: 7.5rem;  font-size: 130%;">Inventario</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#" style="width: 2rem;  font-size: 130%;">Ventas</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
    <div>
        <p>
            Busqueda de producto
        </p>
        <form class="row g-3">
            <div class="col-md-4" style="margin-left: 3rem;">
              <label for="dir" class="form-label" style="margin-top: 1rem;">ID de identificación producto</label>
              <input type="text" class="form-control" id="ID_p">
            </div>
            <div class="col-md-4">
                <label for="input" class="form-label" style="margin-top: 1rem;">nombre de producto</label>
                <input type="int" class="form-control" id="ID_n">
            </div> 
            <div class="col-md-12" style="margin-left: 3rem;">
                <input type="submit" value="Buscar producto" class="btn btn-success" style="margin-top:1px;" name="B_P" >
            </div>
        </form>
        <p>
            Lista de productos
        </p>
    <?php
        if(isset($_POST['B_P']))
        {
            include("Conexión.php");

            $id = $_POST['ID_p'];

            $Resultados = mysqli_query($conexion, "SELECT * FROM lista_c WHERE Id_producto = $id");
            while($consulta = mysqli_fetch_array($Resultados))
            {
                echo 
                "
                <div class=\"conteiner\">
                    <div class=\"row\">
                        <div class=\"col-g-8\">
                            <div class=\"table-responsive\">
                                <table id=\"productos\" class=\"table table-striped table-bordered\" style=\"width:92%\">
                                    <thead>
                                        <tr>
                                            <th>Identificador</th> 
                                            <th>Nombre</th> 
                                            <th>Precio de venta</td> 
                                            <th>cantidad</th> 
                                            <th>Precio total</th> 
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>".$consulta['Id_producto']."</td>
                                        <td>".$consulta['Nombre']."</td>
                                        <td>".$consulta['Precio_V']."</td>
                                        <td>".$consulta['Cantidad']."</td>
                                        <td>".$consulta['Precio_T']."</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>    
                ";
            }
        }
    ?>
    <div class="conteiner">
        <div class="row">
            <div class="col-g-8">
                <div class="table-responsive">
                    <table id="productos" class="table table-striped table-bordered" style="width:92% ">
                        <thead>
                            <tr>
                                <th>Identificador</th> 
                                <th>Nombre</th> 
                                <th>Precio de venta</td> 
                                <th>cantidad</th> 
                                <th>Precio total</th> 
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                        <?=C_tabla($conexion); ?> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        let total =0;

        let celdasPrecio = document.querySelectorAll('td + td + td + td + td');

        for(let i = 0; i < celdasPrecio.length; i++){
            total += parseFloat(celdasPrecio[i].firstChild.data);
        }

        let nuevaFila = document.createElement('tr');

        let celdaTotal = document.createElement('td');
        let textoCeldaTotal = document.createTextNode('Total a pagar');
        celdaTotal.appendChild(textoCeldaTotal);
        nuevaFila.appendChild(celdaTotal);

        let celdaValorTotal = document.createElement('td');
        var textoCeldaValorTotal = document.createTextNode(total);
        celdaValorTotal.appendChild(textoCeldaValorTotal);
        nuevaFila.appendChild(celdaValorTotal);

        document.getElementById('productos').appendChild(nuevaFila);
    </script>
    
    <script type="text/javascript">
        function resta(){

            var Total = parseFloat(textoCeldaValorTotal.data);
            var Pago = Number(document.getElementById('Pago').value);
            var Cambio = Pago - total
            document.getElementById('Cambio').value = Cambio
        }
    </script>
    <p>
        Pago 
    </p>
    <div class="conteiner" > 

        Pago   <input type="text" id="Pago"><br><br>
        Cambio <input type="text" id="Cambio"><br><br>
        <input class="btn btn-success" type="button" value="Realizar compra" onclick="resta() " style="margin-left: 3rem; margin-block-end: 2rem;"> 
    </div>
    
    <div class="col-g-6" style="margin-left: 3rem; margin-block-end: 2rem;">
        <button class="btn btn-success" type="submit" style="margin-top:1px;">finalizar la venta</button>
    </div>
</body>
</html>