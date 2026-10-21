import { Fragment } from 'react';
import { products } from './data.js';

export default function Catalog() {
    const perifericos = products.filter(p => p.category === 'perifericos');
    const hardware = products.filter(p => p.category !== 'perifericos');
    return (
        <Fragment>
            <h1>Periféricos</h1>
            <ul>
                {perifericos.map(p => <li key={p.id}>{p.name}</li>)}
            </ul>

            <h1>Hardware</h1>
            <ul>
                {hardware.map(p => <li key={p.id}>{p.name}</li>)}
            </ul>
        </Fragment>
    );
}