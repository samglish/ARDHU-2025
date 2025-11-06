<?php
session_start();
require_once 'db.php';
require_once 'header.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$profile_id = $_GET['id'] ?? $_SESSION['id'];

// Récupérer les infos du profil demandé
$stmt = $conn->prepare("SELECT id, nom, prenom, matricule, photo_profil FROM etudiants WHERE id = ?");
$stmt->bind_param("i", $profile_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    echo "<div class='alert alert-danger'>Profil introuvable.</div>";
    exit();
}
?>

<div class='profile-card'>
    <img src='uploads/<?= !empty($user['photo_profil']) ? $user['photo_profil'] : "default.jpg" ?>' 
         alt='Photo de profil' class='profile-photo'>
    <h3><?= htmlspecialchars($user['prenom'] . " " . $user['nom']) ?></h3>
    <p><strong>Matricule:</strong> <?= htmlspecialchars($user['matricule']) ?></p>
</div>

<?php
// Si c'est SON profil, montrer bouton édition
if ($profile_id == $_SESSION['id']) {
    echo "<a href='edit_profile.php' class='btn btn-primary'>Modifier mon profil</a>";
}
?>

<hr>
<h4 class="text-center">Publications de <?= htmlspecialchars($user['prenom']) ?></h4>

<?php
// Récupérer les posts de l’utilisateur
$post_stmt = $conn->prepare("
    SELECT p.id, p.contenu, p.created_at, e.nom, e.prenom, e.photo_profil 
    FROM posts p 
    JOIN etudiants e ON p.user_id = e.id 
    WHERE p.user_id = ? 
    ORDER BY p.created_at DESC
");
$post_stmt->bind_param("i", $profile_id);
$post_stmt->execute();
$posts = $post_stmt->get_result();

if ($posts->num_rows > 0) {
    while ($row = $posts->fetch_assoc()) {
        $photo = !empty($row['photo_profil']) ? $row['photo_profil'] : "default.jpg";
        echo "
        <div class='post-card'>
            <div class='post-header'>
                <img src='uploads/{$photo}' alt='Photo profil' class='post-photo'>
                <div>
                    <strong>{$row['prenom']} {$row['nom']}</strong><br>
                    <small class='text-muted'>Publié le " . date("d/m/Y H:i", strtotime($row['created_at'])) . "</small>
                </div>
            </div>
            <div class='post-body'>
                <p>" . nl2br(htmlspecialchars($row['contenu'])) . "</p>
            </div>
        </div>
        ";
    }
} else {
    echo "<p class='text-center text-muted'>Aucune publication pour l’instant.</p>";
}
?>

<style>
.profile-card {
    max-width: 500px;
    margin: 30px auto;
    padding: 20px;
    text-align: center;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.profile-photo {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 3px solid #eee;
}
.post-card {
    max-width: 500px;
    margin: 20px auto;
    padding: 15px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
}
.post-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.post-photo {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 10px;
    border: 2px solid #ddd;
}
.post-body {
    margin-top: 10px;
}
</style>
