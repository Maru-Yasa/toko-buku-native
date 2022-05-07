<?php
session_start();
require_once('../src/utils/common.php');
if(isset($_SESSION['isAuthenticated'])){
    if ($_SESSION['isAuthenticated'] == false) {
            Common::redirect('/login.php');
    }
}else{
    Common::redirect('/login.php');
}

?>

 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../src/components/head.php'); ?>
 <body>
     
    <div class="container-fluid">
        <div class="row">
            <?php require_once('../src/components/sidebar.php'); ?>
            <div class="col-sm p-3 min-vh-100 row justify-content-center">
               <div class="col-12 row justify-content-center">
                  <h1 class="text-primary mx-3">Dashboard</h1>
                  <div class="text-center">
                     <i class="bi bi-person-circle text-primary" style="font-size: 70px;"></i>
                     <br>
                     <span class="fs-3 mb-2">
                        Halo, <?= $_SESSION['user']['username'] ?>
                     </span>
                     <br>
                     <a class="btn btn-sm btn-outline-primary" href="/admin/edit_profile.php?id=<?= $_SESSION['user']['id'] ?>"> <i class="bi bi-pencil-fill"></i> Edit profile</a>
                  </div>
               </div>
            </div>
        </div>
    </div>


 </body>
 </html>