<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Alabaran</title>
    <style>
    *{
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        }

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }
    #cabecera {
        gap: 20px;
        justify-content: center;
        
    }
    #company {
    /*    background-color: #f5f5f5; */
        padding: 20px;
        text-align :right;
        font-size: 12px;
        line-height:  4px;
        height: 150px;
        width: 400px;
    }
    #FromTo {
        background-color: white;
        padding: 20px;
        text-align :left;
        font-size: 12px;
        line-height:  4px;

    }
    #pedidoLineas {
        background-color: white;
        padding: 20px;
        text-align :right;
        font-size: 10px;
        width: 598px;
    }
    th,.fondoGris {
        background-color: #f2f2f2;
    }
    </style>
</head>
<body>
    <div id = "cabecera">
        <table id="pedidoLineas">
            <tr>
                <td>
                    <div id = "imagen">
                        <img  src='../images/150x150.png' alt='' class=''>
                    </div>
                </td>
                <td>      
                    <div id = "company">
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div id = "FromTo">
        <div>
            <p><strong>From:</strong></p>
            <p>ObJEtivos</p>
        </div>
        <div>
            <p><strong>To:</strong></p>
            <h4><?=$nombre." ".$apellido?></h4>
            <h4>NIF : <?=$dni?></h4>
            <h4>Direccion : <?=$direccion?></h4>
            <h4><?=$muncodpos." ".$munnombre?></h4>
            <h4>Email : <?=$email?></h4>
        </div>
    
    </div>
<div>
<table id="pedidoLineas">
    <thead>
        <tr>
            <th>#IdLinea</th>
            <th>ProId</th>
            <th>ProNombre</th>
            <th>Cantidad</th>
            <th>PrecioUnitario</th>
            <th>Subtotal</th>
            
        </tr>   
    </thead>
    <tbody>
    <?php 
        $preu_subtotal = 0;
        foreach ($lineas as $key => $linea){
            echo "<tr>";
            echo "<td>".$linea['lin_id']."</td>";
            echo "<td>".$linea['productos_pro_id']."</td>";
            echo "<td>".$linea['pro_nombre']."</td>";
            echo "<td>".$linea['lin_cantidad']."</td>";
            echo "<td>".$linea['lin_importe']."</td>";
            echo "<td>".$linea['subtotal']."</td>";
            echo "</tr>";
            $preu_subtotal += strval($linea['subtotal']);
            }
            
            
            
        ?>
    </tbody>
<tfoot>
    <tr class = 'row'>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Importe €</td>
        <td text-align="right"><?=$preu_subtotal;?></td>
    </tr>
    <tr class = 'row'>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Tax-IVA 21%</td>
        <td text-align="right"><?
                                $iva =$preu_subtotal *0.21;
                                echo '$iva';
                                ?></td>
    </tr>
    <tr class = 'row fondoGris'> 
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total €</td>
        <td text-align="right"><?
                                $total =$preu_subtotal *1.21;
                                echo '$total';
                                ?></td>
    </tr>
  </tfoot>
</table>
</div>
  
</body>
</html>