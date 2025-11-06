<?php
session_start();
require_once "db.php"; // ta connexion existante

// Vérification : seulement un admin peut changer les rôles
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}


// Traitement du changement de rôle
if (isset($_POST['update_role'])) {
    $user_id = intval($_POST['user_id']);
    $nouveau_role = $_POST['role'];

    $update = $conn->prepare("UPDATE etudiants SET role = ? WHERE id = ?");
    $update->bind_param("si", $nouveau_role, $user_id);

    if ($update->execute()) {
        $message = "✅ Rôle mis à jour avec succès.";
    } else {
        $message = "❌ Erreur lors de la mise à jour du rôle.";
    }
}

// Récupération des utilisateurs
$result = $conn->query("SELECT id, nom, prenom, email, photo_profil, role FROM etudiants ORDER BY nom ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des rôles - ARDHU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background:#f8f9fa;">

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4"><i class="fas fa-user-shield"></i> Gestion des rôles des utilisateurs</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm bg-white p-3 rounded">
        <table class="table table-striped align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle actuel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($user = $result->fetch_assoc()): ?>
                <tr>
                    <td class="text-center">
                        <img src="uploads/<?= htmlspecialchars($user['photo_profil']) ?>" alt="photo"
                             width="50" height="50" class="rounded-circle border">
                    </td>
                    <td><?= htmlspecialchars($user['nom']) ?></td>
                    <td><?= htmlspecialchars($user['prenom']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td class="text-center">
                        <span class="badge <?= $user['role'] === 'admin' ? 'bg-success' : 'bg-secondary' ?>">
                            <?= ucfirst($user['role']) ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                            <select name="role" class="form-select d-inline w-auto" required>
                                <option value="visiteur" <?= $user['role'] === 'visiteur' ? 'selected' : '' ?>>Visiteur</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                            <button type="submit" name="update_role" class="btn btn-sm btn-primary ms-2">
                                <i class="fas fa-save"></i> Modifier
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    
</div>

<!-- ======= SECTION : Gestion des Actualités ======= -->
<section class="admin-section container my-5 p-4 shadow-sm bg-white rounded">
    <h2 class="text-center text-danger mb-4">
        <i class="fas fa-newspaper"></i> Gestion des Actualités 
    </h2>

    <?php
 
    require_once "db.php";

    // Vérification de session
    if (!isset($_SESSION['id'])) {
        echo "<div class='alert alert-danger text-center'>Vous devez être connecté pour accéder à cette section.</div>";
        exit();
    }

    // Vérification du rôle admin
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

    // Suppression
    if (isset($_POST['delete']) && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $delete = $conn->prepare("DELETE FROM department_news WHERE id = ?");
        $delete->bind_param("i", $id);
        if ($delete->execute()) {
            echo "<div class='alert alert-success text-center'>✅ Actualité supprimée avec succès.</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>❌ Erreur lors de la suppression.</div>";
        }
    }

    // Récupération des actualités
    $result = $conn->query("SELECT * FROM department_news ORDER BY created_at DESC");
    ?>

    <div class="table-responsive mt-4">
        <table class="table table-striped align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($news = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $news['id'] ?></td>
                            <td><strong><?= htmlspecialchars($news['title']) ?></strong></td>
                            <td><?= substr(strip_tags($news['content']), 0, 80) ?>...</td>
                            <td><?= $news['created_at'] ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette actualité ?');">
                                    <input type="hidden" name="id" value="<?= $news['id'] ?>">
                                    <button type="submit" name="delete" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-muted">Aucune actualité trouvée.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<section id="gestion-posts" class="py-5">
    <div class="container">
        <?php
      
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
            return;
        }

        // Suppression d'un post
        $message = '';
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
</section>

</body>
</html>

