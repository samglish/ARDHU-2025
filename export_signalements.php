<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start();
include 'db.php';
require_once('tcpdf/tcpdf.php');

// Vérifier que l'utilisateur est admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['error'] = "Accès réservé aux administrateurs.";
    header('Location: login.php');
    exit();
    ob_end_flush();
}

// Récupérer tous les signalements
$sql = "SELECT s.*, u.nom AS utilisateur_nom 
        FROM signalements s 
        LEFT JOIN utilisateurs u ON s.id_utilisateur = u.id 
        ORDER BY date_signalement DESC";
$result = mysqli_query($conn, $sql);

// Créer un PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('AHN CONNECT');
$pdf->SetTitle('Signalements');
$pdf->SetHeaderData('', 0, 'Liste des Signalements', '');
$pdf->setHeaderFont(Array('helvetica', '', 12));
$pdf->setFooterFont(Array('helvetica', '', 10));
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 10);

// Table HTML
$html = '<table border="1" cellpadding="4">
    <tr style="background-color:#28a745; color:#fff;">
        <th>ID</th>
        <th>Utilisateur</th>
        <th>Type de cas</th>
        <th>Description</th>
        <th>Lieu</th>
        <th>Confidentialité</th>
        <th>Statut</th>
        <th>Date</th>
    </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
        <td>'.$row['id'].'</td>
        <td>'.htmlspecialchars($row['utilisateur_nom'] ?? $row['id_utilisateur']).'</td>
        <td>'.htmlspecialchars($row['type_cas']).'</td>
        <td>'.nl2br(htmlspecialchars($row['description'])).'</td>
        <td>'.htmlspecialchars($row['lieu']).'</td>
        <td>'.htmlspecialchars($row['confidentialite']).'</td>
        <td>'.htmlspecialchars($row['statut']).'</td>
        <td>'.date('d/m/Y H:i', strtotime($row['date_signalement'])).'</td>
    </tr>';
}
$html .= '</table>';

// Générer le PDF
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('signalements.pdf', 'D'); // Téléchargement direct
exit();
?>

