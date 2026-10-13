import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import NewComponent from './NewComponent.jsx'
import TodoList from './TodoList.jsx'
import Greeting from './Greeting.jsx'
import UserCard from './UserCard.jsx'
import MovieCard from './MovieCard.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <MovieCard title="Titanic" director="Manuel" year="2000" />
  </StrictMode>,
)
