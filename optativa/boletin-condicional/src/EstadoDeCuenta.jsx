export default function EstadoDeCuenta({ isPositive }) {
    return (
        <>
            <p>{ isPositive ? 'Saldo positivo' : 'Saldo negativo'}</p>
        </>
    )
}
