<?php require "includes/header.php" ?>
<?php require_once "database/connection.php";?>
    <header>
        <?php
        $stmt =  $conn ->query("SELECT * FROM cars LIMIT 1");  
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($cars as $car) : ?>
            <div class="advertorials">
                <div class="advertorial">
                    <h2>Hét platform om een auto te huren</h2>
                    <p>Snel en eenvoudig een auto huren. Natuurlijk voor een lage prijs.</p>
                    <a href="/car-detail?id=<?= $car['Cars_ID'] ?>"class="button-primary">Huur nu een auto</a>
                    <img class="carimage" src="assets/images/products/<?= htmlspecialchars($car['Image'])?>"  alt="">
                    <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
                </div>
                <div class="advertorial">
                    <h2>Wij verhuren ook bedrijfswagens</h2>
                    <p>Voor een vaste lage prijs met prettig voordelen.</p>
                    <a href="/car-detail?id=<?= $car['Cars_ID'] ?>"class="button-primary">Huur een bedrijfswagen</a>
                    <img class="carimage" src="assets/images/products/<?= htmlspecialchars($car['Image'])?>"  alt="">
                    <img src="assets/images/header-block-background.svg" alt="" class="background-header-element">

                </div>
            </div>
        <?php endforeach; ?>
    
    </header>

    <main>
             
        <?php
        $stmt =  $conn ->query("SELECT * FROM cars LIMIT 4");  
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
       
        <h2 class="section-title">Populaire auto's</h2>
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

    <?php

            $stmt = $conn->query("SELECT * FROM cars LIMIT 8 OFFSET 4"); 
            $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
     ?>
            <h2 class="section-title">Aanbevolen auto's</h2>
        <div class="cars">
            <?php foreach ($cars as $car) : ?>
                <div class="car-details">
                    <div class="car-brand">
                        <h3><?= htmlspecialchars( $car['Model']  ) ?></h3>
                        <div class="car-type">
                            <?= htmlspecialchars($car['type' ] ) ?>
                        </div>
                    </div>
                    <img src="assets/images/products/<?= htmlspecialchars($car['Image']) ?>" alt="">
                    <div class="car-specification">
                        <span><img src="assets/images/icons/gas-station.svg" alt=""><?= $car['Liters'] ?>l</span>
                        <span><img src="assets/images/icons/car.svg" alt=""><?= $car['CarGear'] ?></span>
                        <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= $car['Capacity'] ?> Personen</span>
                    </div>
                    <div class="rent-details">
                        <span><span class="font-weight-bold">€<?= number_format($car['PricePerDay'], 2, ',', '.') ?></span> / dag</span>
                        <a href="/car-detail?id=<?= $car['Cars_ID'] ?>" class="button-primary">Bekijk nu</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
    <div class="show-more">
        <a class="button-primary" href="/ons-aanbod">Toon alle</a>
    </div>
    </main>

<?php require "includes/footer.php" ?>