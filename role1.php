<?php
session_start();
require_once "db.php"; // connexion à ta base

// Vérification admin
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$role_check = $conn->prepare("SELECT role FROM etudiants WHERE id = ?");
$role_check->bind_param("i", $user_id);
$role_check->execute();
$role_result = $role_check->get_result()->fetch_assoc();
$role = $role_result['role'] ?? 'visiteur';

if ($role !== 'admin') {
    echo "<div class='alert alert-warning text-center'>Accès réservé aux administrateurs.</div>";
    exit();
}

// Suppression d'un post
if (isset($_POST['delete_post']) && isset($_POST['post_id'])) {
    $post_id = intval($_POST['post_id']);
    $delete_post = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $delete_post->bind_param("i", $post_id);
    if ($delete_post->execute()) {
        $message = "✅ Post supprimé avec succès.";
    } else {
        $message = "❌ Erreur lors de la suppression.";
    }
}

// Récupération des posts
$result_posts = $conn->query("
    SELECT p.id, p.content, p.file_path, e.nom AS auteur, p.created_at 
    FROM posts p
    JOIN etudiants e ON p.user_id = e.id
    ORDER BY p.created_at DESC
");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Posts - ARDHU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background:#f8f9fa;">

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4"><i class="fas fa-file-alt"></i> Gestion des Posts</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm bg-white p-3 rounded">
        <table class="table table-striped align-middle text-center">
            <thead class="table-info">
                <tr>
                    <th>ID</th>
                    <th>Contenu</th>
                    <th>Fichier</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result_posts->num_rows > 0): ?>
                    <?php while ($post = $result_posts->fetch_assoc()): ?>
                        <tr>
                            <td><?= $post['id'] ?></td>
                            <td><?= substr(strip_tags($post['content']),0,80) ?>...</td>
                            <td>
                                <?php if ($post['file_path']): ?>
                                    <a href="uploads/<?= htmlspecialchars($post['file_path']) ?>" target="_blank">Voir fichier</a>
                                <?php else: ?>
                                    Aucun
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($post['auteur']) ?></td>
                            <td><?= $post['created_at'] ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce post ?');">
                                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                    <button type="submit" name="delete_post" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-muted">Aucun post trouvé.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Retour à l'accueil
        </a>
    </div>
</div>

</body>
</html>

