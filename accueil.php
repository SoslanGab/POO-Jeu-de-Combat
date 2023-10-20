


<?php 
    include 'header.php';


    require_once __DIR__ . '/config/db.php';
    require_once __DIR__ . '/config/autoload.php';
    $heroManager = new HeroManager($db);

 
    
    
    
    $heroes = $heroManager->findAllAlive();
    
?>







<main class="container mt-5">
    <div class="d-flex flex-wrap">
        <?php foreach ($heroes as $hero) { ?>
            <div class="card m-2" style="width: 18rem;">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $hero->getName() ?></h5>
                    <p class="card-text">
                        PV : <?= $hero->getHealthPoint() ?>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $hero->getHealthPoint() ?>" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-danger" style="width: <?= $hero->getHealthPoint() ?>%"></div>
                        </div>
                    </p>
                    <a href="./fight.php?hero_id=<?=$hero->getId()?>" class="btn btn-primary">Selectionner</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>






<script href="/assets/js/main.js"></script>