import { useState } from "react"

export const initialBooks = [
{ id: 'b1', title: 'Drácula', genre: 'novela', fee: 2.5, copies: 3, tags:
['Clásico', 'Vampiros'] },
{ id: 'b2', title: 'Cuentos de Poe', genre: 'cuentos', fee: 1.75, copies:
0, tags: ['Misterio'] },
{ id: 'b3', title: 'Frankenstein', genre: 'novela', fee: 2, copies: 7,
tags: [] },
];

export default function GuiaEstudio() {
    const [tickets, setTickets] = useState(0);
    const [textSearch, setTextSearch] = useState('');
    const [total, setTotal] = useState(0);
    //Calcularia el numero de peliculas y la lista de peliculas al filtrar

    return (<>
        <label htmlFor="title">Título <input id="title" class="spooky-input" /></label>
        {/* botón */}
        <button className="btn" disabled>Prestar</button>
    </>)
}

