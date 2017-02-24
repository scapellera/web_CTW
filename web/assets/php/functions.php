<html>
<?php
//PASAR SEDES EN ARRAY JAVASCRIPT
$cliente = select_all_cliente();

if ($cliente->num_rows > 0) {
    // output data of each row
    while ($row = $cliente->fetch_assoc()) {
        ?>
        <script>

            var cliente_<?php echo "" . $row['NIF_EMPRESA'];?> = new Array

        </script>

    <?php
    $sede = select_sede_cliente($row['NIF_EMPRESA']);

    if ($sede->num_rows > 0) {
    // output data of each row
    while ($row2 = $sede->fetch_assoc()) {
    ?>
        <script>

            cliente_<?php echo"".$row['NIF_EMPRESA']; ?>.push(<?php echo "\"" . $row2['nombre'] . "\""; ?>);
        </script>

        <?php

    }
    }
    }
    ?>
    <?php
}
////////////////////
//activar desactivar checkbox buscador
////////////////////

function result($activo, $NIF_EMPRESA)
{
    if ($activo == 0) {//imprime un input activado o desactivado
        echo "<td><label style=\"margin-top: 10px; margin-left:12px;\" class=\"switcha\" ><a class=\"checkbox_activo\">&nbsp;0</a><input  type=\"checkbox\" onchange=\" onchange_cliente('$NIF_EMPRESA', $activo)\"><div  class=\"slider rounda\"></div></label></td>";
    } else {
        echo "<td><label style=\"margin-top: 10px; margin-left:12px;\" class=\"switcha\"><a  class=\"checkbox_activo\">&nbsp;1</a><input  type=\"checkbox\" checked onchange=\" onchange_cliente('$NIF_EMPRESA', $activo)\" ><div  class=\"slider rounda\"></div></label></td>";
    }

}


?>
</html>