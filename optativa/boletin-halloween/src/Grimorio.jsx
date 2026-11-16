
import { useState } from "react";


export default function Grimorio() {
    const potionsList = [
        { nombre: "hola", mainIngredient: "vara de blaze", dangerLevel: "peligrosa" },
        { nombre: "manzana asd", mainIngredient: "vara de blaze", dangerLevel: "segura" },
        { nombre: "si", mainIngredient: "vara de blaze", dangerLevel: "mortal" },
    ];

    const [formData, setFormData] = useState({
        nombre: "",
        mainIngredient: "",
        dangerLevel: "segura"
    });

    const [potions, setPotions] = useState(potionsList);
    const [filter, setFilter] = useState("");
    const [searchFilter, setSearchFilter] = useState("");

    function handleFilterChange(event) {
        setFilter(event.target.value);
    }

    function searchBar(event) {
        setSearchFilter(event.target.value);
    }

    function formAdd(event) {
        event.preventDefault();
        setPotions([...potions, formData]);
        setFormData({
            nombre: "",
            mainIngredient: "",
            dangerLevel: "segura"
        });
    }

    function handleChange(event) {
        const { name, value } = event.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value
        }));
    }

    return (
        <div className="grimoire-app">

            <h1>📖 Grimorio de Pociones</h1>

            <div className="grimoire-controls">
                <input
                    className="spooky-input"
                    type="text"
                    placeholder="Buscar poción..."
                    value={searchFilter}
                    onChange={searchBar}
                />

                <select
                    className="spooky-select"
                    value={filter}
                    onChange={handleFilterChange}
                >
                    <option value="">Todas</option>
                    <option value="segura">Segura</option>
                    <option value="peligrosa">Peligrosa</option>
                    <option value="mortal">Mortal</option>
                </select>
            </div>

            <div>
                {potions
                    .filter(potion =>
                        potion.dangerLevel.includes(filter) &&
                        potion.nombre.toLowerCase().includes(searchFilter.toLowerCase())
                    )
                    .map((potion, index) => (
                        <div
                            className={`potion-card danger-${potion.dangerLevel}`}
                            key={index}
                        >
                            <div>
                                <h3>Poción: {potion.nombre}</h3>
                                <p>Ingrediente principal: {potion.mainIngredient}</p>
                                <p>
                                    Nivel de peligro: {potion.dangerLevel}
                                </p>

                                {potion.dangerLevel === "mortal" && (
                                    <span className="warning-mortal">
                                        ⚠️ ¡PELIGRO MORTAL!
                                    </span>
                                )}
                            </div>
                        </div>
                    ))}
            </div>

            <form className="potion-form" onSubmit={formAdd}>
                <h2>🧪 Crear nueva poción</h2>

                <div>
                    <label>Nombre</label>
                    <input
                        className="spooky-input"
                        type="text"
                        name="nombre"
                        value={formData.nombre}
                        onChange={handleChange}
                        required
                    />
                </div>

                <div>
                    <label>Ingrediente principal</label>
                    <input
                        className="spooky-input"
                        type="text"
                        name="mainIngredient"
                        value={formData.mainIngredient}
                        onChange={handleChange}
                        required
                    />
                </div>

                <div>
                    <label>Nivel de peligro</label>
                    <select
                        className="spooky-select"
                        name="dangerLevel"
                        value={formData.dangerLevel}
                        onChange={handleChange}
                    >
                        <option value="segura">Segura</option>
                        <option value="peligrosa">Peligrosa</option>
                        <option value="mortal">Mortal</option>
                    </select>
                </div>

                <button className="spooky-btn" type="submit">
                    Añadir poción
                </button>
            </form>

        </div>
    );
}
