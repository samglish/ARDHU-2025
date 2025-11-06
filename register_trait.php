<?php
// Connexion à la base de données
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "ardhu");
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Forcer l'encodage UTF-8
$conn->set_charset("utf8mb4");

// Récupération et sécurisation des données
$nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
$prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
$numero = htmlspecialchars($_POST['numero'], ENT_QUOTES, 'UTF-8');
$profession = htmlspecialchars($_POST['profession'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
$ville = htmlspecialchars($_POST['ville'], ENT_QUOTES, 'UTF-8');
$quartier = htmlspecialchars($_POST['quartier'], ENT_QUOTES, 'UTF-8');
// Gestion de la photo de profil
$photo_profil = 'default.jpg'; // Par défaut

if (isset($_FILES['photo_profil']) && $_FILES['photo_profil']['error'] === 0) {
    $dossier_upload = 'uploads/';
    $fichier_tmp = $_FILES['photo_profil']['tmp_name'];

    // Nettoyer le nom du fichier
    $nom_fichier_origine = basename($_FILES['photo_profil']['name']);
    $nom_fichier_origine = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $nom_fichier_origine);

    $fichier_nom = time() . '_' . $nom_fichier_origine;
    $chemin_complet = $dossier_upload . $fichier_nom;

    // Vérifier si c'est une image
    $type_mime = mime_content_type($fichier_tmp);
    if (strpos($type_mime, 'image') !== false) {
        if (move_uploaded_file($fichier_tmp, $chemin_complet)) {
            $photo_profil = $fichier_nom;
        } else {
            die("Erreur lors du déplacement du fichier uploadé.");
        }
    } else {
        die("Le fichier uploadé n’est pas une image valide.");
    }
}

// Requête d'insertion avec requête préparée
$sql = "INSERT INTO etudiants (nom, prenom, numero, profession, email, mot_de_passe, photo_profil, ville, quartier)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nom, $prenom, $numero, $profession, $email, $mot_de_passe, $photo_profil, $ville, $quartier);

if ($stmt->execute()) {
    header('Location: login.php');
    exit();
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

