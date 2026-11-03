import { useState } from "react";

export default function Grimorio() {
    const potionsList = [
        { nombre: "hola", mainIngredient: "vara de blaze", dangerLevel: "peligrosa" },
        { nombre: "manzana asd", mainIngredient: "vara de blaze", dangerLevel: "segura" },
        { nombre: "si", mainIngredient: "vara de blaze", dangerLevel: "mortal" },
    ]

    const [potions, setPotions] = useState(potionsList);
    const [potionsFiltered, setPotionsFiltered] = useState(potions);

    function searchBar(texto) {
        setPotionsFiltered(potions.filter(potion => potion.nombre.toLocaleLowerCase().includes(texto)));
    }

    function filterPotions(texto) {
        setPotionsFiltered()
    }

    return (
        <>
            <input type="text" onChange={(e) => searchBar(e.target.value.toLocaleLowerCase())}></input>
            <select onChange={(e) => filterPotions(e.target.value.toLocaleLowerCase())}>
                <option name="todas">Todas</option>
                <option name="segura">Segura</option>
                <option name="peligrosa">Peligrosa</option>
                <option name="mortal">Mortal</option>
            </select>
            {potionsFiltered.map(potion => <ul>
                <li>Poción: {potion.nombre}</li>
                <li>Ingrediente principal: {potion.mainIngredient}</li>
                <li>Nivel de peligro: {potion.dangerLevel}</li>
            </ul>)}
        </>
    )
}