export default function Notificacion({ isCompleted }) {
    return (
        <>
            <p>{ isCompleted ? '✔️' : '❌' }</p>
        </>
    )
}
