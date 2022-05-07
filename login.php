<?php
session_start();

require_once('src/utils/userModel.php');
require_once('src/utils/common.php');

if(isset($_SESSION['isAuthenticated'])){
    if ($_SESSION['isAuthenticated'] == true) {
        Common::redirect('/admin');
    }
}

$msg = "";
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isSuccessLogin = User::login($username, $password);
    if ($isSuccessLogin) {
        Common::redirect("/admin");
    }else{
        $msg = "    <script>
        Swal.fire({
        title: 'Error!',
        text: 'Username atau Password salah',
        icon: 'error',
        confirmButtonText: 'Ok'
        })
    </script>";
    }
}

?>

<!doctype html>
<html lang="en">
<?php require_once('./src/components/head.php') ?>

  <body>
  <?php require_once('./src/components/navbar.php') ?>

    <div class="">
      <?= $msg ?>
      <div class="row justify-content-center">
        <div class="col-11 col-md-5 p-5 shadow rounded col-lg-5 mt-5">
            <h2 class="text-primary fs-1">Login</h2>
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                  <label for="" class="form-label">Username</label>
                  <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Password</label>
                  <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

        </div>
      </div>

    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
