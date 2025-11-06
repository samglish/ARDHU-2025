<?php
session_start();
ob_start();
require_once 'db.php';
require_once 'header.php';
require_once 'functions.php';

$success = '';
$error = '';

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $video_filename = null;

    // Gestion upload vidéo
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
        $video_tmp = $_FILES['video_file']['tmp_name'];
        $video_name = time() . '_' . basename($_FILES['video_file']['name']);
        $video_dir = 'uploads/videos/';
        if (!is_dir($video_dir)) {
            mkdir($video_dir, 0777, true);
        }

        $video_type = mime_content_type($video_tmp);
        $allowed_ext = ['mp4','webm','ogg'];
        $ext = strtolower(pathinfo($video_name, PATHINFO_EXTENSION));

        if (strpos($video_type, 'video') !== false && in_array($ext, $allowed_ext)) {
            if (move_uploaded_file($video_tmp, $video_dir . $video_name)) {
                $video_filename = $video_name;
            } else {
                $error = "Erreur lors du téléchargement de la vidéo.";
            }
        } else {
            $error = "Le fichier doit être une vidéo valide (mp4, webm, ogg).";
        }
    }

    if (empty($error) && !empty($title) && !empty($content)) {
        $stmt = $conn->prepare("INSERT INTO department_news (title, content, video) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $video_filename);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Annonce publiée avec succès !";
            header("Location: news.php");
            exit();
        } else {
            $error = "Erreur lors de la publication : " . $stmt->error;
        }
        $stmt->close();
    } elseif (empty($error)) {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<style>
.container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}
input[type="text"], textarea, input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
}
button.btn-primary {
    background-color: #188018ff;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
}
button.btn-primary:hover {
    background-color: #2c5d7a;
}
.message-success {
    color: green;
    margin-bottom: 15px;
}
.message-error {
    color: red;
    margin-bottom: 15px;
}
small {
    display: block;
    margin-bottom: 10px;
    color: #555;
}
</style>

<div class="container">
    <h2>Nouvelle Annonce</h2>

    <?php if ($success): ?>
        <p class="message-success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p class="message-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Contenu</label>
        <textarea name="content" id="content" rows="5" required></textarea>

        <label for="video_file">Vidéo (optionnel)</label>
        <input type="file" name="video_file" id="video_file" accept="video/*">
        <small>Formats acceptés : mp4, webm, ogg | Taille max : 50MB</small>

        <button type="submit" class="btn btn-primary">Publier</button>
    </form>
</div>

