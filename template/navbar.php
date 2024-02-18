<head>
  <style>
    ul.navbar .nav-link {
      color: "black";
    }
  </style>
</head>

<!-- Add Notification Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="mb-4">Add Notification</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/alumni/notification/addNotification.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="file" accept="image/*" class="form-control" id="photo" name="photo" rows="5" />
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

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
          <a class="nav-link <?php session_start();
          if ($page == 'home')
            echo "active"; ?>" aria-current="page" href="/alumni">Home</a>
        </li>

        <?php
        if (isset($_SESSION["admin"]))
          if ($_SESSION["user_details"]["desig"] != "student")
            echo '<li class="nav-item">
            <div class="dropdown ">
              <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Register
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

        if (isset($_SESSION["admin"])) {
          if ($_SESSION["user_details"]["desig"] != "student")
            echo '<li><a class="dropdown-item" href="/alumni/student">Students</a></li>';
        }
        ?>
        <?php
        if (isset($_SESSION["admin"])) {
          if ($_SESSION["admin"])
            echo '<li><a class="dropdown-item" href="/alumni/staff">Staff</a></li>';
        }
        if (isset($_SESSION["admin"]))
          if ($_SESSION["user_details"]["desig"] != "student")
            echo '</div>
            </li>
            </ul>';

        ?>



      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php
        if (isset($_SESSION["admin"]))
          echo '
          <li class="nav-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <a style="cursor: pointer;" class="nav-link"><img src="/alumni/assets/notification.svg" alt=""> + </a>
          </li>
          <li class="nav-item">
          <div class="d-flex align-items-center">
      <img src="/alumni/userphoto/' . $_SESSION["user_details"]["email"] . $_SESSION["user_details"]["photo"] . '" alt="Profile" width="30" height="30" class="rounded-circle ms-auto me-auto">
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