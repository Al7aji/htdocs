<?php require "includes/header.php" ?>
<?php require_once "database/connection.php";?>

<main>
            

    
    <?php
        $stmt =  $conn ->query("SELECT * FROM cars ");  
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
<div class="container">
        <div class="col-1">
            <?PHP require_once "includes/navbarside.php";?>
        </div>
        <div class="col-2">
            <div class="cars">
                <?php foreach ($cars as $car) : ?>
                    <div class="car-details"> 
                        <div class="car-brand">
                            <h3><?= htmlspecialchars(  $car['Model']  ) ?></h3>
                            <div class="car-type">
                                <?= htmlspecialchars(  $car['type']  ) ?>
                            </div>
                        </div>
                        <img src="assets/images/products/<?= htmlspecialchars($car['Image']) ?>" alt="">
                        <div class="car-specification">
                            <span><img src="assets/images/icons/gas-station.svg" alt=""><?= $car['Liters'] ?>l</span>
                            <span><img src="assets/images/icons/car.svg" alt=""><?= htmlspecialchars($car['CarGear']) ?></span>
                            <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= $car['Capacity'] ?> Personen</span>
                        </div>
                        <div class="rent-details">
                            <span><span class="font-weight-bold">€<?= number_format($car['PricePerDay'], 2) ?></span> / dag</span>
                            <a href="/car-detail?id=<?= $car['Cars_ID'] ?>" class="button-primary">Bekijk nu</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

    
</main>
<?php require "includes/footer.php" ?>

