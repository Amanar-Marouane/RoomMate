<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

  <link rel="stylesheet" href="CSS/homePage.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
  </style>

  <title>home page</title>
</head>

<body>
  <?php include __DIR__ . "/partials/header.view.php" ?>
  <main>
    <!-- <img src="img/backg_home.jpg" alt=""> -->
  </main>

  <div class="actions">
    <a href="">
      <div class="view_ann">
        <a href="/liste"><h3>Discover announces</h3></a>
      </div>
    </a>
    <a href="">
      <div class="create_ann">
        <a href="/annonce"><h3>Create announce</h3></a>
      </div>
    </a>
  </div>

  <div class="explore">
    <h3>Explore latest announces</h3>

    <div class="container">

      <?php foreach ($announces as $announce):
                        extract($announce) ?>
                        <?php if ($announce_type === 'Offre') : ?>

      <div class="card">
        <div class="profile">
          <img src="<?= $photo ?>" alt="Profile">
          <div class="info">
            <p class="name"><?= $full_name ?></p>
            <p class="location"><?= $origin_city ?></p>
          </div>
        </div>
        <div class="details">
          <div class="column">
            <span class="label">City</span>
            <span class="value blue"><?= $address ?></span>
          </div>
          <div class="column">
            <span class="label">Budget</span>
            <span class="value blue"><?= $budget ?></span>
          </div>
          <div class="column">
            <span class="label">Availability</span>
            <span class="value blue"><?= $available_at ?></span>
          </div>
          <div class="column">
            <span class="label">Type</span>
            <span class="value blue"><?= $announce_type ?></span>
          </div>
          <div class="column">
            <span class="label">Details</span>
            <a href="" class="btn blue">⮞</a>
          </div>
        </div>
      </div>

      <?php elseif ($announce_type === 'Demande') : ?>
        <div class="card">
        <div class="profile">
          <img src="<?= $photo ?>" alt="Profile">
          <div class="info">
            <p class="name"><?= $full_name ?></p>
            <p class="location"><?= $origin_city ?></p>
          </div>
        </div>
        <div class="details">
          <div class="column">
            <span class="label">City</span>
            <span class="value orange"><?= $address ?></span>
          </div>
          <div class="column">
            <span class="label">Budget</span>
            <span class="value orange"><?= $budget ?></span>
          </div>
          <div class="column">
            <span class="label">Availability</span>
            <span class="value orange"><?= $available_at ?></span>
          </div>
          <div class="column">
            <span class="label">Type</span>
            <span class="value orange"><?= $announce_type ?></span>
          </div>
          <div class="column">
            <span class="label">Details</span>
            <a href="" class="btn orange">⮞</a>
          </div>
        </div>
      </div>      
       
      <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="all_ann">
      <a href="/liste" >All announces ⮞</a>
    </div>
  </div>



  <script src="../JS/homePage.js"></script>
  <?php include 'partials/footer.view.php'; ?>