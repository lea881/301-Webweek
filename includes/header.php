<!-- J'utilise la variable path pour que le chemin s'adapte en fonction de la page (ce ne sont pas les même chemin si on vient de index ou d'une autre page)-->
<script src="<?php echo $path; ?>js/script.js"></script>
<header>
  <a href="<?php echo $path; ?>index.php">
    <img src="<?php echo $path; ?>img/logo.jpg" alt="Logo" class="logo">
  </a>

  <nav class="menu-desktop">
    <a href="<?php echo $path; ?>pages/stagecarte.php">Stages</a>
    <a href="<?php echo $path; ?>pages/cours.php">Cours</a>
    <a href="<?php echo $path; ?>pages/association.php">Association</a>
    <a href="<?php echo $path; ?>pages/histoire.php">Histoire du sport</a>
  </nav>

  <div class="header-droit-desktop">
    <span class="phone">06-10-90-24-32</span>
    <a href="<?php echo $path; ?>pages/contact.php" class="bouton">Contact</a>
    <a href="<?php echo $path; ?>pages/connexion.php" class="bouton">Connexion</a>
  </div>

  <div class="menu-burger">
    <h4 id="bouton"> V </h4>
    <nav class="nav-burger" id="menu">
      <a href="<?php echo $path; ?>pages/stagecarte.php">Stage</a>
      <a href="<?php echo $path; ?>pages/cours.php">Cours</a>
      <a href="<?php echo $path; ?>pages/association.php">Association</a>
      <a href="<?php echo $path; ?>pages/histoire.php">Histoire</a>
      <span class="phone">06-10-90-24-32</span>
      <a href="<?php echo $path; ?>pages/contact.php" class="bouton">Contact</a>
      <a href="<?php echo $path; ?>pages/connexion.php" class="bouton">Connexion</a>
    </nav>
  </div>
</header>


