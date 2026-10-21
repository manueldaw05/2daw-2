import { Fragment } from "react";

const builds = [
    {
        id: 'b1', title: 'Setup Streamer Pro', parts: ['RTX 4090', 'i9-14900K', '64GB RAM']
    },
    {
        id: 'b2', title: 'Setup Budget Gamer', parts: ['RX 6600', 'Ryzen 5 5600', '16GB RAM']
    }
];

export default function BuildList() {
    return(
        <Fragment>
            <h1>Setups recomendados</h1>
        </Fragment>
    );
}