
<?php
session_start();
require_once 'db.php';
require_once 'header.php';
require_once 'functions.php';
?>
 <center>
    <br>
<h2 >Connexion</h2>
 <div id="formulaire">

    <form action="login_trait.php" method="post">
       
         <input type="email" name="email" placeholder="Adresse email" required><br>
         <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
        <input type="submit" value="Se connecter" class="btn btn-primary">

        <p class="mt-3">
  Vous n’avez pas encore de compte ? 
  <a href="register.php" style="color: green; font-weight: 600; text-decoration: none;">
    Cliquez ici
  </a> pour en créer un.
</p>

      
</center>
</div>
    </form>
<?php require_once 'footer.php'; ?>

