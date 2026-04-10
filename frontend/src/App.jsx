import { useState } from 'react';
import axios from 'axios';

function App() {
    const [formData, setFormData] = useState({
        nom: '',
        tel: '',
        email: '',
        mdp: '',
        role: '1'
    });

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const res = await axios.post('http://127.0.0.1:8000/api/user/add', formData);            alert(res.data.message);
        } catch (err) {
            alert("Erreur lors de l'envoi");
        }
    };

    return (
        <div style={{ padding: '30px', fontFamily: 'sans-serif' }}>
            <h2>AgriTrack - Inscription Utilisateur</h2>
            <form onSubmit={handleSubmit} style={{ display: 'flex', flexDirection: 'column', gap: '10px', width: '300px' }}>
                <input name="nom" placeholder="Nom complet" onChange={handleChange} required />
                <input name="tel" placeholder="Téléphone" onChange={handleChange} required />
                <input name="email" type="email" placeholder="Email" onChange={handleChange} required />
                <input name="mdp" type="password" placeholder="Mot de passe" onChange={handleChange} required />
                <button type="submit" style={{ backgroundColor: '#4CAF50', color: 'white', border: 'none', padding: '10px' }}>
                    Créer l'utilisateur
                </button>
            </form>
        </div>
    );
}

export default App;