<?php
session_start();
ob_start();
include 'db.php';
include 'header.php';

// Vérifier que l'utilisateur est admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['error'] = "Accès réservé aux administrateurs.";
    header('Location: login.php');
    exit();
}

// Mise à jour du statut si formulaire envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_signalement'], $_POST['nouveau_statut'])) {
    $id_signalement = intval($_POST['id_signalement']);
    $nouveau_statut = mysqli_real_escape_string($conn, $_POST['nouveau_statut']);
    mysqli_query($conn, "UPDATE signalements SET statut='$nouveau_statut' WHERE id=$id_signalement");
    $_SESSION['success'] = "Statut mis à jour.";
    header('Location: signalements_views.php');
    exit();
}

// Récupérer tous les signalements
$sql = "SELECT s.*, u.nom AS utilisateur_nom FROM signalements s LEFT JOIN utilisateurs u ON s.id_utilisateur = u.id ORDER BY date_signalement DESC";
$result = mysqli_query($conn, $sql);
ob_end_flush();
?>

<style>
.container {
    max-width: 1000px;
    margin: 20px auto;
    padding: 20px;
}

h2 {
    color: #28a745;
    text-align: center;
    margin-bottom: 20px;
}

.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: top;
}

table th {
    background-color: #28a745;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

a.preuve-link {
    color: #3b7ca7;
    text-decoration: none;
}

a.preuve-link:hover {
    text-decoration: underline;
}

button.update-status {
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    cursor: pointer;
    margin-top: 5px;
}

button.update-status:hover {
    background-color: #b84604ff;
}

@media (max-width: 768px) {
    table th, table td {
        font-size: 14px;
        padding: 8px;
    }
    button.update-status {
        padding: 4px 8px;
        font-size: 12px;
    }
}
</style>

<div class="container">
    <h2>Consultation des Signalements</h2>

    <?php if (isset($_SESSION['success'])): ?>
        <div style="background-color:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:10px; border-radius:5px; margin-bottom:15px;">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div class="table-responsive">
        <table>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Type de cas</th>
                <th>Description</th>
                <th>Lieu</th>
                <th>Confidentialité</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Preuve</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['utilisateur_nom'] ?? $row['id_utilisateur']) ?></td>
                    <td><?= htmlspecialchars($row['type_cas']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
                    <td><?= htmlspecialchars($row['lieu']) ?></td>
                    <td><?= htmlspecialchars($row['confidentialite']) ?></td>
                    <td><?= htmlspecialchars($row['statut']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($row['date_signalement'])) ?></td>
                    <td>
                        <?php if (!empty($row['fichier_preuve'])): ?>
                            <a href="<?= htmlspecialchars($row['fichier_preuve']) ?>" target="_blank" class="preuve-link">Voir</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <form method="post" style="display:flex; flex-direction:column;">
                            <select name="nouveau_statut" required>
                                <option value="en_attente" <?= $row['statut']=='en_attente'?'selected':'' ?>>En attente</option>
                                <option value="résolu" <?= $row['statut']=='résolu'?'selected':'' ?>>Résolu</option>
                                <option value="en_cours" <?= $row['statut']=='en_cours'?'selected':'' ?>>En_cours</option>
                            </select>
                            <input type="hidden" name="id_signalement" value="<?= $row['id'] ?>">
                            <button type="submit" class="update-status">Valider</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
       
    </div>
</div>
 <?php if ($_SESSION['role'] === 'admin'): ?>
  <center></br></br>
  <a href="export_signalements.php" class="btn btn-primary">
    <i class="fas fa-user-shield"></i> Télécharger PDF
</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
<a href="role.php" class="btn btn-primary">
    <i class="fas fa-user-shield"></i> Administrateur
</a>
<?php endif; ?>
<?php include 'footer.php'; ?>
