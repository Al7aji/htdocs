<?php require "includes/header.php" ?>

<?PHP require_once "database/connection.php";?>


<?php

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Ongeldig voertuig-ID.");
}

$carId = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM cars WHERE Cars_ID = ?");
$stmt->execute([$carId]);
$car = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$car) {
    die("De auto bestaat niet.");
}
?>


<main class="car-detail">
    <div class="grid">
        <div class="row">
            <div class="advertorial">
                <h2><?= htmlspecialchars($car['type']) ?> met het beste design en snelheid</h2>
                <p>Veiligheid en comfort terwijl je rijdt in een futuristische en elegante auto</p>
                <img src="assets/images/products/<?= htmlspecialchars($car['Image']) ?>" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
        </div>

        <div class="row white-background">
            <h2> <?= htmlspecialchars($car['Model']) ?></h2>
            <div class="rating">
                <span class="stars stars-4"></span>
                <span>440+ reviewers</span> 
            </div>
            <p><?= htmlspecialchars($car['Model']) ?> is het toonbeeld geworden van uitzonderlijke prestaties, geïnspireerd door het circuit.</p>
            <div class="car-type">
                <div class="grid">
                    <div class="row"><span class="accent-color">Type Car</span><span><?= htmlspecialchars($car['type']) ?></span></div>
                    <div class="row"><span class="accent-color">Capacity</span><span><?= $car['Capacity'] ?> personen</span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="accent-color">Steering</span><span><?= htmlspecialchars($car['CarGear']) ?></span></div>
                    <div class="row"><span class="accent-color">Gasoline</span><span><?= $car['Liters'] ?>L</span></div>
                </div>
                <div class="call-to-action">
                    <div class="row"><span class="font-weight-bold">€<?= number_format($car['PricePerDay'], 2, ',', '.') ?></span> / dag</div>
                    <div class="row"><a href="#" class="button-primary">Huur nu</a></div>
                </div>
            </div>
        </div>
    </div>
</main>





<?php require "includes/footer.php" ?>
