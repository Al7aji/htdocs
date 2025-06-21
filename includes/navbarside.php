<?PHP require_once "database/connection.php";

$sportCount = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'Sport'")->fetchColumn();
$suvCount = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'SUV'")->fetchColumn();
$sedanCount = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'Sedan'")->fetchColumn();
$CoupeCount = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'Coupe'")->fetchColumn();
$HatchbackCount = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'Hatchback'")->fetchColumn();
$MPVCount = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'MPV'")->fetchColumn();
?>

<nav class="sidebar">
  <div class="All-forms">
    <!-- TYPE Section -->
    <div class="type">
      <h3>TYPE</h3>
      <div class="filter-form">
          <label class="checkbox-item">
            <input type="checkbox" class="filter-type" data-filter="type"   value="sport">
            <span>Sport <span class="count " >(<?php echo $sportCount; ?>)</span>
          </label>

          <label class="checkbox-item">
              <input type="checkbox"  class="filter-type" data-filter="type" value="SUV" >    
              <span>SUV <span class="count">(<?php echo $suvCount; ?>)</span>
          </label>

          <label class="checkbox-item">
            <input type="checkbox" class="filter-type" data-filter="type" value="Sedan" >
            <span>Sedan <span class="count">(<?php echo $sedanCount; ?>)</span>
          </label>

          <label class="checkbox-item">
            <input type="checkbox" class="filter-type" data-filter="type" value="Coupe" />
            <span>Coupe <span class="count">(<?php echo $CoupeCount; ?>)</span>
          </label>

          <label class="checkbox-item">
            <input type="checkbox" class="filter-type" data-filter="type" value="Hatchback" />
            <span>Hatchback <span class="count">(<?php echo $HatchbackCount; ?>)</span>
          </label>

          <label class="checkbox-item">
            <input type="checkbox" class="filter-type" data-filter="type" value="MPV" />
            <span>MPV <span class="count">(<?php echo $MPVCount; ?>)</span>
          </label>
        </div>
      
    </div>

    <!-- CAPACITY Section -->
    <div class="capacity">
      <h3>CAPACITY</h3>
      <div class="filter-form">
        <label class="checkbox-item">
          <input type="checkbox"  class="filter-type"  data-filter="capacity" value="2" />
          <span>2 Person <span class="count">()</span>
        </label>
        <label class="checkbox-item">
          <input type="checkbox" class="filter-type"  data-filter="capacity" value="4" />
          <span>4 Person <span class="count">()</span>
        </label>
        <label class="checkbox-item">
          <input type="checkbox" class="filter-type"  data-filter="capacity" value="6" />
          <span>6 Person <span class="count">()</span>
        </label>
        <label class="checkbox-item">
          <input type="checkbox"  class="filter-type" data-filter="capacity"  value="8" />
          <span>8 or More <span class="count">()</span>
        </label>
      </div>
    </div>

    <!-- PRICE Section -->
    <div class="price">
      <h3>PRICE</h3>
      <form>
        <input type="range" id="price-range" name="price" min="72" max="150" value="150" />
        <label  class="range-label"for="price-range"></label>
      </form>
    </div>
       
  </div>
<script src="assets/javascript/filter.js"></script>
</nav>
