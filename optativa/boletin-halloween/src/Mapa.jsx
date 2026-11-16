
import { useState } from "react";

const initialHouses = [
    { id: 'h1', address: 'Calle Elm, 13', candies: 5, isAbandoned: false },
    { id: 'h2', address: 'Avenida del Terror, 666', candies: 2, isAbandoned: false },
    { id: 'h3', address: 'Mansión Bates, 1', candies: 0, isAbandoned: false },
    { id: 'h4', address: 'Cripta Abandonada, 0', candies: 10, isAbandoned: true },
    { id: 'h5', address: 'Pasaje del Espanto, 7', candies: 8, isAbandoned: false },
];

function Mapa() {
    const [caramelo, setCaramelo] = useState(0);

    function modifyCaramel(id) {
        initialHouses.map(house => {
            if (house.id === id) {
                if (house.candies > 0) {
                    house.candies -= 1;
                    setCaramelo(caramelo + 1);
                }
            }
        })
    }

    return (
        <div className="halloween-container">

            <h1 className="treat-counter">
                🎃 Tenemos {caramelo} caramelos 🍬
            </h1>

            <div className="houses-grid">
                {initialHouses.map(element => {
                    return (
                        <div className={`house-card ${element.isAbandoned ? "abandoned" : ""}`}>

                            <h2>🏚️ {element.address}</h2>

                            <p>
                                <strong>Caramelos:</strong>
                                {element.candies == 0
                                    ? <span className="badge badge-empty">Sin caramelos</span>
                                    : element.candies < 3
                                        ? <span className="badge badge-warning">¡Se están agotando!</span>
                                        : element.candies
                                }
                            </p>

                            <p>
                                <strong>¿Está abandonada?</strong>
                                {element.isAbandoned
                                    ? " Desierta (No tocar el timbre)"
                                    : " No, está habitada"}
                            </p>

                            {!element.isAbandoned && (
                                <button
                                    className="spooky-btn"
                                    onClick={() => { modifyCaramel(element.id) }}
                                >
                                    ¡Truco o trato!
                                </button>
                            )}

                        </div>
                    )
                })}
            </div>

        </div>
    )
}

export default Mapa;
