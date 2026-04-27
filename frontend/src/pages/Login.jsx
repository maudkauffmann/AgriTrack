import { useState } from 'react';
import axios from 'axios';
import { useNavigate, Link } from 'react-router-dom';

const Login = () => {
    const navigate = useNavigate();
    const [credentials, setCredentials] = useState({
        tel: '',
        mdp: ''
    });

    const handleChange = (e) => {
        setCredentials({ ...credentials, [e.target.name]: e.target.value });
    };

    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            const res = await axios.post('http://127.0.0.1:8000/api/login', credentials);
            localStorage.setItem('user', JSON.stringify(res.data.user));
            alert("Ravi de vous revoir, " + res.data.user.nom);
            window.location.href = "/";
        } catch (err) {
            alert(err.response?.data?.message || "Erreur de connexion");
        }
    };

    return (
        <div style={styles.container}>
            <div style={styles.card}>
                <h2 style={styles.title}>AgriTrack</h2>
                <p style={styles.subtitle}>Connexion par téléphone</p>

                <form onSubmit={handleLogin} style={styles.form}>
                    <input
                        name="tel"
                        type="tel" // "tel" ouvre le clavier numérique sur mobile
                        placeholder="Numéro de téléphone"
                        onChange={handleChange}
                        style={styles.input}
                        required
                    />
                    <input
                        name="mdp"
                        type="password"
                        placeholder="Mot de passe"
                        onChange={handleChange}
                        style={styles.input}
                        required
                    />

                    <button type="submit" style={styles.button}>Se connecter</button>
                </form>

                <div style={styles.footer}>
                    <p style={{margin: '0 0 10px 0'}}>Nouveau sur AgriTrack ?</p>
                    <Link to="/inscription" style={styles.link}>Créer un compte Admin</Link>
                </div>
            </div>
        </div>
    );
};

const styles = {
    container: {
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        minHeight: '100vh',
        backgroundColor: '#f4f7f6',
        fontFamily: 'sans-serif',
        padding: '20px'
    },
    card: {
        backgroundColor: 'white',
        padding: '40px 25px',
        borderRadius: '15px',
        boxShadow: '0 4px 20px rgba(0,0,0,0.08)',
        width: '100%',
        maxWidth: '400px'
    },
    title: {
        color: '#2e7d32',
        textAlign: 'center',
        marginBottom: '5px',
        fontSize: '28px'
    },
    subtitle: {
        textAlign: 'center',
        color: '#666',
        fontSize: '15px',
        marginBottom: '30px'
    },
    form: {
        display: 'flex',
        flexDirection: 'column',
        gap: '15px'
    },
    input: {
        padding: '16px',
        borderRadius: '10px',
        border: '1px solid #ddd',
        fontSize: '16px',
        backgroundColor: '#fafafa',
        outline: 'none'
    },
    button: {
        backgroundColor: '#2e7d32',
        color: 'white',
        border: 'none',
        padding: '16px',
        borderRadius: '10px',
        fontSize: '16px',
        fontWeight: 'bold',
        cursor: 'pointer',
        marginTop: '10px',
        boxShadow: '0 4px 6px rgba(46, 125, 50, 0.2)'
    },
    footer: {
        marginTop: '30px',
        textAlign: 'center',
        fontSize: '14px',
        color: '#666'
    },
    link: {
        color: '#2e7d32',
        textDecoration: 'none',
        fontWeight: 'bold',
        fontSize: '15px'
    }
};

export default Login;