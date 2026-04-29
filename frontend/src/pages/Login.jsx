import { useState } from 'react';
import axios from 'axios';
import { useNavigate, Link } from 'react-router-dom';

const Login = () => {
    const navigate = useNavigate();
    const [credentials, setCredentials] = useState({
        telUtilisateur: '',
        password: ''
    });

    const handleChange = (e) => {
        setCredentials({ ...credentials, [e.target.name]: e.target.value });
    };

    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            const apiUrl = import.meta.env.VITE_API_URL;

            // On s'assure qu'on utilise bien les credentials pour le cookie
            const res = await axios.post(`${apiUrl}/api/login`, {
                telUtilisateur: credentials.telUtilisateur,
                password: credentials.password
            }, {
                withCredentials: true
            });

            if (res.data.token) {
                localStorage.setItem('token', res.data.token);
                console.log("Connexion réussie ! Vérifie l'onglet Application > Cookies.");
                window.location.href = "/";
            }
        } catch (err) {
            console.error("Erreur détaillée :", err);
            alert("Erreur de connexion : " + (err.response?.data?.message || "Vérifiez l'URL de l'API (HTTP vs HTTPS)"));
        }
    };

    return (
        <div style={styles.container}>
            <div style={styles.card}>
                <h2 style={styles.title}>AgriTrack</h2>
                <p style={styles.subtitle}>Connexion sécurisée</p>
                <form onSubmit={handleLogin} style={styles.form}>
                    <input
                        name="telUtilisateur"
                        type="tel"
                        placeholder="Téléphone"
                        onChange={handleChange}
                        style={styles.input}
                        required
                    />
                    <input
                        name="password"
                        type="password"
                        placeholder="Mot de passe"
                        onChange={handleChange}
                        style={styles.input}
                        required
                    />
                    <button type="submit" style={styles.button}>Se connecter</button>
                </form>
                <div style={styles.footer}>
                    <Link to="/inscription" style={styles.link}>Créer un compte</Link>
                </div>
            </div>
        </div>
    );
};

const styles = {
    container: { display: 'flex', justifyContent: 'center', alignItems: 'center', minHeight: '100vh', backgroundColor: '#f4f7f6', fontFamily: 'sans-serif' },
    card: { backgroundColor: 'white', padding: '40px', borderRadius: '15px', boxShadow: '0 4px 20px rgba(0,0,0,0.08)', width: '100%', maxWidth: '400px' },
    title: { color: '#2e7d32', textAlign: 'center', marginBottom: '10px' },
    subtitle: { textAlign: 'center', color: '#666', marginBottom: '30px' },
    form: { display: 'flex', flexDirection: 'column', gap: '15px' },
    input: { padding: '15px', borderRadius: '10px', border: '1px solid #ddd', fontSize: '16px' },
    button: { backgroundColor: '#2e7d32', color: 'white', border: 'none', padding: '15px', borderRadius: '10px', fontSize: '16px', fontWeight: 'bold', cursor: 'pointer' },
    footer: { marginTop: '20px', textAlign: 'center' },
    link: { color: '#2e7d32', textDecoration: 'none', fontWeight: 'bold' }
};

export default Login;