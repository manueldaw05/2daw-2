import './App.css'
import { useState } from 'react';

function App() {
  const [contacts, setContacts] = useState([]);

  const addContact = (name, phone) => {
    setContacts(...contacts, {id: Date.now(), name: name, phone: phone})
  }

  const removeContact = (id) => {
    setContacts(contacts.filter(contact => contact.id !== id));
  }

  return (
    <>
      <div className="container">
      <h1>Lista de contactos</h1>
      <ContactForm onAddContact={addContact} />
      <ContactList contacts={contacts} />
      <ContactItem onRemoveContact={removeContact} />
      </div>
    </>
  )
}

export default App
