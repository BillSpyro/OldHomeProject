<header>
    <nav>
        <ul>
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
            <li><a href="../Accounts/logout.php">Log Out</a></li>
          <?php else: ?>
            <li><a href="../Accounts/registerPage.php">Register</a></li>
            <li><a href="../Accounts/loginPage.php">Log In</a></li>
          <?php endif ?>
        </ul>
    </nav>
</header>
