<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Roomate - Demand Page</title>
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="CSS/SingleDemande.css" />
  <!-- Font Awesome (for icons) -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="header-container">
      <a href="#" class="logo">Roomate</a>
      <button class="get-started">Get Started</button>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <div class="property-container">
    <?php foreach( $demandes as $demande) :?>

      <!-- Left side: Demand details -->
      <div class="property-details">
        <h2><?php echo $demande['title']?> </h2>
        <p class="date"><?php 
    echo date("d F Y", strtotime($demande['created_at'] ?? 'now')); 
?>
</p>
        <p class="description">
          <!-- Situé dans un quartier populaire de la médina, le riad Dar Mata vous fera vivre une vraie
          expérience dans la vie des marrakchis. La maison est conçue, très équipée et le confort est
          assuré pour des séjours de courte durée. Vous aurez accès à la cuisine où la composition des
          dîners se boit paisiblement. Les chambres sont toutes bien privatisées pour votre confort. -->
          <?php echo $demande['description']?>
        </p>
      </div>

      <!-- Right side: User info card -->
      <div class="contact-card">
        <div class="profile">
          <img src="/<?= $announce['photo'] ?>" alt="User photo" />
          <h3><?php echo $demande['full_name']?></h3>
        </div>
        <ul>
          <li><i class="fas fa-wallet"></i> Budget: <strong><?php echo $demande['budget']?> DH</strong></li>
          <li><i class="fas fa-city"></i> City: <strong><?php echo $demande['localisation']?></strong></li>
          <li><i class="fas fa-calendar-alt"></i> Date d'emménagement: <strong><?php echo $demande['move_in_date']?></strong></li>
          <li><i class="fas fa-door-open"></i> demand Type: <strong><?php echo $demande['demand_type']?></strong></li>
          <li><i class="fas fa-door-open"></i> zones_souhaitees: <strong><?php echo $demande['zones_souhaitees']?></strong></li>
        </ul>
        <button class="contact-btn">Contact <?php  echo $demande['full_name']?></button>
        <p class="report"><i class="fas fa-flag"></i> Report this demand</p>
        <!-- Bouton de contact -->



<!-- Formulaire de signalement -->


</form>

        
      </div>
    </div>
 <?php endforeach;?>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <h2>Roomate</h2>
      <p>
        Roomate mission is to help you find a student roommate easily.
        We offer a new way to share a room in a short time.
        Our mission is to help you code students.
      </p>
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
