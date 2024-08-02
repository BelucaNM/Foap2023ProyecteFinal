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
        ),
        "mispedidos" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>true, // 
            'a_login'=>false,   //
            'a_datos'=>true, // 
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
            'a_login'=>true,   //
            'a_logout'=>false,//
            'a_datos'=>false, // 
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
        ),
);

?>