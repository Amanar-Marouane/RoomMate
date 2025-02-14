<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Roomate</title>
  <link rel="stylesheet" href="CSS/singleOffer.css">

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
      <!-- Image Group -->
      <div class="property-images">
        <div class="main-image">
          <img src="assets/offer3.png" alt="Main Room" />
        </div>
        <div class="side-images">
          <img src="assets/offer1.png" alt="Office" />
          <img src="assets/offer2.png" alt="Living Room" />
        </div>
      </div>
      

      <!-- Description & User Card -->
      <div class="property-info">
        <div class="property-details">
          <p class="date">12 November 2021</p>
          <h2>Entire residential home appartement</h2>
          <p class="rooms">
            <strong>3 rooms</strong> &nbsp; <i class="fas fa-bed"></i> 3
          </p>
          <p class="description">
            Situé dans un quartier populaire de la médina, le riad Dar Mata vous fera vivre une vraie
            expérience dans la vie des marrakchis...
          </p>
        </div>
        <div class="contact-card">
          <img src="assets/user-profile.png" alt="Hakim Jellaba" class="profile-img" />
          <h3>Hakim Jellaba</h3>
          <p class="age">FES - 23</p>
          <ul>
            <li><i class="fas fa-wallet"></i> Budget: <strong>800 DH</strong></li>
            <li><i class="fas fa-city"></i> City: <strong>Safi</strong></li>
            <li><i class="fas fa-map-marker-alt"></i> Address: <strong>Al Amal</strong></li>
            <li><i class="fas fa-calendar-alt"></i> Availability: <strong>Immediately</strong></li>
            <li><i class="fas fa-door-open"></i> Room Type: <strong>Shared</strong></li>
          </ul>
          <button class="contact-btn">Contact Hakim</button>
          <p class="report"><i class="fas fa-flag"></i> Report this offer</p>
        </div>
      </div>
    </section>
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
