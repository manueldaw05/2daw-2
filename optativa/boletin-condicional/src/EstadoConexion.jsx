export default function EstadoConexion({ status }) {
return (
    <div>
        {status === 'online' ? 'En línea' : status === 'offline' ? 'Desconectado' : status === 'away' ? 'Ausente' : 'Estado inválido'}
    </div>
);
}