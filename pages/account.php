<?php require "includes/header.php" ?>


<?php



require_once "database/connection.php";


if (!isset($_SESSION['id'])) {
    header("Location: login-form.php");
    exit;
}


$account_id = $_SESSION['id'];

$get_account = $conn->prepare("SELECT * FROM account WHERE Account_ID = :id");
$get_account->bindParam(":id", $account_id);
$get_account->execute();
$account = $get_account->fetch(PDO::FETCH_ASSOC);

if (!$account) {
    echo "Account niet gevonden.";
    exit;
}
?>


<main>
    <h2>Welkom terug, <?= htmlspecialchars($account['FirstName']) ?>!</h2>

    <div class="account-info">
        <p><strong>Voornaam:</strong> <?= htmlspecialchars($account['FirstName']) ?></p>
        <p><strong>Achternaam:</strong> <?= htmlspecialchars($account['LastName']) ?></p>
        <p><strong>E-mail:</strong> <?= htmlspecialchars($account['Email']) ?></p>
    </div>

</main>
<?php require "includes/footer.php" ?>