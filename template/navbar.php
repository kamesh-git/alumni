<head>
  <style>
    ul.navbar .nav-link {
      color: "black";
    }
  </style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/alumni"> <img width="50" src="/alumni/assets/headicon.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'home')
            echo "active"; ?>" aria-current="page" href="/alumni">Home</a>
        </li>
        <?php
        session_start();
        if (isset($_SESSION["admin"])) {
          if ($page == 'student')
            echo '<li class="nav-item">
        <a class="nav-link active" href="/alumni/student">Students</a>
      </li>';
          else
            echo '<li class="nav-item">
      <a class="nav-link" href="/alumni/student">Students</a>
    </li>';
        }
        ?>
        <?php
        if (isset($_SESSION["admin"])) {
          if ($_SESSION["admin"])
            if ($page == 'staff')
              echo '<li class="nav-item">
          <a class="nav-link active" href="/alumni/staff">Staff</a>
        </li>';
            else
              echo '<li class="nav-item">
          <a class="nav-link" href="/alumni/staff">Staff</a>
        </li>';
        }
        ?>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php
        if (isset($_SESSION["admin"]))
          echo '
          <li class="nav-item">
          <a class="nav-link" href="/alumni/notification"><img src="/alumni/assets/notification.svg" alt=""></a>
          </li>
          <li class="nav-item">
          <div class="d-flex align-items-center">
      <img src="/alumni/assets/user.svg" alt="Profile" width="30" height="30" class="rounded-circle ms-auto me-auto">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <!-- Dropdown Menu -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ' . $_SESSION["user_details"]["firstname"] . '
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/alumni/profile">My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/alumni/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
        </li>';
        else {
          if ($page == 'login')
            echo '<li class="nav-item">
          <a class="nav-link active" href="/alumni/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/alumni/register">Register</a>
        </li>';
          else if ($page == 'register')
            echo '<li class="nav-item">
          <a class="nav-link" href="/alumni/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/alumni/register">Register</a>
        </li>';
          else
            echo '<li class="nav-item">
          <a class="nav-link" href="/alumni/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/alumni/register">Register</a>
        </li>';
        }
        ?>
      </ul>

    </div>
  </div>
</nav>