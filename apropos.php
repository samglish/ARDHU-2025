<?php
session_start();
ob_start();
require_once "db.php";
require_once 'header.php';
require_once 'functions.php';
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
    ob_end_flush();
}

?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

<main>

  <!-- ======= En-tête ONG ======= -->
<!-- ======= Titre de page ARDHU ======= -->
<!-- BANNIÈRE ARDHU -->
<!-- BANNIÈRE ARDHU -->
<div class="banner">
  <div class="overlay">
    <div class="text-center">
      <h2 class="ardhu-title">
        Action pour le Respect des Droits de l’Homme et Dignité Humaine (ARDHU)
      </h2>
      <p class="text-muted small">
        Association camerounaise à but non lucratif – Créée le 11 septembre 2019 à Maroua
      </p>
    </div>
  </div>
</div>

<!-- STYLE CSS -->
<style>
.banner {
  background: url('apropos/logo.jpg') center/cover no-repeat;
  color: white;
  min-height: 140px; /* devient flexible plutôt que fixe */
  border-radius: 10px;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.overlay {
  background: rgba(255, 251, 252, 0.7); /* voile bordeaux semi-transparent */
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 10px 15px;
  box-sizing: border-box;
}

.ardhu-title {
  font-size: 1.3rem;
  font-weight: bold;
  margin-bottom: 5px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
  line-height: 1.3;
}

.text-muted.small {
  font-size: 0.9rem;
  color: #f9f9f9;
  opacity: 0.9;
}

/* 🌐 Responsive Design */
@media (max-width: 768px) { /* Tablette */
  .ardhu-title {
    font-size: 1.1rem;
  }
  .text-muted.small {
    font-size: 0.8rem;
  }
  .banner {
    min-height: 130px;
  }
}

@media (max-width: 480px) { /* Téléphone */
  .ardhu-title {
    font-size: 1rem;
    padding: 0 8px;
  }
  .text-muted.small {
    font-size: 0.75rem;
  }
  .banner {
    min-height: 150px; /* un peu plus haut pour respirer sur mobile */
  }
}
</style>

  <!-- ======= Galerie de présentation ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-8 mx-auto">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <?php
              // Images de la galerie
              $images = glob("apropos/image*.jpg");
              foreach ($images as $img) {
                  echo '<div class="swiper-slide"><img src="'.$img.'" alt=""></div>';
              }
              ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Galerie -->

  <!-- ======= Présentation ONG ======= -->
  <section class="ardhu-section" data-aos="fade-up">
    <div class="container ardhu-container">

      <div class="text-center mb-4">
        <h2 class="ardhu-title">Action pour le Respect des Droits de l’Homme et Dignité Humaine (ARDHU)</h2>
        <p class="text-muted small">Association camerounaise à but non lucratif – Créée le 11 septembre 2019 à Maroua</p>
      </div>

      <div class="ardhu-intro">
        <p><strong>ARDHU</strong> œuvre pour la <strong>promotion, la défense et la protection des droits fondamentaux</strong> 
        des personnes vulnérables, tout en soutenant la résilience communautaire face aux crises et aux inégalités.</p>
      </div>

      <div class="row g-4 ardhu-grid">
        <div class="col-md-6">
          <div class="ardhu-card h-100" data-aos="fade-right">
            <h3>Notre mission</h3>
            <p>Promouvoir, défendre et protéger les droits humains, tout en apportant un soutien psychologique 
            et social aux personnes affectées par les crises, les violences et la pauvreté.</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="ardhu-card h-100" data-aos="fade-left">
            <h3>Notre vision</h3>
            <p>Construire une société juste, équitable et respectueuse de la dignité humaine, 
            où chaque individu peut vivre dans la paix, la sécurité et le respect mutuel.</p>
          </div>
        </div>
      </div>

      <div class="ardhu-domains mt-4" data-aos="zoom-in">
        <h3>Nos domaines d’intervention</h3>
        <ul class="domain-list">
          <li>Droits humains et égalité de genre</li>
          <li>Santé mentale et soutien psychosocial</li>
          <li>Lutte contre les violences basées sur le genre (VBG)</li>
          <li>Protection de l’enfance et éducation</li>
          <li>Cohésion sociale et prévention de l’extrémisme violent</li>
          <li>Développement durable et autonomisation des femmes</li>
        </ul>
      </div>

      <div class="ardhu-values mt-4" data-aos="fade-up">
        <h3>Nos valeurs fondamentales</h3>
        <p>Participation – Transparence – Équité – Inclusion – Justice – Solidarité – Engagement.</p>
      </div>
<!-- ======= ACTIVITÉS & ÉQUIPE ARDHU ======= -->
<section id="activites" class="container my-5" data-aos="fade-up">
  <div class="text-center mb-5">
    <h2 style="color:#800020; font-weight:700;">Nos Activités sur le Terrain</h2>
    <p class="text-muted">Découvrez quelques-unes des actions menées par ARDHU en faveur des droits humains, du développement et de la cohésion sociale.</p>
  </div>

  <!-- Activités -->
  <div class="row g-4">
    <div class="col-md-4" data-aos="zoom-in">
      <div class="card h-100 shadow-sm border-0">
        <div class="activity-photo" style="background:#f2f2f2; height:200px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;"><img src="apropos/image17.jpg" height="200px" width="300px" ></span>
        </div>
        <div class="card-body">
          <h5 class="card-title" style="color:#800020;">Soutien psychosocial aux femmes victimes de violence</h5>
          <p class="card-text">ARDHU accompagne les femmes et jeunes filles affectées par les violences basées sur le genre à travers des séances d’écoute, d’orientation et de formation pour la réinsertion.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4" data-aos="zoom-in">
      <div class="card h-100 shadow-sm border-0">
        <div class="activity-photo" style="background:#f2f2f2; height:200px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;"><img src="apropos/img4.jpg" height="200px" width="300px" ></span>
        </div>
        <div class="card-body">
          <h5 class="card-title" style="color:#800020;">Sensibilisation sur les droits humains et la cohésion sociale</h5>
          <p class="card-text">L’ONG organise régulièrement des campagnes de sensibilisation dans les écoles et communautés pour promouvoir la paix, le respect mutuel et les droits fondamentaux.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4" data-aos="zoom-in">
      <div class="card h-100 shadow-sm border-0">
        <div class="activity-photo" style="background:#f2f2f2; height:200px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;"><img src="apropos/img3.jpg" height="200px" width="300px" ></span>
        </div>
        <div class="card-body">
          <h5 class="card-title" style="color:#800020;">Formation et autonomisation économique</h5>
          <p class="card-text">ARDHU met en œuvre des programmes de formation en artisanat, agriculture durable et entrepreneuriat pour renforcer l’autonomie des femmes et des jeunes.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Hiérarchie de l'ONG -->
  <div class="mt-5 pt-4">
    <div class="text-center mb-4">
      <h2 style="color:#800020; font-weight:700;">Notre Équipe et Hiérarchie</h2>
      <p class="text-muted">L’ARDHU repose sur une équipe dévouée, unie par un engagement commun : la dignité humaine et la justice sociale.</p>
    </div>

    <div class="row justify-content-center mb-5" data-aos="fade-up">
      <div class="col-md-4 text-center">
        <div class="card border-0 shadow-sm p-3">
          <div class="president-photo" style="background:#f2f2f2; height:220px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
            <span style="color:#aaa;"><img src="apropos/presi.jpg" height="200px" width="300px" ></span>
          </div>
          <h5 class="mt-3" style="color:#800020;">Nom du Président</h5>
          <p class="text-muted mb-1">Président de l’ONG ARDHU</p>
          <p class="mt-2">Le président dirige la vision stratégique de l’organisation et veille à la mise en œuvre des projets pour la promotion des droits humains et le bien-être communautaire.</p>
        </div>
      </div>
    </div>

    <div class="row text-center g-4" data-aos="fade-up">
      <div class="col-md-3">
        <div class="team-photo" style="background:#f2f2f2; height:150px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;">Photo</span>
        </div>
        <h6 class="mt-2" style="color:#800020;">Vice-Président(e)</h6>
      </div>
      <div class="col-md-3">
        <div class="team-photo" style="background:#f2f2f2; height:150px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;">Photo</span>
        </div>
        <h6 class="mt-2" style="color:#800020;">Secrétaire Général(e)</h6>
      </div>
      <div class="col-md-3">
        <div class="team-photo" style="background:#f2f2f2; height:150px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;">Photo</span>
        </div>
        <h6 class="mt-2" style="color:#800020;">Trésorier(ère)</h6>
      </div>
      <div class="col-md-3">
        <div class="team-photo" style="background:#f2f2f2; height:150px; border-radius:8px; display:flex; align-items:center; justify-content:center;">
          <span style="color:#aaa;">Photo</span>
        </div>
        <h6 class="mt-2" style="color:#800020;">Responsable Communication</h6>
      </div>
    </div>
  </div>
</section>

<section class="donations-section">
    <h2><i class="fas fa-hand-holding-heart"></i> Soutenir Nos Actions</h2>
    <p>
        La rubrique <strong>Donations</strong> permet à toute personne de contribuer directement aux actions humanitaires, 
        sociales et éducatives menées par notre communauté. Chaque don, quel qu’en soit le montant, 
        aide à financer des activités de <strong>soutien psychosocial</strong>, des programmes de <strong>formation</strong>, 
        ou encore des initiatives de <strong>solidarité étudiante</strong> et communautaire.
    </p>
    <p>
        Votre geste, aussi simple soit-il, participe à créer un impact durable et positif dans la vie de nombreux bénéficiaires. 
        Ensemble, faisons de la solidarité une réalité.
    </p>

    <div class="donation-call">
        <a href="faire_don.php" class="btn-don"><i class="fas fa-donate"></i> Faire un Don Maintenant</a>
    </div>
</section>
<style>
/* SECTION DONATION */
.donations-section {
    max-width: 800px;
    margin: 60px auto;
    padding: 30px;
    background: #f7fafc;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    text-align: center;
    font-family: 'Poppins', sans-serif;
}

.donations-section h2 {
    color: #800020;
    font-size: 26px;
    margin-bottom: 20px;
}

.donations-section p {
    color: #444;
    line-height: 1.8;
    margin-bottom: 15px;
}

.donation-call {
    margin-top: 30px;
}

.btn-don {
    background-color: #800020;
    color: #fff;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-don i {
    margin-right: 8px;
}

.btn-don:hover {
    background-color: #0b5311ff;
    transform: translateY(-3px);
}

/* RESPONSIVE */
@media (max-width: 600px) {
    .donations-section {
        padding: 20px;
        margin: 20px;
    }

    .donations-section h2 {
        font-size: 22px;
    }

    .btn-don {
        display: block;
        width: 100%;
    }
}
</style>

      <div class="ardhu-footer mt-5">
        <div class="row gy-4">
          <div class="col-md-6" data-aos="fade-right">
            <div class="ardhu-zones">
              <h4>Zones d’action principales</h4>
              <p>Diamaré, Mayo-Sava, Mayo-Tsanaga, Mayo-Danay, Logone &amp; Chari.</p>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-left">
            <div class="ardhu-contact">
              <h4>Contacts</h4>
              <p>Maroua, Quartier Baoliwol – BP 280 Maroua</p>

              <div class="contact-item">
                <i class="bi bi-telephone-fill text-primary"></i>
                <span>674 336 080 / 690 302 894</span>
              </div>
              <div class="contact-item">
                <i class="bi bi-envelope-fill text-primary"></i>
                <a href="mailto:ardhucameroun@gmail.com">ardhucameroun@gmail.com</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End Présentation ONG -->

</main><!-- End #main -->

<!-- ======= Back to Top ======= -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/typed.js/typed.umd.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<?php require_once 'footer.php'; ?>

<style>
/* ======= STYLE ARDHU ======= */
.ardhu-section {
  background: linear-gradient(180deg, #ffffff 0%, #f7fbfd 100%);
  border-radius: 16px;
  padding: 2rem 1.5rem;
  box-shadow: 0 4px 25px rgba(59,124,167,0.12);
  color: #0d2b3a;
}

.ardhu-title {
  color: #800020;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 1.6rem;
}

.ardhu-intro {
  text-align: center;
  font-size: 1.05rem;
  line-height: 1.7;
  max-width: 850px;
  margin: 0 auto 2rem auto;
  color: #1a3b52;
}

.ardhu-card {
  background: #fff;
  border: 1px solid rgba(59,124,167,0.1);
  border-left: 5px solid #800020;
  border-radius: 10px;
  padding: 1.2rem;
  transition: all 0.3s ease;
}

.ardhu-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(59,124,167,0.15);
}

.ardhu-card h3 {
  color: #800020;
  font-size: 1.15rem;
  margin-bottom: 0.5rem;
}

.ardhu-card p {
  font-size: 0.96rem;
  line-height: 1.6;
  margin: 0;
}

.ardhu-domains h3,
.ardhu-values h3 {
  color: #800020;
  font-size: 1.2rem;
  margin-bottom: 0.8rem;
  text-align: center;
}

.domain-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  list-style: none;
  gap: 0.7rem;
  padding: 0;
}

.domain-list li {
  background: #eaf4fa;
  color: #123b50;
  border-radius: 50px;
  padding: 0.5rem 1rem;
  font-size: 0.95rem;
  border: 1px solid rgba(59,124,167,0.15);
  transition: 0.3s;
}
.domain-list li:hover {
  background: #800020;
  color: #fff;
}

.ardhu-values p {
  text-align: center;
  font-weight: 600;
  color: #14435a;
}

.ardhu-footer {
  border-top: 1px solid rgba(59,124,167,0.15);
  padding-top: 1.5rem;
}

.ardhu-footer h4 {
  color: #800020;
  font-size: 1.1rem;
  margin-bottom: 0.4rem;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.95rem;
  margin: 0.3rem 0;
}

.contact-item a {
  color: #0d2b3a;
  text-decoration: none;
  border-bottom: 1px dotted rgba(13,43,58,0.1);
}

.contact-item a:hover {
  color: #800020;
  border-color: #800020;
}
</style>
