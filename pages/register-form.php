<?php require "includes/header.php" ?>
<main>
    <form action="/register-handler" method="post" class="account-form">
        <h2>Maak een account aan</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message'] ?>
            </div>
            <?php session_destroy(); ?>
        <?php endif; ?>
        <label for="email">Uw e-mail</label>
        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>" required autofocus>
        <label for="FirstName">Voornaam</label>
        <input type="text" name="FirstName" id="FirstName" placeholder="Uw voornaam" required>
        <label for="LastName">Achternaam</label>
        <input type="text" name="LastName" id="LastName" placeholder="Uw achternaam" required>
        <label for="password">Uw wachtwoord</label>
        <input type="password" name="password" id="password" placeholder="Uw wachtwoord" required>
        <label for="confirm-password">Herhaal wachtwoord</label>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Uw wachtwoord" required>
        <input type="submit" value="Maak account aan" class="button-primary">
    </form>
</main>

<?php require "includes/footer.php" ?>
