import { useState } from "react";

export default function ContactForm(onAddContact) {
    const [name, setName] = useState("");
    const [phone, setPhone] = useState("");

    const handleSubmit = (e) => {
        e.preventDefault();
        if (!name.trim()) return;
        if (!phone.trim()) return;
        onAddContact(name, phone);
        setName("");
        setPhone("");
    };

    return (
        <form onSubmit={handleSubmit}>
            <input
                type="text"
                placeholder="Nombre..."
                value={name}
                onChange={(e) => setName(e.target.value)}
            />
            <input
                type="number"
                placeholder="Número de teléfono..."
                value={phone}
                onChange={(e) => setPhone(e.target.value)}
            />
            <button>Añadir</button>
        </form>
    );
}
