const ventas = [
{ id: 1, cliente: "Juan", importe: 150, estado: "completado" },
{ id: 2, cliente: "Ana", importe: 80, estado: "pendiente" },
{ id: 3, cliente: "Luis", importe: 20, estado: "completado" },
{ id: 4, cliente: "Marta", importe: 300, estado: "cancelado" }
];

const totalIngresos = ventas
.filter(venta => venta.estado === "completado")
.reduce((total, importe) => total.importe += importe.importe);

console.log(totalIngresos);