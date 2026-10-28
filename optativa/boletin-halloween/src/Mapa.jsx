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
        <div>
            <h1>
                tenemos {caramelo} caramelos
            </h1>
            <table>
                <thead>
                    <tr>
                        <th>
                            Direccion
                        </th>
                        <th>
                            Caramelos
                        </th>
                        <th>
                            ¿Está abandonada?
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {initialHouses.map(element => {
                        return (
                            <tr>
                                <td>
                                    {element.address}
                                </td>
                                <td>
                                    {element.candies == 0 ? "sin caramelos" : element.candies < 3 ? "¡Se están agotando!" : element.candies}
                                </td>
                                <td>
                                    {element.isAbandoned ? "️Desierta (No tocar el timbre)" : <button onClick={() => { modifyCaramel(element.id) }}>¡Truco o trato!</button>}
                                </td>
                            </tr>
                        )
                    })}
                </tbody>
            </table>
        </div>
    )
}

export default Mapa;