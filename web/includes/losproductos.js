
function getProducts() {
    return window.products;
}

function ordenaPerNom() {
    let products = getProducts();

    products.sort( (p1, p2) => {
    p1name = p1.pro_nombre.toUpperCase();
    p2name = p2.pro_nombre.toUpperCase();
    if (p1name < p2name) return -1;
    if (p1name > p2name) return 1;
    return 0;
        });
    escriureTaula(products);
    }

function ordenaPerCategoria() {
    let products = getProducts();
    products.sort( (p1, p2) => {
        if (p1.pro_categoria < p2.pro_) return -1;
        if (p1.pro_categoria > p2.pro_id) return 1;
        return 0;
    });
    escriureTaula(products);
}

function ordenaPerPreu() {
    let products = getProducts();
    products.sort( (p1, p2) => {
        if (p1.pro_precioUnitario < p2.pro_precioUnitario) return -1;
        if (p1.pro_precioUnitario > p2.pro_precioUnitario) return 1;
        return 0;
    });
    escriureTaula(products);
}

function filtraPer(elFiltre) {
// TO-DO
// exemple
// result = words.filter((word) => word.length > 6);

    console.log ("elfiltre es :" + elFiltre)
    let productsPerFiltre = []
    if (elFiltre == '') 
        { productsPerFiltre = getProducts();}
    else {
        let products = getProducts();
        productsPerFiltre = products.filter((product) => product.category == elFiltre);
    }
    escriureTaula(productsPerFiltre);
    }

function escriureTaula(products) {
    console.log(products);
    let theTable = "<tr><th>#Id</th><th>Categoria</th><th>Nombre</th><th>Descripcion</th><th>URLFoto</th><th>ALTFoto</th><th>PrecioUnitario</th><th>Acciones</th></tr>";
    let product = null;

    products.forEach((product) => {
     theTable+= "<tr><td>"+product.pro_id+
                "</td><td>"+product.cat_nombre+ 
                "</td><td>"+product.pro_nombre+ 
                "</td><td>"+product.pro_descripcion+
                "</td><td>"+product.pro_URLFoto+
                "</td><td>"+product.pro_ALTFoto+
                "</td><td>"+product.pro_precioUnitario+
                "</td><td><a href='../view/verProductoExistencias.php?id="+product.pro_id+"'>Ver</a> </td></tr>";
              
        }); 
        

    document.getElementById("tProductos").innerHTML=theTable;
}
