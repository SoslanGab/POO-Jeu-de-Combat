<?php
require_once __DIR__ . '/config/db.php';

require_once __DIR__ . '/config/autoload.php';
$heroManager = new HeroManager($db);

if (isset($_POST['hero_name']) && !empty($_POST['hero_name'])) {
    $hero = new Hero(['name' => $_POST['hero_name'], 'type' => $_POST['type']]);
    $heroManager->add($hero);
    header('Location: accueil.php');
}



$heroes = $heroManager->findAllAlive();

?>


  <?php include 'header.php'; ?>

 <!-- Video accueil -->
 <div class="video-background">
    <!-- <video loop class="video_acc"  autoplay>
        <source src="assets/video/video.mp4" type="video/mp4">
    </video> -->
    <img src="assets/images/arrplan.jpg" alt="">
</div>

<!-- Formulaire de connexion -->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10 d-flex justify-content-center">
          <div class="card w-75 "  style="border-radius: 1rem;">
                <div class="card-body text-black">
                  <form method="post" >
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0 mx-auto"><img width="260" src="assets/images/logo.png" alt=""></span>
                    </div>
                    <div class="form-outline text-center">
                      <input type="text" id="form2Example17" name="hero_name" class="w-75 mx-auto form-control form-control-lg bg-dark" placeholder="nom"/>
                      <label class="form-label" for="form2Example17">Creer un combattant pour pouvoir jouer</label>
                    </div>
                    <div class="form-outline text-center">
                      <select class=" text-secondary form-control border-0 mx-auto form-control-lg bg-dark" name="type" id="">
                            <option value="">Choisir le type de combattant</option>
                            <option value="striker">striker</option>
                            <option value="grappler">grappler</option>
                            <option value="mixte">mixte</option>
                      </select>
                      <label class="form-label" for="form2Example17">Choisir le type de combattant</label>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-lg btn-dark btn-block" type="submit">Creer</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>