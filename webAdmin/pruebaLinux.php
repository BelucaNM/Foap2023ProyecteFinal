<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "tienda");

$pro_id = '1';

/* create a prepared statement */
$stmt = mysqli_stmt_init($link);
mysqli_stmt_prepare($stmt, "SELECT pro_descripcion FROM productos WHERE pro_id=?");

/* bind parameters for markers */
mysqli_stmt_bind_param($stmt, "s", $pro_id);

/* execute query */
mysqli_stmt_execute($stmt);

/* bind result variables */
mysqli_stmt_bind_result($stmt, $descripcion);

/* fetch value */
mysqli_stmt_fetch($stmt);

printf("%s descripcion %s\n", $pro_id, $descripcion);
?>