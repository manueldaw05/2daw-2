export default function AvisoError({ hasError }) {
    return (
        <>
            <p>{ hasError && 'Ha ocurrido un error' }</p>
        </>
    )
}
