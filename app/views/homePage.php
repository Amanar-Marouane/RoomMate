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
    <div class="header">
        <div class="logo">RoomMate</div>
        
        <div id="burger-menu">
          <span></span>
        </div>

        <div id="menu">
            <ul>
              <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
              <li><a href="/profile"><i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
              <li><a href="#">About Us</a></li>
            </ul>
        </div>
            
    </div>
    <main>
        <!-- <img src="img/backg_home.jpg" alt=""> -->
    </main>

    <div class="actions">
        <a href="">
            <div class="view_ann">
                <h3>Discover announces</h3>
            </div>
        </a>
        <a href="">
            <div class="create_ann">
            <h3>Create announce</h3>
            </div>
        </a>
    </div>

    <div class="explore">
        <h3>Explore latest announces</h3>

        <div class="container">
            
            <!-- Card 1 -->
            <div class="card">
                <div class="profile">
                <img src="" alt="Profile">
                <div class="info">
                    <p class="name">Esther Dixon</p>
                    <p class="location">London - 22</p>
                  </div>
                </div>
                <div class="details">
                  <div class="column">
                    <span class="label">City</span>
                    <span class="value blue">Safi</span>
                  </div>
                  <div class="column">
                    <span class="label">Budget</span>
                    <span class="value blue">800 DH</span>
                  </div>
                  <div class="column">
                    <span class="label">Availability</span>
                    <span class="value blue">05 november</span>
                  </div>
                  <div class="column">
                    <span class="label">Type</span>
                    <span class="value blue">Offer</span>
                  </div>
                  <div class="column">
                  <span class="label">Details</span>
                    <button class="btn blue">⮞</button>
                    </div>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="card">
                <div class="profile">
                <img src="" alt="Profile">
                  <div class="info">
                    <p class="name">Alan Turing</p>
                    <p class="location">Edinburgh - 28</p>
                  </div>
                </div>
                <div class="details">
                  <div class="column">
                    <span class="label">City</span>
                    <span class="value orange">Safi</span>
                  </div>
                  <div class="column">
                    <span class="label">Budget</span>
                    <span class="value orange">500 DH</span>
                  </div>
                  <div class="column">
                    <span class="label">Availability</span>
                    <span class="value orange">05 november</span>
                  </div>
                  <div class="column">
                    <span class="label">Type</span>
                    <span class="value orange">Demand</span>
                  </div>
                  <div class="column">
                    <button class="btn orange">⮞</button>
                    </div>    
                </div>
              </div>

              <!-- Card 3 -->
              <div class="card">
                <div class="profile">
                <img src="" alt="Profile">
                  <div class="info">
                    <p class="name">Angel Gregory</p>
                    <p class="location">Bradford - 23</p>
                  </div>
                </div>
                <div class="details">
                  <div class="column">
                    <span class="label">City</span>
                    <span class="value blue">Safi</span>
                  </div>
                  <div class="column">
                    <span class="label">Budget</span>
                    <span class="value blue">1200 DH</span>
                  </div>
                  <div class="column">
                    <span class="label">Availability</span>
                    <span class="value blue">05 november</span>
                  </div>
                  <div class="column">
                    <span class="label">Type</span>
                    <span class="value blue">Offer</span>
                  </div>
                  <div class="column">
                    <button class="btn blue">⮞</button>
                    </div>    
                </div>
              </div>
        </div>

        <div>
            <button class="all_ann">All announces ⮞</button>
        </div>
    </div>



    <script src="../JS/homePage.js"></script>
    <?php include 'partials/footer.view.php'; ?>
