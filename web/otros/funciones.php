function  busca_mensajes_porTexto($texto){
    if ($texto != "") {
        include 'conn_BD.php'; // conexion a BD
        $sql ="SELECT   mensajes.id, mensajes.fecha, personas.nombre as nombre_user, personas.apellido as apellido_user,mensajes.titulo, 
                    mensajes.contenido,mensajes.imagenURL 
                    FROM mensajes 
                    JOIN
                    personas ON mensajes.idUser = personas.id 
                    WHERE 1 ";
                
        foreach(explode(' ',$texto) as $termino){
            $sql.=" AND mensajes.contenido LIKE '%".$termino."%'";
            };
                
        $sql.= " ORDER BY mensajes.fecha DESC";
        $result = $conn->query($sql);
        include 'connClose_BD.php'; // cierra conexion a BD
            return $result;
        }else{ 
            return null;
        };
};