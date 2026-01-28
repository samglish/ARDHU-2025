<?php
session_start();
ob_start();
require_once "db.php";
require_once 'header.php';

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


<!-- ======= Section Connexion Invitation ======= -->
<section class="ardhu-login-invite" data-aos="zoom-in">
  <div class="container text-center">
    <p class="invite-text">
      <strong>Connectez-vous</strong> pour <span>dénoncer des violations des droits humains</span>,
      consulter les <span>actualités</span>, découvrir les <span>offres</span> et participer aux <span>activités</span> de l’ONG ARDHU.
    </p>
    <a href="login.php" class="btn btn-success btn-lg mt-3">
      <i class="bi bi-box-arrow-in-right"></i> Se connecter
    </a>
  </div>
</section>

<style>

.ardhu-login-invite {
  background: linear-gradient(135deg, #e8f8f0 0%, #f8fffb 100%);
  border: 1px solid rgba(0, 128, 0, 0.15);
  border-radius: 12px;
  padding: 2rem 1.5rem;
  margin: 2rem auto;
  max-width: 900px;
  box-shadow: 0 4px 15px rgba(0, 128, 0, 0.08);
  transition: all 0.3s ease;
}

.ardhu-login-invite:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0, 128, 0, 0.12);
}

.invite-text {
  font-size: 1.1rem;
  color: #155724;
  line-height: 1.6;
}

.invite-text span {
  color: #0c7c33;
  font-weight: 600;
}

.btn-success {
  background-color: #28a745;
  border: none;
  font-weight: 600;
  border-radius: 50px;
  padding: 0.6rem 1.5rem;
  transition: all 0.3s ease;
}

.btn-success:hover {
  background-color: #800020;
  transform: scale(1.05);
}

@media screen and (max-width: 768px) {
    .navbar {
        flex-wrap: nowrap;
        justify-content: space-between;
        padding: 4px 6px;
    }

    .nav-links {
        flex: 1;
        justify-content: space-evenly;
        gap: 2px;
    }

    .nav-links a span {
        display: none;
    }

    .nav-links a i {
        font-size: 21px;
    }

    .user-section {
        gap: 6px;
    }

    .logout-btn {
        font-size: 18px;
    }
    
    .user-name {
        display: none;
    }
}

/* ===================== */
/* ESPACEMENT DU CONTENU */
/* ===================== */

</style>
<!-- ======= Galerie de présentation ======= -->
<section id="portfolio-details" class="portfolio-details py-5">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8 mx-auto">

        <div class="portfolio-details-slider swiper shadow-lg rounded-4 overflow-hidden border border-2" style="border-color:#800020;">
          <div class="swiper-wrapper align-items-center">

            <?php
            // Images de la galerie
            $images = glob("apropos/image*.jpg");
            foreach ($images as $img) {
                echo '
                <div class="swiper-slide">
                  <img src="'.$img.'" alt="" class="galerie-img">
                </div>';
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
        <p class="text-muted small">Association camerounaise à but non lucratif –  Créée le 11 septembre 2019 à Maroua sous la loi n°90/053 du 19 décembre 1990 portant sur la liberté d'association</p>
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
           <a href="PG.php"><li>Protection Générale</li></a>
          <a href="DroitHumain.php"><li>AGR et Protection de l'environnement</li></a>
          <a href="SanteMentale.php"><li>Santé mentale et soutien psychosocial</li></a>
          <a href="VBG.php"><li>Lutte contre les violences basées sur le genre (VBG)</li></a>
          <a href="PE.php"><li>Protection de l’enfance et éducation</li></a>
          <a href="CSPE.php"><li>Cohésion sociale et prévention de l’extrémisme violent</li></a>
          <a href="DAF.php"><li>Développement durable et autonomisation des femmes</li></a>
        <a href="LTP.php"><li>Logement, Terre et Propriété (LTP)</li></a>
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
          <span style="color:#aaa;"><img src="apropos/vbg4.jpg" height="200px" width="300px" ></span>
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
          <span style="color:#aaa;"><img src="apropos/img6.jpg" height="200px" width="300px" ></span>
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

  <style>
    .read-more-content {
  display: none;
}
.read-more-btn {
  cursor: pointer;
  color: #800020;
  font-weight: bold;
}

</style>
    <section class="student-achievements my-5">
  <div class="container text-center">
    <h3 style="color:#800020; font-weight:700;">La Journée de l'Enfant Africain</h3>
    <p class="text-muted mb-4">
     ARDHU œuvre pour l'épanouissement et la scolarisation des enfants vulnérables dans les quartiers défavorisés à travers des activités socio-culturelles (danses, jeux) et des dons de fournitures scolaires. 
    </p>

    <div class="videos-row" style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
      
      <!-- Vidéo Hackathon -->
      <div class="video-wrapper fade-in" style="flex:1 1 380px; max-width:480px;">
        <h5 style="color:#800020; font-weight:600; margin-bottom:10px;">La descente à l’école primaire d'application de Mandaka s'inscrit dans un programme de soutien à la scolarisation dans les zones reculées de l'Extrême-Nord.</h5>
        <video 
          controls 
          width="100%" 
          height="270" 
          style="border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.15);">
          <source src="apropos/video1.mp4" type="video/mp4">
          Votre navigateur ne supporte pas la lecture de vidéo.
        </video>
      </div>

      <!-- Vidéo Soutenance -->
      <div class="video-wrapper fade-in" style="flex:1 1 380px; max-width:480px;">
        <h5 style="color:#800020; font-weight:600; margin-bottom:10px;">Jeu de cohésion sociale(Les enfants et les mères se tiennent par la main pour former une grande ronde, symbolisant l'union entre la communauté)</h5>
        <video 
          controls 
          width="100%" 
          height="270" 
          style="border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.15);">
          <source src="apropos/video2.mp4" type="video/mp4">
          Votre navigateur ne supporte pas la lecture de vidéo.
        </video>
      </div>

       <!-- Vidéo Journee -->
      <div class="video-wrapper fade-in" style="flex:1 1 380px; max-width:480px;">
        <h5 style="color:#800020; font-weight:600; margin-bottom:10px;">Les cris de « ARDHU ! ARDHU ! » poussés par les enfants témoignent de la joie et de la reconnaissance ARDHU</h5>
        <video 
          controls 
          width="100%" 
          height="270" 
          style="border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.15);">
          <source src="apropos/video3.mp4" type="video/mp4">
          Votre navigateur ne supporte pas la lecture de vidéo.
        </video>
      </div>

    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.read-more-btn').forEach(button => {
      button.addEventListener('click', function () {
        const content = this.previousElementSibling; // Le texte long juste avant le btn

        if (content.style.display === "none" || content.style.display === "") {
          content.style.display = "block";
          this.innerHTML = "Lire moins ▲";
        } else {
          content.style.display = "none";
          this.innerHTML = "Lire plus ▼";
        }
      });
    });
  });
</script>


<!-- SECTION : Notre Équipe -->
<section class="mt-5 pt-4">
  <div class="text-center mb-5">
    <h2 style="color:#800020; font-weight:700;">Notre Équipe & Hiérarchie</h2>
    <p class="text-muted">L’ARDHU est portée par des femmes et des hommes engagés, unis autour des valeurs de dignité humaine, solidarité et justice sociale.</p>
  </div>

  <!-- Président -->
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-0 shadow-sm p-4 text-center" data-aos="fade-up">
        <div class="rounded mb-3 overflow-hidden" style="height:280px; background:#f2f2f2;">
          <img src="apropos/presi.jpg" class="img-fluid h-100 w-100" style="object-fit:cover;">
        </div>

        <h4 style="color:#800020;">TCHANA Temagné Gildas Delmas</h4>
        <p class="text-muted mb-3">Président – Action pour le Respect des Droits de l’Homme et Dignité Humaine (ARDHU)</p>

        <!-- résumé court -->
        <p class="text-justify">
          Ancien enfant de la rue devenu leader communautaire et pasteur respecté, il incarne une trajectoire exceptionnelle de résilience et d’élévation sociale.
        </p>

        <!-- texte complet masqué -->
        <p class="read-more-content text-justify">
          TCHANA Temagné Gildas Delmas est le Président et fondateur de l’Action pour le Respect des Droits de l’Homme et la Dignité Humaine (ARDHU). Ancien enfant de la rue devenu leader communautaire et pasteur respecté, il incarne l’une des trajectoires les plus puissantes de résilience et d’élévation sociale au Cameroun. Son parcours, marqué par une enfance et une jeunesse extrêmement difficiles, fait de lui un exemple vivant de détermination, d’excellence et d’inspiration pour les jeunes de sa génération.<br><br>

          Guidé par une foi profonde et un sens aigu du devoir moral, Gildas combine leadership spirituel et engagement social. En tant que pasteur, il accompagne de nombreuses personnes dans leur reconstruction personnelle, leur équilibre émotionnel et leur marche vers une vie plus digne. Cette dimension spirituelle renforce son approche humaine du développement communautaire et de la défense des droits fondamentaux.<br><br>

          Visionnaire et stratège, il a fondé ARDHU pour offrir aux enfants, aux jeunes, aux femmes et aux populations vulnérables la dignité, la protection et les opportunités qu’il n’a pas eues dans son enfance. Aujourd’hui, l’organisation est reconnue pour son impact dans l’Extrême-Nord du Cameroun et au-delà, grâce à des programmes innovants en droits humains, cohésion sociale, protection de l’enfance, éducation citoyenne et action humanitaire.<br><br>

          Sous son leadership, ARDHU a consolidé une approche centrée sur l’humain, la sécurité communautaire, la paix et la solidarité. Sa capacité à mobiliser, fédérer et inspirer partenaires, jeunes, leaders locaux et institutions fait de lui une figure incontournable dans le paysage humanitaire et social camerounais.<br><br>

          Pasteur engagé, homme d’excellence et modèle de résilience, TCHANA Temagné Gildas Delmas œuvre chaque jour pour bâtir un avenir où chaque personne, quel que soit son parcours de vie, peut accéder à la dignité, à la sécurité et à la transformation.
        </p>

        <span class="read-more-btn">Lire plus ▼</span>
      </div>
    </div>
  </div>

  <!-- AUTRES MEMBRES -->
  <div class="row text-center g-4 mt-5" data-aos="fade-up">

    <!-- Vice-présidente -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm p-3 h-100">
        <div class="rounded mb-3 overflow-hidden" style="height:200px; background:#f2f2f2;">
          <img src="apropos/vicepresi.jpg" class="img-fluid h-100 w-100" style="object-fit:cover;">
        </div>
        <h5 style="color:#800020;">Wandji Temagné Cléonce Dior</h5>
        <p class="text-muted">Vice-Présidente ARDHU</p>

        <p class="text-justify">
          Éducatrice dynamique, elle œuvre pour l’inclusion, l’éducation et le développement humain au sein des communautés.
        </p>

        <p class="read-more-content text-justify">
          Wandji Temagné Cléonce Dior est une éducatrice dynamique et engagée, actuellement vice-présidente de l'Organisation ARDHU. À l'âge de 35 ans, elle bénéficie d'une solide expérience dans le domaine éducatif, grâce à son diplôme de CAPIEMP obtenu en 2019, où elle s'investit pleinement dans l'épanouissement des communautés.<br><br>

          Son rôle à ARDHU consiste à promouvoir l'éducation et le développement humain, en veillant à ce que chaque projet soit axé sur l'inclusion et la croissance personnelle. Dotée d'un grand dynamisme, Cléonce s'efforce de mettre en place des initiatives qui transforment positivement la communauté.<br><br>

          Passionnée par son métier et par les enjeux sociaux, Cléonce est déterminée à œuvrer pour un avenir meilleur, alliant expertise éducative et engagement communautaire. Son leadership et sa vision éclairée en font une figure inspirante au sein de l'organisation.<br><br>

          Pour Cléonce, chaque action compte et contribue à construire un monde plus juste et équitable.
        </p>

        <span class="read-more-btn">Lire plus ▼</span>
      </div>
    </div>

    <!-- Logisticienne -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm p-3 h-100">
        <div class="rounded mb-3 overflow-hidden" style="height:200px; background:#f2f2f2;">
          <img src="apropos/logisticien.jpg" class="img-fluid h-100 w-100" style="object-fit:cover;">
        </div>
        <h5 style="color:#800020;">Muku Francisca</h5>
        <p class="text-muted">Logisticienne ARDHU</p>

        <p class="text-justify">Jeune professionnelle talentueuse, rigoureuse et passionnée par l’optimisation des processus.</p>

        <p class="read-more-content text-justify">
          Muku Francisca est une jeune professionnelle talentueuse et engagée, titulaire d’une licence en Logistique et Transport Management. À seulement 20 ans, elle occupe avec excellence le rôle de Logisticienne au sein d’ARDHU, où elle met en œuvre son expertise, sa discipline et son sens aigu de l’organisation.<br><br>

          Depuis plus de deux ans, Francisca contribue activement au bon fonctionnement du département logistique. Elle s’est forgé une solide expérience dans la gestion des approvisionnements, la coordination des activités opérationnelles, la gestion des stocks et l’optimisation des ressources nécessaires aux actions humanitaires et sociales d’ARDHU.<br><br>

          Passionnée par l’optimisation des processus et l’analyse des données, Francisca se distingue par sa volonté constante d’améliorer la qualité, la rapidité et la fiabilité des opérations.<br><br>

          Ambitieuse et déterminée, elle travaille activement à renforcer ses compétences pour évoluer vers le poste de Coordinatrice Logistique d’ARDHU.<br><br>

          En dehors de ses responsabilités, elle consacre du temps à la recherche, à l’apprentissage continu et aux initiatives communautaires.
        </p>

        <span class="read-more-btn">Lire plus ▼</span>
      </div>
    </div>

    <!-- Trésorier -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm p-3 h-100">
        <div class="rounded mb-3 d-flex align-items-center justify-content-center" style="height:200px; background:#f2f2f2;">
          <span class="text-muted">Photo</span>
        </div>
        <h5 style="color:#800020;">Trésorier(ère)</h5>
        <p class="text-justify">Responsable de la gestion financière, de la transparence et du suivi des ressources de l’ONG.</p>
      </div>
    </div>

  </div>

  <!-- Responsable Communication -->
  <div class="row text-center g-4 mt-4" data-aos="fade-up">
    <div class="col-md-4 offset-md-4">
      <div class="card border-0 shadow-sm p-3 h-100">
        <div class="rounded mb-3 d-flex align-items-center justify-content:center" style="height:200px; background:#f2f2f2;">
          <span class="text-muted">Photo</span>
        </div>
        <h5 style="color:#800020;">Responsable Communication</h5>
        <p class="text-justify">Chargé(e) de la visibilité, des relations médias et de la diffusion des valeurs de l’ARDHU.</p>
      </div>
    </div>
  </div>

</section>

<section class="donations-section">
 <center>    <h2><i class="fas fa-hand-holding-heart"></i>Soutenir Nos Actions</center></h2>
    <p>
La rubrique Donations offre à toute personne, organisation ou partenaire l’opportunité de contribuer directement aux actions humanitaires et de développement menées par ARDHU dans les communautés les plus vulnérables. Chaque contribution, quel qu’en soit le montant, joue un rôle essentiel dans le renforcement de nos interventions et dans l’amélioration du bien-être des populations que nous accompagnons.
Votre soutien permet notamment de financer des: 
            </br></br>
- activités de soutien psychosocial pour les enfants, les femmes et les personnes affectées par les crises ;</br>
- programmes de formation et de renforcement des capacités destinés aux jeunes, aux leaders communautaires, aux enseignants et aux acteurs locaux ;</br>
- actions de cohésion sociale, de médiation et de promotion du vivre-ensemble ; </br>
- initiatives de protection de l’enfance, de défense des droits humains et de soutien aux personnes vulnérables ; </br>
- projets de résilience économique, de protection de l’environnement et d’appui aux moyens de subsistance.
</br>
    </p>
    <p>
       En choisissant de soutenir ARDHU, vous contribuez directement à créer un impact durable :
un impact qui se traduit par des enfants protégés, des familles accompagnées, des communautés renforcées, des droits respectés et des vies transformées.

Chaque geste compte.
Chaque contribution rapproche les communautés de la dignité, de la sécurité et de l’espoir qu’elles méritent.

Ensemble, faisons vivre la solidarité, la justice et l’humanité.
    </p>
<center>
    <div class="donation-call">
        <a href="faire_don.php" class="btn-don"><i class="fas fa-donate"></i> Faire un Don Maintenant</a>
    </div></center>
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
    text-align:justify;
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
