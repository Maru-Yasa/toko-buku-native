<nav class="navbar navbar-expand navbar-dark" style="background-color: #A85CF9;">
  <div class="container">
    <div class="nav navbar-nav">
      <div class="navbar-brand">
        Toko Buku
      </div>
      <a class="nav-item nav-link active" href="/">Home <span class="visually-hidden">(current)</span></a>
      <a class="nav-item nav-link" href="/#buku">Buku</a>
      <a class="nav-item nav-link" href="/login.php">Admin</a>
    </div>
    <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['isAuthenticated'])){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i> <?= $_SESSION['user']['username'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil"></i> Edit</a></li>
                  <li>
                    <form action="logout.php" method="get">
                      <button type="submit" class="btn dropdown-item" value="Logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>

                </ul>
              </li>
            <?php } ?>
      </ul>
  </div>
</nav>