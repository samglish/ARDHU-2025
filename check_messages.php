<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    echo 0;
    exit;
}

$user_id = $_SESSION['id'];

$sql = "SELECT COUNT(*) AS total FROM messages WHERE destinataire_id = ? AND vu = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

echo $result['total'];
?>

