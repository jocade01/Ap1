<!DOCTYPE html>
<head>

</head>
<body>
<table>
    <tr>
        <?php foreach($Tareas as $Tarea) { ?>
        <td> <?php echo "" . $Tarea['id']; ?> </td>
        <td> <?php echo "" . $Tarea['titulo']; ?> </td>
        <td> <?php echo "" . $Tarea['descripcion']; ?> </td>
        <td> <?php echo "" . $Tarea['fecha_creacion']; ?> </td>
        <td> <?php echo "" . $Tarea['fecha_vencimiento']; ?> </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>


<?php
