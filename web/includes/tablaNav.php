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
            'a_logout'=>false, // 
           
        ),
        "tiendas" => array 
        (
            'a_tiendas'=>false,
            'a_productos'=>true,// lanza todos los productos
            'a_pedidos'=>true, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   // 
            'a_logout'=>false,// si SI session

        ),
        "productos" => array
        (
            'a_tiendas'=>true,
            'a_productos'=>false,
            'a_pedidos'=>false, // si SI session
            'a_carrito'=>false, // si SI session
            'a_login'=>true,  // si SI !session
            'a_logout'=>false,// si SI session

        ),
        "producto" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // si SI session
            'a_carrito'=>false, // si SI session
            'a_login'=>true,   // si SI !session
            'a_logout'=>false,// si SI session

        ),
        "micarrito"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>true, // 
            'a_carrito'=>false, // 
            'a_login'=>false,   //
            'a_logout'=>true,//

        ),
        "mispedidos" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>true, // 
            'a_login'=>false,   //
            'a_logout'=>true,//
        ),
      "login" => array (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>false,   //
            'a_logout'=>false,//

        ),
        "registro"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   //
            'a_logout'=>false,//
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
    ),
    "tiendas" => array 
    (
        'a_tiendas'=>false,
        'a_productos'=>true,// lanza todos los productos
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
    ),
    "productos" => array
    (
        'a_tiendas'=>true,
        'a_productos'=>false,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
    ),
    "producto" => array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>true, // si SI session
        'a_carrito'=>true, // si SI session
        'a_login'=>false,   // si SI !session
        'a_logout'=>true,// si SI session
    ),
    "micarrito"=> array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>true, // 
        'a_carrito'=>false, // 
        'a_login'=>false,   //
        'a_logout'=>true,//
    ),
    "mispedidos" => array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>false, // 
        'a_carrito'=>true, // 
        'a_login'=>false,   //
        'a_logout'=>true,//
    ),
  "login" => array (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>false, // 
        'a_carrito'=>false, // 
        'a_login'=>false,   //
        'a_logout'=>false,//
    ),
    "registro"=> array 
    (
        'a_tiendas'=>true,
        'a_productos'=>true,
        'a_pedidos'=>false, // 
        'a_carrito'=>false, // 
        'a_login'=>true,   //
        'a_logout'=>false,//
        ),
);

?>