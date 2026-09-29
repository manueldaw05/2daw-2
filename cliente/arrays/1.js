let listaCompra = ['Peras', 'Manzanas', 'Kiwis', 'Plátanos', 'Mandarinas'];

listaCompra.splice(1, 1);
listaCompra.splice(3, 0, 'Naranjas', 'Sandía');
listaCompra.splice(1, 1, 'Cerezas', 'Nísperos');

console.log(listaCompra);