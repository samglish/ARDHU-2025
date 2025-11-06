<?php
session_start();
ob_start();
require_once 'db.php';
require_once 'header.php';
require_once 'functions.php';

if (!isset($_SESSION['id'])) {
    $_SESSION['error'] = "Connectez-vous pour accéder à cette page.";
    header("Location: login.php");
    exit();
}

// Récupérer les actualités
$news = get_news($conn);
ob_end_flush();
?>

<center>
<div class="sidebar">   
<?php if ($_SESSION['role'] === 'admin'): ?>
   <h4><a href="actu.php" class="btn btn-primary">Nouvelle info</a></h4><br>
<?php endif; ?>

<div id="resultats">
    <h3 class="section-title">Actualités</h3>  
    <?php foreach ($news as $item): ?>
        <div class="news-card" style="border:1px solid #ddd; padding:10px; margin-bottom:15px; border-radius:5px; background-color:#f9f9f9;">
            <div class="news-title" style="font-weight:bold; font-size:18px; margin-bottom:5px;"><?= htmlspecialchars($item['title']) ?></div>
            <div class="news-date" style="font-size:12px; color:#777; margin-bottom:10px;">Publié le <?= date('d/m/Y H:i', strtotime($item['created_at'])) ?></div>
            <div class="news-content" style="margin-bottom:10px;"><?= nl2br(htmlspecialchars($item['content'])) ?></div>

            <?php if (!empty($item['video'])): ?>
                <video width="100%" controls style="border-radius:5px;">
                    <source src="uploads/videos/<?= htmlspecialchars($item['video']) ?>" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de la vidéo.
                </video>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
</div>

<?php require_once 'footer.php'; ?>
