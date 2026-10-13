import './App.css'

export default function MovieCard ({ title, director, year }) {
    return (
        <>
            <h1>MovieCard</h1>
            <p>Título: {title}</p>
            <p>Director: {director}</p>
            <p>Año: {year}</p>
        </>
    )
}