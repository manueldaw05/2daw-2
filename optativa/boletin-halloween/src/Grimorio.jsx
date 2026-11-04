import { useState } from "react";

export default function Grimorio() {
    const potionsList = [
        { nombre: "hola", mainIngredient: "vara de blaze", dangerLevel: "peligrosa" },
        { nombre: "manzana asd", mainIngredient: "vara de blaze", dangerLevel: "segura" },
        { nombre: "si", mainIngredient: "vara de blaze", dangerLevel: "mortal" },
    ]

    const [formData, setFormData] = useState(
        { nombre: "", mainIngredient: "", dangerLevel: "segura" }
    );

    const [potions, setPotions] = useState(potionsList);
    const [filter, setFilter] = useState("");

    function handleFilterChange(event) {
        setFilter(event.target.value)
    }

    function searchBar(texto) {

        potions.filter(potion => potion.nombre.toLocaleLowerCase().includes(texto));

    }


    function formAdd(event) {
        event.preventDefault();
        setPotions([...potions, formData]);
        setFormData({ nombre: "", mainIngredient: "", dangerLevel: "segura" })
    }

    function handleChange(event) {
        const { name, value } = event.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value
        }));
    }

    return (
        <>
            <input type="text" onChange={(e) => searchBar(e.target.value.toLocaleLowerCase())}></input>
            <select onChange={handleFilterChange}>
                <option value="">Todas</option>
                <option value="segura">Segura</option>
                <option value="peligrosa">Peligrosa</option>
                <option value="mortal">Mortal</option>
            </select>

            {potions.filter(potion => potion.dangerLevel.includes(filter)).map(potion => <ul>
                <li>Poción: {potion.nombre}</li>
                <li>Ingrediente principal: {potion.mainIngredient}</li>
                <li>Nivel de peligro: {potion.dangerLevel}</li>
            </ul>)}

            <form action="" method="get" onSubmit={formAdd} >
                <div>
                    <label htmlFor="">nombre</label>
                    <input type="text" name="nombre" value={formData.nombre} onChange={handleChange} />
                </div>
                <div>
                    <label htmlFor="">ingrediente principal </label>
                    <input type="text" name="mainIngredient" value={formData.mainIngredient} onChange={handleChange} required />
                </div>
                <div>
                    <label htmlFor="">nivel de peligro</label>
                    <select type="checkbox" name="dangerLevel" value={formData.dangerLevel} onChange={handleChange} >
                        <option value="segura">Segura</option>
                        <option value="peligrosa">Peligrosa</option>
                        <option value="mortal">Mortal</option>
                    </select>
                </div>
                <button type="submit">Enviar</button>
            </form>

            {JSON.stringify(formData)}
        </>


    )
}
