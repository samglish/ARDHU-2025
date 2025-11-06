<?php
session_start();
include 'db.php';
include 'header.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // handle form in separate file
}
?>

<style>
/* Container général */
.container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
}

/* Formulaire */
.formulaire {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* Titres */
.formulaire h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #0c0f11ff;
}

/* Labels et champs */
.formulaire label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.formulaire input[type="text"],
.formulaire textarea,
.formulaire select,
.formulaire input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.formulaire textarea {
    resize: vertical;
}

/* Bouton */
.formulaire button {
    background-color: #800020;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 12px 20px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s;
}

.formulaire button:hover {
    background-color: #dd4408ff;
}

/* Responsive */
@media (max-width: 640px) {
    .container {
        padding: 10px;
    }
}
</style>

<div class="container">
    <div class="formulaire">
        <h2>Faire un signalement</h2>

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div style="background-color:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:10px; border-radius:5px; margin-bottom:15px;">
                Signalement envoyé avec succès !
            </div>
        <?php endif; ?>

        <form action="signalement_submit.php" method="post" enctype="multipart/form-data">
            <label>Type de cas</label>
            <select name="type_cas" required>
                <option value="Violence basée sur le genre">Violence basée sur le genre</option>
                <option value="Enfant abusé">Enfant abusé</option>
                <option value="Déplacé interne">Déplacé interne</option>
                <option value="Atteinte aux droits humains">Atteinte aux droits humains</option>
                <option value="Autre">Autre</option>
            </select>

            <label>Description</label>
            <textarea name="description" rows="5" required></textarea>

            <label>Lieu</label>
            <input type="text" name="lieu" required />

            <label>Confidentialité</label>
            <select name="confidentialite">
                <option value="anonyme">Anonyme</option>
                <option value="privé">Privé</option>
                <option value="public">Public</option>
            </select>

            <label>Preuve (optionnel)</label>
            <input type="file" name="preuve" accept="image/*,application/pdf" />

            <button type="submit">Envoyer le signalement</button>
        </form>
    </div>
<?php if ($_SESSION['role'] === 'admin'): ?>
  <center></br></br>
  <a href="signalements_views.php" class="btn btn-primary">Consultez les signalements existants</a>
<?php endif; ?>
  </div>
</center>
