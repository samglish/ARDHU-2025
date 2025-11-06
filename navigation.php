<!-- NAVIGATION.PHP -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* ===================== */
/* BARRE DE NAVIGATION */
/* ===================== */
.navbar {
   background-color: #800020; /* 🔴 Rouge bordo officiel ARDHU */
    color: #FFFFFF; /* Blanc pur */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 6px 13px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 200;
    box-shadow: 0 2px 5px rgba(0,0,0,0.25);
    flex-wrap: nowrap;
}

/* ===================== */
/* MENU PRINCIPAL */
/* ===================== */
.nav-links {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    flex: 1;
}

.nav-links a {
    color: #FFFFFF; /* Blanc pur */
    text-decoration: none;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: 0.3s;
    font-weight: 500;
}

.nav-links a:hover {
    color: #FFD700; /* 🟨 Jaune d’or ARDHU */
    transform: scale(1.07);
}

.nav-links a i {
    font-size: 20px;
}

/* ===================== */
/* PROFIL UTILISATEUR */
/* ===================== */
.user-section {
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile-pic {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #FFD700; /* contour jaune d’or */
}

.user-name {
    font-size: 14px;
    font-weight: 600;
    color: #FFFFFF;
    white-space: nowrap;
}

.logout-btn {
    background: none;
    border: none;
    color: #FFFFFF;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
}

.logout-btn:hover {
    color: #1C7E31; /* 🟩 Vert gazon - contraste au survol */
}

/* ===================== */
/* RESPONSIVE MOBILE */
/* ===================== */
@media screen and (max-width: 768px) {
    .navbar {
        flex-wrap: nowrap;
        justify-content: space-between;
        padding: 4px 6px;
    }

    .nav-links {
        flex: 1;
        justify-content: space-evenly;
        gap: 2px;
    }

    .nav-links a span {
        display: none;
    }

    .nav-links a i {
        font-size: 21px;
    }

    .user-section {
        gap: 6px;
    }

    .logout-btn {
        font-size: 18px;
    }
    
    .user-name {
        display: none;
    }
}

/* ===================== */
/* ESPACEMENT DU CONTENU */
/* ===================== */
body {
    margin-top: 18px; /* ajusté pour la hauteur de la barre */
}
</style>



<div class="navbar">
    <!-- MENU DU SITE -->
    <nav class="nav-links">
        <a href="index.php" title="Accueil"><i class="fas fa-home"></i><span>Accueil</span></a>
        <a href="news.php" title="Actualités"><i class="fas fa-bullhorn"></i><span>Actualités</span></a>
        <a href="signalement.php" title="Signalements"><i class="fas fa-exclamation-triangle"></i><span>Signalements</span></a>
        <a href="amis.php" title="Membres / Points focaux"><i class="fas fa-users"></i><span>Membres</span></a>
        <a href="messages.php" title="Forum / Discussions"><i class="fas fa-comments"></i><span>Forum</span></a>
    </nav>

    <!-- PROFIL À DROITE -->
    <?php if (isset($_SESSION['id'])): ?>
        <?php
            $username = $_SESSION['prenom'] . ' ' . $_SESSION['nom'];
            $profile_pic = $_SESSION['profile_pic'] ?? 'default.jpg';
        ?> 
        <div class="user-section">
            <img src="uploads/<?= $profile_pic ?>" alt="Profil" class="profile-pic">
            <span class="user-name"><?= htmlspecialchars($username) ?></span>
            <form action="logout.php" method="post" style="margin:0;">
                <button type="submit" class="logout-btn" title="Déconnexion">
                    <i class="fas fa-power-off"></i>
                </button>
            </form>
        </div>
    <?php else: ?>
       
    <?php endif; ?>
</div>

