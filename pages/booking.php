<?php require "../includes/header.php" ?>
<?php require_once "../database/connection.php" ?>

<?php
// Get car ID from URL
$carId = isset($_GET['car_id']) ? (int)$_GET['car_id'] : 0 ;

// Fetch car info for display
$car = null;
if ($carId) {
    $stmt = $conn->prepare("SELECT * FROM cars WHERE Cars_ID = ?");
    $stmt->execute([$carId]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

   <h2>Boeking maken</h2>
    <?php if ($car): ?>
        <div class="car-summary">
            <h3><?= htmlspecialchars($car['Model']) ?></h3>
            <img src="../assets/images/products/<?= htmlspecialchars($car['Image']) ?>" alt="" style="max-width:200px;">
            <p>Prijs per dag: €<?= number_format($car['PricePerDay'], 2, ',', '.') ?></p>
        </div>
    <?php endif; ?>

    

  <form action="booking.php" method="post" class="booking-form">
  <input type="hidden" name="car_id" value="<?= $carId ?>">
  
  <!-- Step 1: Billing Info -->
  <div class="form-step">
    <div class="step-header">
      <h3>Billing Info</h3>
      <span>Step 1 of 4</span>
      <p>Please enter your billing info</p>
    </div>

    <div class="billing-grid">
      <div class="left-column">
        <div class="form-group">
          <label for="customer_name">Name</label>
          <input type="text" name="name" id="customer_name" placeholder="Your name" required>
        </div>
        <div class="form-group">
          <label for="customer_Address">Address</label>
          <input type="text" name="Address" id="customer_Address" placeholder="Address" required>
        </div>
      </div>
      <div class="right-column">
        <div class="form-group">
          <label for="customer_phone">Phone Number</label>
          <input type="text" name="phone" id="customer_phone" placeholder="Phone number" required>
        </div>
        <div class="form-group">
          <label for="customer_city">Town / City</label>
          <input type="text" name="Town_city" id="customer_city" placeholder="Town or city" required>
        </div>
      </div>
    </div>
  </div>

  <!-- Step 2: Rental Info -->
  <div class="form-step">
    <div class="step-header">
      <h3>Rental Info</h3>
      <span>Step 2 of 4</span>
      <p>Please provide your rental details</p>
    </div>

    <div class="billing-grid">
      <div class="left-column">
        <div class="form-group">
          <label for="pickup_date">Pick-Up Date</label>
          <input type="date" name="pickup_date" id="pickup_date" required>
        </div>
        <div class="form-group">
          <label for="pickup_time">Pick-Up Time</label>
          <input type="time" name="pickup_time" id="pickup_time" required>
        </div>
        <div class="form-group">
          <label for="dropoff_time">Drop-Off Time</label>
          <input type="time" name="dropoff_time" id="dropoff_time" required>
        </div>
      </div>
      <div class="right-column">
        <div class="form-group">
          <label for="dropoff_city">Drop-Off Location</label>
          <input type="text" name="dropoff_city" id="dropoff_city" required>
        </div>
        <div class="form-group">
          <label for="dropoff_date">Drop-Off Date</label>
          <input type="date" name="dropoff_date" id="dropoff_date" required>
        </div>
      </div>
    </div>
  </div>

  <!-- Step 3: Payment -->
  <div class="form-step">
    <div class="step-header">
      <h3>Payment Method</h3>
      <span>Step 3 of 4</span>
      <p>Please select your payment method</p>
    </div>

    <div class="billing-grid payment-layout">
      <div class="left-column">
        <label><input type="radio" name="payment_method" value="creditcard" required> Credit Card</label>
        <label><input type="radio" name="payment_method" value="paypal"> PayPal</label>
        <label><input type="radio" name="payment_method" value="bitcoin"> Bitcoin</label>
      </div>
    </div>
  </div>

  <!-- Step 4: Confirmation -->
  <div class="form-step">
    <div class="step-header">
      <h3>Confirmation</h3>
      <span>Step 4 of 4</span>
      <p>Confirm your agreement and place the order</p>
    </div>

    <div class="billing-grid">
      <div class="left-column">
        <label><input type="checkbox" required> I agree with sending me marketing and newsletter emails.</label>
        <label><input type="checkbox" required> I agree with your terms and conditions and privacy policy.</label>

        <button type="submit" name="book">Rent Now</button>
      </div>
    </div>
  </div>
</form>




<?php
// Handle booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book'])) {

    // Session is assumed to be started already in header.php
    $customer_id = $_SESSION['customer_id'] ?? 1; // Replace with real session logic

    // Check for required fields
    if (
        empty($_POST['car_id']) ||
        empty($_POST['pickup_date']) ||
        empty($_POST['pickup_time']) ||
        empty($_POST['dropoff_city']) ||
        empty($_POST['dropoff_date']) ||
        empty($_POST['dropoff_time'])
    ) {
        echo "<div class='error'>Vul alle verplichte velden in.</div>";
        exit;
    }

    // Prepare and execute insert
    try {
        $stmt = $conn->prepare("INSERT INTO bookings (
            Customer_ID, Cars_ID, PickupCity, PickupDate, PickupTime, DropoffCity, DropoffDate, DropoffTime
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $customer_id,
            $_POST['car_id'],
            'Rotterdam', 
            $_POST['pickup_date'],
            $_POST['pickup_time'],
            $_POST['dropoff_city'],
            $_POST['dropoff_date'],
            $_POST['dropoff_time']
        ]);

        echo "<div class='success'>Boeking  succesvol! U  hebt  betaalt  met " . htmlspecialchars($_POST['payment_method']).  ' ✔' . ".</div>";
    } catch (PDOException $e) {
        echo "<div class='error'>Er is een fout opgetreden bij het boeken: " . $e->getMessage() . "</div>";
    }
}
?>

<?php require "../includes/footer.php"; ?>


