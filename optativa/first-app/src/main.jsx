import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import NewComponent from './NewComponent.jsx'
import TodoList from './TodoList.jsx'
import Greeting from './Greeting.jsx'
import UserCard from './UserCard.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <Greeting name="Manuel" />
    <Greeting />
    <UserCard name="Manuel" age="18" city="Sevilla"/>
    <UserCard name="Carlos" age="21" city="Madrid"/>
  </StrictMode>,
)
