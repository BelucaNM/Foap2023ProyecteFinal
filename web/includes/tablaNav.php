<?php
// sin sesion iniciada
$_tablaNav_sinSession =  array (
        "bienvenida" => array 
        (
            'a_tiendas'=>true, 
            'a_productos'=>true, // lanza todos los productos
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   // 
            'a_logout'=>false,//
            'a_datos'=>false,
            'a_bienvenida'=>false,
 
           
        ),
        "tiendas" => array 
        (
            'a_tiendas'=>false,
            'a_productos'=>true,// lanza todos los productos
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   // 
            'a_logout'=>false,//
            'a_datos'=>false, //
            'a_bienvenida'=>true, 
        ),
        "tienda" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,// lanza todos los productos
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   //
            'a_logout'=>false,// 
            'a_datos'=>false, // 
            'a_bienvenida'=>true, 
        ),
        "productos" => array
        (
            'a_tiendas'=>true,
            'a_productos'=>false,
            'a_pedidos'=>false, // si SI session
            'a_carrito'=>false, // si SI session
            'a_login'=>true,  // si SI !session
            'a_logout'=>false,//
            'a_datos'=>false, //
            'a_bienvenida'=>true,  
        ),
        "producto" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // si SI session
            'a_carrito'=>false, // si SI session
            'a_login'=>true,   // si SI !session
            'a_logout'=>false,//
            'a_datos'=>false, //
            'a_bienvenida'=>true,  
        ),
        "carrito"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>true, // 
            'a_carrito'=>false, // 
            'a_login'=>false,   //
            'a_logout'=>false,//
            'a_datos'=>false, // 
            'a_bienvenida'=>true, 
        ),
        "mispedidos" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>true, // 
            'a_login'=>false,   //
            'a_datos'=>true, // 
            'a_bienvenida'=>true, 
        ),
      "login" => array (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>false,   //
            'a_logout'=>false,//
            'a_datos'=>false, // 
            'a_bienvenida'=>true, 

        ),
        "registro"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   //
            'a_logout'=>false,//
            'a_datos'=>false, //
            'a_bienvenida'=>true,  
        ),
        "forPassword"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   //
            'a_logout'=>false,//
            'a_datos'=>false, //
            'a_bienvenida'=>true,  
        ),
        "newPassword"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   //
            'a_logout'=>false,//
            'a_datos'=>false, //
            'a_bienvenida'=>true,  
        ),
       
);
$_tablaNav_conSession =  array (
    "bienvenida" => array 
    (
        'a_tiendas'=>true, 
        'a_productos'=>true, // lanza todos los productos
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true, // si SI session
        'a_datos'=>true, // 
        'a_bienvenida'=>false, 
    ),
    "tiendas" => array 
    (
        'a_tiendas'=>false,
        'a_productos'=>true,// lanza todos los productos
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        'a_bienvenida'=>true, 
    ),
    "tienda" => array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,// lanza todos los productos
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        'a_bienvenida'=>true, 
    ),
    "productos" => array
    (
        'a_tiendas'=>true,
        'a_productos'=>false,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        'a_bienvenida'=>true, 
    ),
    "producto" => array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
        'a_datos'=>true, //
        'a_bienvenida'=>true, 
    ),
    "carrito"=> array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>true, // 
        'a_carrito'=>false, // 
        'a_login'=>false,   //
        'a_logout'=>true,//
        'a_datos'=>true, //
        'a_bienvenida'=>true, 
    ),
    "mispedidos" => array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>false, // 
        'a_carrito'=>true, // 
        'a_login'=>false,   //
        'a_logout'=>true,//
        'a_datos'=>true, //
        'a_bienvenida'=>true, 
    ),
  "login" => array (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>false, // 
        'a_carrito'=>false, // 
        'a_login'=>false,   //
        'a_logout'=>false,//
        'a_datos'=>false, //
    ),
    "registro"=> array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>false, // 
        'a_carrito'=>false, // 
        'a_login'=>false,   //
        'a_logout'=>false,//
        'a_datos'=>false, //
        'a_bienvenida'=>true, 
        ),
    "misDatos"=> array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>true, // 
        'a_carrito'=>true, // 
        'a_login'=>false,   //
        'a_logout'=>true,//
        'a_datos'=>false, //
        'a_bienvenida'=>true, 
        ),
);

?>