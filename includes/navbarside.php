<?PHP require_once "database/connection.php";?>

<nav class="sidebar">
  <div class="All-forms">
      
    <!-- TYPE Section -->
    <div class="type">
      <h3>TYPE</h3>
      <form>
        <?php
                $countStmt = $conn->query("SELECT COUNT(*) FROM cars WHERE type = 'Sport'");
                $count = $countStmt->fetchColumn();;
     ?>
        <label class="checkbox-item">
          <input type="checkbox" name="type1" value="Sport" />
          <span>Sport <span class="count">( <?php echo  $count; ?> )</span>
        </label>

        <label class="checkbox-item">
          <input type="checkbox" name="type2" value="SUV" />
          <span>SUV <span class="count">(22)</span></span>
        </label>

        <label class="checkbox-item">
          <input type="checkbox" name="type3" value="Sedan" />
          <span>Sedan <span class="count">(12)</span></span>
        </label>

        <label class="checkbox-item">
          <input type="checkbox" name="type4" value="Coupe" />
          <span>Coupe <span class="count">(333)</span></span>
        </label>

        <label class="checkbox-item">
          <input type="checkbox" name="type5" value="Hatchback" />
          <span>Hatchback <span class="count">(33)</span></span>
        </label>

        <label class="checkbox-item">
          <input type="checkbox" name="type6" value="MPV" />
          <span>MPV <span class="count">(33)</span></span>
        </label>

      </form>
    </div>

    <!-- CAPACITY Section -->
    <div class="capacity">
      <h3>CAPACITY</h3>
      <form>
        <label class="checkbox-item">
          <input type="checkbox" name="cap1" value="2Person" />
          <span>2 Person <span class="count">()</span></span>
        </label>
        <label class="checkbox-item">
          <input type="checkbox" name="cap2" value="4Person" />
          <span>4 Person <span class="count">()</span></span>
        </label>
        <label class="checkbox-item">
          <input type="checkbox" name="cap3" value="6Person" />
          <span>6 Person <span class="count">()</span></span>
        </label>
        <label class="checkbox-item">
          <input type="checkbox" name="cap4" value="8Person" />
          <span>8 or More <span class="count">()</span></span>
        </label>
      </form>
    </div>

    <!-- PRICE Section -->
    <div class="price">
      <h3>PRICE</h3>
      <form>
        <input type="range" id="price-range" name="price" min="0" max="100" />
        <label  class="range-label"for="price-range">Max. $100.00</label>
      </form>
    </div>

  </div>
</nav>
