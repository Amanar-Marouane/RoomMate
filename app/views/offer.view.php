<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Roomate</title>
  <link rel="stylesheet" href="CSS/singleOffer.css">
  <style></style>
  <style></style>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="container header-container">
      <h1 class="logo">Roomate</h1>
      <button class="get-started">Get Started</button>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <section class="property">
     

    <div class="property-images">
  <?php foreach($galaries as $photo): ?>
    <div class="main-image">
      <img src="/assets/<?= htmlspecialchars($photo['media']) ?>" alt="Image de l'offre" />
    </div>
  <?php endforeach; ?>
</div>

      <!-- Description & User Card -->
      <div class="property-info">
        <?php foreach( $offres as $offre):?>
        <div class="property-details">
          <p class="date"><?php echo date("d F Y", strtotime($demande['created_at'] ?? 'now')); ?></p>
          <h2><?php echo $offre['title']?> </h2>
          <p class="rooms">
            <!-- <strong>3 rooms</strong> &nbsp; <i class="fas fa-bed"></i> 3 -->
          </p>
          <p class="description">
           <?php  echo $offre['description']?>
          </p>
          <p class="description"> <strong>criteres_colocataire:</strong>
           <?php  echo $offre['criteres_colocataire']?>
          </p>
          <p class="description"> <strong>regles_cohabitation:</strong>
           <?php  echo $offre['regles_cohabitation']?>
          </p>
          
        </div>
        <div class="contact-card">
          <img src="/<?= $announce['photo'] ?>" alt="Hakim Jellaba" class="profile-img" />
          <h3><?php echo $offre['full_name'] ?></</h3>
          <p class="age"><?php echo $offre['origin_city'] ?></p>
          <ul>
            <li><i class="fas fa-wallet"></i> Budget: <strong><?php  echo $offre['budget']?> DH</strong></li>
            <li><i class="fas fa-city"></i> City: <strong><?php echo $offre['localisation']?></strong></li>
            <li><i class="fas fa-map-marker-alt"></i> Address: <strong> <?php echo $offre['address']?></strong></li>
            <li><i class="fas fa-calendar-alt"></i> Availability: <strong> <?php echo date("d F Y", strtotime($demande['available_at'] ?? 'now'));?></strong></li>
            <li><i class="fas fa-door-open"></i> Room Type: <strong><?php echo $offre['demand_type']?></strong></li>
            <li><i class="fas fa-door-open"></i> Capacité d'accueil: <strong><?php echo $offre['capacite_accueil']?></strong></li>
            <li><i class="fas fa-door-open"></i> equipements: <strong><?php echo $offre['equipements']?></strong></li>

          </ul>
          <button class="contact-btn">Contact  <?php echo $offre['full_name'] ?></button>
          <p class="report"><i class="fas fa-flag"></i> Report this offer</p>
        </div>
      </div>
      <?php endforeach 
;?>    </section>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <h2>Roomate</h2>
      <p>Our mission is to help you find a student roommate easily</p>
    </div>
    <nav>
      <a href="#">Home</a>
      <a href="#">Contact us</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Term of use</a>
    </nav>
  </footer>
</body>
</html>
