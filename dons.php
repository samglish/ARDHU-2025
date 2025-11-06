<?php
session_start();
include 'db.php';
include 'header.php';

if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "Connectez-vous pour effectuer un don.";
    header('Location: login.php');
    exit();
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $montant = floatval($_POST['montant'] ?? 0);
    $message = mysqli_real_escape_string($conn, $_POST['message'] ?? '');
    $id_user = intval($_SESSION['id']);
    $date = date('Y-m-d H:i:s');

    if ($montant > 0) {
        $sql = "INSERT INTO dons (id_utilisateur, montant, message, date_don) VALUES ($id_user, $montant, '$message', '$date')";
        if (mysqli_query($conn, $sql)) {
            $success = "Merci pour votre don de $montant !";
        } else {
            $error = "Erreur lors de l'enregistrement du don : " . mysqli_error($conn);
        }
    } else {
        $error = "Veuillez entrer un montant valide.";
    }
}
?>

<style>
.container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
}

.form-don {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.form-don h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #010302ff;
}

.form-don label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-don input[type="number"],
.form-don textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.form-don textarea {
    resize: vertical;
}

.form-don button {
    background-color: #218838;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 12px 20px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s;
}

.form-don button:hover {
    background-color: #bd4107ff;
}

.message-success {
    color: green;
    margin-bottom: 15px;
}

.message-error {
    color: red;
    margin-bottom: 15px;
}
</style>

<div class="container">
    <div class="form-don">
        <h2>Faire un don</h2>

        <?php if ($success): ?>
            <p class="message-success"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p class="message-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Montant (en FCFA)</label>
            <input type="number" name="montant" min="100" step="50" placeholder="Entrez le montant" required>

            <label>Message (optionnel)</label>
            <textarea name="message" rows="4" placeholder="Message ou commentaire"></textarea>

            <button type="submit">Faire un don</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
