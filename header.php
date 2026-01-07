<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Online Notes Sharing</title>
  <style>
    /* Sticky Header */
    .sticky-header {
      position: sticky;
      top: 0;
      z-index: 1000;
      background-color: #2fa4e7;
      box-shadow: 0 2px 6px #2fa4e7;
      padding: 10px 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Logo Text */
    .logo-text {
      color: #ffffff;
      font-weight: bold;
      font-size: 22px;
      margin: 0;
      transition: color 0.3s;
    }
    .logo-text:hover {
      color: #00e6e6;
    }

    /* Navigation Links */
    .nav-list {
      display: flex;
      list-style: none;
      gap: 30px;
      margin: 0;
      padding: 0;
      align-items: center;
      justify-content: flex-end;
    }
    .nav-list li a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .nav-list li a:hover {
      color: #00e6e6;
    }

    /* Buttons */
    .nav-btn, .nav-btn-outline {
      padding: 6px 16px;
      border-radius: 25px;
      font-weight: bold;
      font-size: 14px;
      text-transform: uppercase;
      cursor: pointer;
      display: inline-block;
      border: none;
      user-select: none;
    }
    .nav-btn {
      background-color: #00e6e6;
      color: #000;
      border: none;
    }
    .nav-btn:hover {
      background-color: #00cccc;
    }
    .nav-btn-outline {
      border: 2px solid #00e6e6;
      color: #00e6e6;
      background: transparent;
    }
    .nav-btn-outline:hover {
      background-color: #00e6e6;
      color: #000;
    }

    /* Mobile Menu */
    .menu-toggle {
      background: none;
      color: white;
      font-size: 26px;
      border: none;
      cursor: pointer;
    }
    #mobileNav {
      display: none;
      flex-direction: column;
      background-color: #222;
      padding: 10px;
      position: absolute;
      right: 10px;
      top: 60px;
      border-radius: 6px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.4);
      z-index: 1500;
      width: 150px;
    }
    #mobileNav a {
      color: white;
      text-decoration: none;
      margin: 8px 0;
      display: block;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    #mobileNav a:hover {
      color: #00e6e6;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
      .nav-list {
        display: none; /* hide desktop nav on smaller screens */
      }
    }
  </style>
</head>
<body>
  <!-- Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="assets/img/logo/loder.png" alt="Loading..." />
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader End -->

  <header class="sticky-header">
    <div class="header-area">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
          <!-- Logo -->
          <div class="col-lg-3 col-md-4 col-8">
            <div class="logo">
              <a href="index.php">
                <h3 class="logo-text">Online Notes Sharing</h3>
              </a>
            </div>
          </div>
          <!-- Navigation -->
          <div class="col-lg-9 col-md-8 col-4 text-end">
            <nav class="main-nav d-none d-lg-block">
              <ul id="navigation" class="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="notes.php">Notes</a></li>
                <li><a href="user/signin.php" class="btn nav-btn-outline">Admin in</a></li>
              </ul>
            </nav>
            <!-- Mobile toggle -->
            <div class="mobile_menu d-block d-lg-none position-relative">
              <button id="mobileToggle" class="menu-toggle" aria-label="Toggle Menu">☰</button>
              <div class="mobile-nav" id="mobileNav" aria-hidden="true">
                <a href="index.php">Home</a>
                <a href="notes.php">Notes</a>
                <a href="user/signin.php">Admin in</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <script>
    // Mobile menu toggle functionality
    document.getElementById("mobileToggle").addEventListener("click", function () {
      const nav = document.getElementById("mobileNav");
      const isVisible = nav.style.display === "flex";
      nav.style.display = isVisible ? "none" : "flex";
      nav.setAttribute("aria-hidden", isVisible ? "true" : "false");
    });

    // Optional: Close mobile menu when clicking outside
    document.addEventListener("click", function(event) {
      const mobileNav = document.getElementById("mobileNav");
      const toggleButton = document.getElementById("mobileToggle");
      if (!mobileNav.contains(event.target) && !toggleButton.contains(event.target)) {
        mobileNav.style.display = "none";
        mobileNav.setAttribute("aria-hidden", "true");
      }
    });
  </script>
</body>
</html>
