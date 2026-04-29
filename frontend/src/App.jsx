import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import Login from './pages/Login';

function App() {
    const token = localStorage.getItem('token');
    const isAuthenticated = token && token !== "undefined";

    return (
        <Router>
            <Routes>
                <Route path="/login" element={<Login />} />
                <Route
                    path="/"
                    element={isAuthenticated ? <Dashboard /> : <Navigate to="/login" />}
                />
            </Routes>
        </Router>
    );
}

const Dashboard = () => {
    const handleLogout = () => {
        // On nettoie le token pour se déconnecter
        localStorage.removeItem('token');
        window.location.href = "/login";
    };

    return (
        <div style={dashStyles.container}>
            <header style={dashStyles.header}>
                <h1 style={dashStyles.logo}>AgriTrack</h1>
                <button onClick={handleLogout} style={dashStyles.logoutBtn}>Déconnexion</button>
            </header>

            <div style={dashStyles.welcome}>
                <h2 style={dashStyles.userName}>Bienvenue sur votre exploitation 👋</h2>
                <p style={dashStyles.userRole}>Session sécurisée par JWT</p>
            </div>

            <div style={dashStyles.grid}>
                <div style={dashStyles.card}>🌾<br/>Parcelles</div>
                <div style={dashStyles.card}>🚜<br/>Campagnes</div>
            </div>

            <div style={dashStyles.adminPanel}>
                <p style={{marginBottom: '15px', fontWeight: '500', color: '#333'}}>Gestion de l'exploitation</p>
                <a
                    href="http://127.0.0.1:8000/admin"
                    style={dashStyles.adminBtn}
                >
                    ⚙️ Panneau Administration
                </a>
            </div>
        </div>
    );
};

const dashStyles = {
    container: { padding: '15px', fontFamily: 'sans-serif', backgroundColor: '#f4f7f6', minHeight: '100vh' },
    header: {
        display: 'flex', justifyContent: 'space-between', alignItems: 'center',
        backgroundColor: '#2e7d32', padding: '15px', borderRadius: '12px', color: 'white'
    },
    logo: { fontSize: '20px', margin: 0 },
    logoutBtn: { backgroundColor: 'rgba(255,255,255,0.2)', color: 'white', border: 'none', padding: '8px 12px', borderRadius: '8px', fontSize: '13px', cursor: 'pointer' },
    welcome: { margin: '25px 5px' },
    userName: { fontSize: '22px', margin: '0 0 5px 0' },
    userRole: { color: '#666', fontSize: '14px', margin: 0 },
    grid: {
        display: 'grid',
        gridTemplateColumns: 'repeat(auto-fit, minmax(140px, 1fr))',
        gap: '15px', marginBottom: '30px'
    },
    card: {
        padding: '25px 10px', background: 'white', borderRadius: '15px',
        boxShadow: '0 2px 10px rgba(0,0,0,0.05)', textAlign: 'center',
        fontSize: '16px', fontWeight: 'bold', color: '#2e7d32'
    },
    adminPanel: {
        padding: '20px', backgroundColor: 'white', borderRadius: '15px',
        textAlign: 'center', border: '2px dashed #2e7d32'
    },
    adminBtn: {
        display: 'block', padding: '15px', backgroundColor: '#2e7d32',
        color: 'white', textDecoration: 'none', borderRadius: '10px', fontWeight: 'bold'
    }
};

export default App;