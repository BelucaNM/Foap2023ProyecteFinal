<?php
// sin sesion iniciada
$_tablaNav_sinSession =  array (
        "bienvenida" => array 
        (
            'a_tiendas'=>true, 
            'a_productos'=>true, // lanza todos los productos
            'a_buscar'=>true,
            'a_login'=>true,   // 
       ),
        "tiendas" => array 
        (
            'a_bienvenida'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
            'a_login'=>true,   // 
             
        ),
        "tienda" => array 
        (
            'a_bienvenida'=>true, 
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
            'a_login'=>true,   //

        ),
        "productos" => array
        (
            'a_bienvenida'=>true, 
            'a_buscar'=>true,
            'a_tiendas'=>true,
            'a_login'=>true,  // si SI !session
             
        ),
        "buscar" => array
        (
            'a_bienvenida'=>true, 
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_login'=>true,  // si SI !session
 
        ),
        "producto" => array 
        (
            'a_bienvenida'=>true,
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
            'a_login'=>true,   // si SI !session
             
        ),
        
        "login" => array (
            'a_bienvenida'=>true,
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
        ),
        "registro"=> array 
        (
            'a_bienvenida'=>true, 
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
            'a_login'=>true,   //
        ),
        "forPassword"=> array 
        (
            'a_bienvenida'=>true, 
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
            'a_login'=>true,   //
           
        ),
        "newPassword"=> array 
        (
            'a_bienvenida'=>true,
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_buscar'=>true,
            'a_login'=>true,   //
            
        ),
       
);
$_tablaNav_conSession =  array (
    "bienvenida" => array 
    (
        'a_tiendas'=>true, 
        'a_productos'=>true, // lanza todos los productos
        'a_buscar'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_logout'=>true, // si SI session
        'a_datos'=>true, // 

    ),
    "tiendas" => array 
    (
        'a_bienvenida'=>true, 
        'a_productos'=>true,// lanza todos los productos
        'a_buscar'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        
    ),
    "tienda" => array 
    (
        'a_bienvenida'=>true, 
        'a_tiendas'=>true,
        'a_productos'=>true,// lanza todos los productos
        'a_buscar'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        
    ),
    "productos" => array
    (
        'a_bienvenida'=>true,
        'a_tiendas'=>true,
        'a_buscar'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        
 
    ),
    "buscar" => array
        (
            'a_bienvenida'=>true, 
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>true, // si SI session
            'a_carrito'=>true, // si SI session
            'a_logout'=>true,// si SI session
            'a_datos'=>true, // 
        ),
    "producto" => array 
    (
        'a_bienvenida'=>true, 
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_buscar'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        
    ),
    "carrito"=> array 
    (
        'a_bienvenida'=>true,
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_buscar'=>true,
        'a_pedidos'=>true, // 
        'a_logout'=>true,//
        'a_datos'=>true, //
     
    ),
    "mispedidos" => array 
    (
        'a_bienvenida'=>true,
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_buscar'=>true,
        'a_carrito'=>true, // 
        'a_logout'=>true,//
        'a_datos'=>true, //
         
    ),
  
    "misDatos"=> array 
    (   'a_bienvenida'=>true,
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_buscar'=>true,
        'a_pedidos'=>true, // 
        'a_carrito'=>true, // 
        'a_logout'=>true,//
         
        ),
);

?>