<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signalement.php');
    exit;
}

$id_user = intval($_SESSION['id']);
$type_cas = mysqli_real_escape_string($conn, $_POST['type_cas'] ?? '');
$description = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
$lieu = mysqli_real_escape_string($conn, $_POST['lieu'] ?? '');
$confidentialite = mysqli_real_escape_string($conn, $_POST['confidentialite'] ?? 'privé');
$date = date('Y-m-d H:i:s');
$preuve_path = NULL;

if (!empty($_FILES['preuve']['name'])) {
    $uploads_dir = __DIR__ . '/uploads/preuves';
    if (!is_dir($uploads_dir)) mkdir($uploads_dir, 0755, true);
    $tmp = $_FILES['preuve']['tmp_name'];
    $name = basename($_FILES['preuve']['name']);
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $newname = 'preuve_' . time() . '_' . rand(1000,9999) . '.' . $ext;
    $dest = $uploads_dir . '/' . $newname;
    if (move_uploaded_file($tmp, $dest)) {
        $preuve_path = 'uploads/preuves/' . $newname;
    }
}

$sql = "INSERT INTO signalements (id_utilisateur, type_cas, description, lieu, date_signalement, statut, id_point_focal, confidentialite, fichier_preuve) VALUES ($id_user, '$type_cas', '$description', '$lieu', '$date', 'en_attente', NULL, '$confidentialite', " . ($preuve_path?"'".$preuve_path."'":'NULL') . ")";
if (mysqli_query($conn, $sql)) {
    header('Location: signalement.php?success=1');
    exit;
} else {
    die('Erreur SQL: ' . mysqli_error($conn));
}
?>
