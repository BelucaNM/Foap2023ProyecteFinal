<?php
$_tablaNav =  array (
        "bienvenida" => array 
        (
            'a_tiendas'=>true, 
            'a_productos'=>true, // lanza todos los productos
            'a_pedidos'=>true, // si SI session
            'a_carrito'=>true, // si SI session
            'a_login'=>true,   // si SI !session
            'a_logout'=>true, // si SI session
            'comprobarSession'=> true,
            
        ),
        "tiendas" => array 
        (
            'a_tiendas'=>false,
            'a_productos'=>true,// lanza todos los productos
            'a_pedidos'=>true, // si SI session
            'a_carrito'=>true, // si SI session
            'a_login'=>true,   // si SI !session
            'a_logout'=>true,// si SI session
            'comprobarSession'=> true,
        ),
        "productos" => array
        (
            'a_tiendas'=>true,
            'a_productos'=>false,
            'a_pedidos'=>true, // si SI session
            'a_carrito'=>true, // si SI session
            'a_login'=>true,   // si SI !session
            'a_logout'=>true,// si SI session
            'comprobarSession'=> true,
        ),
        "producto" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>true, // si SI session
            'a_carrito'=>true, // si SI session
            'a_login'=>true,   // si SI !session
            'a_logout'=>true,// si SI session
            'comprobarSession'=> true,
        ),
        "micarrito"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>true, // 
            'a_carrito'=>false, // 
            'a_login'=>false,   //
            'a_logout'=>true,//
            'comprobarSession'=> false, // no hace falta
        ),
        "mispedidos" => array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>true, // 
            'a_login'=>false,   //
            'a_logout'=>true,//
            'comprobarSession'=> false, // no hace falta
        ),
      "login" => array (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>false,   //
            'a_logout'=>false,//
            'comprobarSession'=> false, // no hace falta
        ),
        "registro"=> array 
        (
            'a_tiendas'=>true,
            'a_productos'=>true,
            'a_pedidos'=>false, // 
            'a_carrito'=>false, // 
            'a_login'=>true,   //
            'a_logout'=>false,//
            'comprobarSession'=> false, // no hace falta
        ),
);

?>