<?php 
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=localhost;dbname=rental", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $stmt = $conn->prepare("SELECT * FROM cars WHERE Model LIKE :q OR type LIKE :q");
    $stmt->execute([':q' => "%$q%"]);
    $cars = $stmt->fetchAll();

    if ($cars) {
?>
        <div class="cars">
            <?php foreach ($cars as $car) : ?>
                <div class="car-details">
                    <div class="car-brand">
                        <h3><?= htmlspecialchars($car['Model']) ?></h3>
                        <div class="car-type">
                            <?= htmlspecialchars($car['type']) ?>
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
<?php
    } else {
        echo "<p>🚗 Geen resultaten gevonden.</p>";
    }
}
?>


