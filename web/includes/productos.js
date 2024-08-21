
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
    const compareNumbers = (a, b) => a - b;
    products.sort( (p1, p2) => {

        p1preu = +parseInt(p1.pro_precioUnitario);
        p2preu = +parseInt(p2.pro_precioUnitario);
        return compareNumbers(p1preu, p2preu);

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
    let theTable = "<thead><tr><th scope='col'>#Id</th><th scope='col'>Categoria</th><th scope='col'>Nombre</th><th scope='col'>Descripcion</th><th scope='col'>URLFoto</th><th scope='col'>ALTFoto</th><th scope='col' text-align= 'righ'>PrecioUnitario</th><th scope='col'>Acciones</th></tr><thead>";
    let product = null;
    theTable+="<tbody>";
    products.forEach((product) => {
     theTable+= "<tr><td scope= 'row'>"+product.pro_id+
                "</td><td>"+product.cat_nombre+ 
                "</td><td>"+product.pro_nombre+ 
                "</td><td>"+product.pro_descripcion+
                "</td><td>"+product.pro_URLFoto+
                "</td><td>"+product.pro_ALTFoto+
                "</td><td align='right'>"+product.pro_precioUnitario+
                "</td><td><a href='../view/verProductoExistencias.php?id="+product.pro_id+"'>Ver</a> </td></tr>";
              
        });
    theTable+="</tbody>"; 
    document.getElementById("tProductos").innerHTML=theTable;
}
