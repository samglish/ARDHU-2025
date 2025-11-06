<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
include 'header.php';       // ton header ARDHU CONNECT
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];

// Récupérer tous les autres étudiants sauf soi-même
$stmt = $conn->prepare("SELECT id, nom, prenom, photo_profil FROM etudiants WHERE id != ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$amis = $result->fetch_all(MYSQLI_ASSOC);
?>
<style>
 .friends-list, .pending-requests {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 30px;
    }
    .friend-card, .request-card {
        display: flex;
        align-items: center;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .friend-photo {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid #eee;
    }
    .friend-info { flex: 1; }
    .friend-actions, .request-actions {
        margin-left: auto;
        display: flex;
        gap: 10px;
    }
</style>
</head>
<center>
    <h1>👥 Discussions</h1></center>
    <?php foreach ($amis as $ami): ?>
    <div class='friends-list'>
        <div class="friend-card">
         <img src="uploads/<?= htmlspecialchars($ami['photo_profil']) ?>" alt="Photo profil" class="friend-photo">
            <div class="friend-info">
                <strong><?= htmlspecialchars($ami['prenom'] . " " . $ami['nom']) ?></strong>
            </div>
            
            <div class='friend-actions'>
                  <a href="messages.php?ami=<?= $ami['id'] ?>"  class='btn btn-sm btn-primary'>Discuter</a>
                 </div>
            
           
        </div>
        </div>
    <?php endforeach; ?>
    
    
    



