import './App.css'
import MensajeBienvenida from './MensajeBienvenida'
import EstadoDeCuenta from './EstadoDeCuenta'
import AvisoError from './AvisoError'
import Notificacion from './Notificacion'
import ListaDeTareas from './ListaDeTareas'
import EstadoConexion from './EstadoConexion'

function App() {

  return (
    <>
      <MensajeBienvenida isLoggedIn={true} />
      <MensajeBienvenida isLoggedIn={false} />
      <EstadoDeCuenta isPositive={true} />
      <EstadoDeCuenta isPositive={false} />
      <AvisoError hasError={true} />
      <AvisoError hasError={false} />
      <Notificacion isCompleted={true} />
      <Notificacion isCompleted={false} />
      <ListaDeTareas />
      <EstadoConexion status="online" />
      <EstadoConexion status="offline" />
      <EstadoConexion status="away" />
    </>
  )
}

export default App
