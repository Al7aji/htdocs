<?php
require_once "database/connection.php"; 

// Add debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Force car_id to 2 for testing
$car_id = 2;

// Debug output
echo "<!-- Debug: Car ID = $car_id -->";

// Modify query to show all reviews first for debugging
$reviews_query = $conn->prepare("
    SELECT r.*, c.FirstName, c.LastName 
    FROM reviews r 
    JOIN customer c ON r.Customer_ID = c.Customer_ID 
    WHERE r.Car_ID = ?
");

try {
    $reviews_query->execute([$car_id]);
    $reviews = $reviews_query->fetchAll(PDO::FETCH_ASSOC);  // Add PDO::FETCH_ASSOC to get named array
    
    // Debug output
    echo "<!-- Debug: Number of reviews found = " . count($reviews) . " -->";
    echo "<!-- Debug: SQL query = 'SELECT * FROM reviews WHERE Car_ID = $car_id' -->";
    echo "<!-- Debug: Full review data: ";
    print_r($reviews);
    echo " -->";
    
} catch (PDOException $e) {
    echo "<!-- Debug: Database error: " . $e->getMessage() . " -->";
    $reviews = [];
}
?>

<div class="reviews-container">
    <h3>Customer Reviews</h3>
    <div class="reviews-grid">
        <?php if ($reviews): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-details">
                                <h4><?php echo htmlspecialchars($review['FirstName'] . ' ' . $review['LastName']); ?></h4>
                                <div class="stars stars-<?php echo htmlspecialchars($review['Rating']); ?>"></div>
                            </div>
                        </div>
                        <span class="review-date">
                            <?php echo date('F j, Y', strtotime($review['ReviewDate'])); ?>
                        </span>
                    </div>
                    <p class="review-comment">
                        <?php echo htmlspecialchars($review['Comment']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-reviews">No reviews yet for this car.</p>
        <?php endif; ?>
    </div>
</div>