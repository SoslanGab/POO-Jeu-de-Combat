<?php 
    require_once __DIR__ . '/config/autoload.php';
    require_once __DIR__ . '/config/db.php';
    

    if (isset($_GET['hero_id']) && !empty($_GET['hero_id'])) {
        $heroManager = new HeroManager($db);
        $hero = $heroManager->find($_GET['hero_id']);

        $fightManager = new FightManager($db);

        $randomNumber = rand(1,3);
        $monster = $fightManager->findm($randomNumber);
        // $monster = $fightManager->createMonster();
        $history = $fightManager->fight($hero, $monster);
        $heroManager->update($hero);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>TP Combat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

  <?php include 'header.php'; ?>
    <main class="container mt-5 d-flex align-items-center justify-content-center">
        <div class="card m-2" style="width: 18rem;">
            <img src="https://www.pngmart.com/files/23/Ufc-PNG-Photo.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $hero->getName() ?></h5>
                <h6 class=""><?= $hero->getType() ?></h6>
                <p class="card-text">
                    PV : <?= $hero->getHealthPoint() ?>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $hero->getHealthPoint() ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: <?= $hero->getHealthPoint() ?>%"></div>
                    </div>
                </p>
            </div>
        </div>

        <h1> VS </h1>

        <div class="card m-2" style="width: 18rem;">
            <img src="https://www.pngmart.com/files/23/Ufc-PNG.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $monster->getName() ?></h5>
                <h6 class=""><?= $hero->getType() ?></h6>
                <p class="card-text">
                    PV : <?= $monster->getHealthPoint() ?>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $monster->getHealthPoint() ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: <?= $monster->getHealthPoint() ?>%"></div>
                    </div>
                </p>
            </div>
        </div>
    </main>

    <section class="container">
        <?php foreach ($history as $key => $message) { ?>
        
            <div class="alert <?= $key % 2 ? 'alert-primary': 'alert-danger'  ?>" role="alert">
                <?= $message ?>
            </div>
        
        <?php } ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>