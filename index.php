<?php
session_start();
require_once('./src/utils/bukuModel.php');

if (!isset($_GET['cari'])) {
  $msg = "List semua Buku";
  $books = Buku::all();
}else{
  $query = $_GET['cari'];
  $books = Buku::search($query);
  $msg = "Hasil pencarian untuk $query";
}

?>

<!doctype html>
<html lang="en">
<?php require_once('./src/components/head.php') ?>

  <body>
  <?php require_once('./src/components/navbar.php') ?>
    <div class="">
      
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="p-5 bg-light text-center row justify-content-center">
              <h1 class="display-3">Toko Buku Sabrina</h1>
              <p class="lead">Buku berkualitas harga sesuai kualitas</p>
              <p class="lead">
              <form action="" method="get" class="col-10 col-md-6">
                <input name="cari" type="text" class="form-control form-control-lg rounded-pill" placeholder="Cari Buku">
                <button class="btn btn-outline-primary btn-lg rounded-pill mt-3" type="submit"> <i class="bi bi-search"></i> Cari</button>
              </form>
              </p>
          </div>
        </div>
        <div class="col-10 p-5 mt-5">
          <h1><?= $msg ?></h1>
          <div class="row justify-content-center">
            <?php if (count($books) !== 0) { ?>
              <?php foreach ($books as $key => $value) { ?>
              <div class="col-lg-4 d-flex align-items-stretch my-2">
                <div class="card p-3">
                  <img src="<?= $value['sampul'] ?>" class="card-img-top" alt="">
                  <div class="card-body d-flex flex-column mt-auto">
                    <h3 class="card-title"><?= $value['judul'] ?></h3>
                    <p class="card-text"><?= $value['sinopsis'] ?></p>
                    <a href="javascript:void(0)" class="btn btn-outline-primary mt-3 d-block mt-auto"> <i class="bi bi-cart-fill"></i> - Rp <?= $value['harga'] ?></a>   

                  </div>
                </div>
              </div>
              <?php } ?>
            <?php } else { ?>
              <div class="text-center my-5">
                <h2 class="text-muted">Buku tidak ditemukan</h2>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
