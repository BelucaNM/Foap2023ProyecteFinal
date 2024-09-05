///

function deleteProduct(nombre) {
    //    let products = getProducts();
    console.log(nombre);
    let encontrado = false;
    let indice = 0;
    for (let i=0; i<= products.length; i++) { 
        if (products[i].name == nombre) {indice = i; encontrado= true; break;}
    }
    if (encontrado) {
    console.log(products[indice]);
    products.splice(indice,1);}
    
    console.log(products);
    escriureTaula(products);
    }
    
    function modificaProduct(nombre) {
    console.log(products);
    const result = products.find(({ name }) => name === nombre);
    // ver como posicionarse en tabla
    // cambiar  precio
    // actualizar la tabla
    }
    var datos = new Array();
    var enEdicion = true;
    var ultimoNodoEditado;
    function editarFila(nodo){
    var nodoTd = nodo.previousSibling;
    if (enEdicion==true){
    cambiarEnEdicion(nodo);
    creaCajasTexto(nodoTd);
    var nodoDiv = document.getElementById('botonesForm');
    nodoDiv.innerHTML = '<span id=\'texto1\'>Pulse Aceptar para guardar los cambios o cancelar para anularlos.</span><br/>' +
    '<input type=\'submit\' value=\'Aceptar\' class=\'botonForm\' onclick=\'javascript:actualizarFila()\'><input type=\'reset\' value=\'Cancelar\' class=\'botonForm\' onclick=\'javascript:reiniciarFila()\'>';
    enEdicion = false;
    }else{
    alert('Solo se puede editar una línea. Recargue la página para poder editar.')
    }
    }
    function creaCajasTexto(nodoTd){
    var nameForm = ['name', 'category', 'price'];
    var instruccion = new Array();
    for(var i=0; i<3; i++){
    datos[i] = nodoTd.textContent;
    instruccion = '<input type=\'text\' style=\'width:70px\' id=\'' + nameForm[i] + '\' value=\'' + nodoTd.textContent + '\'>';
    nodoTd.innerHTML = instruccion;
    if(i<2){nodoTd = nodoTd.previousSibling;}
    }
    ultimoNodoEditado = nodoTd;
    }
    function reiniciarFila(){
    var nodoDiv = document.getElementById('botonesForm');
    for(var i=2; i>-1; i--){
    ultimoNodoEditado.innerHTML = datos[i];
    ultimoNodoEditado = ultimoNodoEditado.nextSibling;
    }
    cambiarEnEdicion(ultimoNodoEditado);
    enEdicion = true;
    nodoDiv.innerHTML = '';
    }
    function actualizarFila(){
    var nodoDiv = document.getElementById('botonesForm');
    datos[0] = document.getElementById('name').value;
    datos[1] = document.getElementById('category').value;
    datos[2] = document.getElementById('price').value;
    // aqui habria que poner los datos en el array
    reiniciarFila();
    }
    function cambiarEnEdicion(nodo){
    if(enEdicion==true){
    nodo.textContent = 'En edición';
    nodo.style.color = 'gray';
    }else{
    nodo.textContent = '[Modifica]';
    nodo.style.color = '#3300FF';
    }
    }
    function obrirNovaFinestra() {
        window.open("https://www.google.com",
                "", "width=300, height=300");
    }
    