<nav class="main-nav">
    <div class="logo"><a href="/index.php">MySite</a></div>
    <ul class="nav-links">
        <li><a href="/index.php">Home</a></li>
        <li><a href="/about.php">About</a></li>
        <li><a href="/guides/guide-landing.php">Guides</a></li>
        <li><a href="/#">Events</a></li>
        <li><a href="/#">Contact</a></li>
        <?php $userId = checklogin(); ?>
        <?php if ($userId): ?>
          <li><a href="/dashboard/index.php">Dashboard</a></li>
            <li>
                <form method="POST" action="/accounts/logout.php">
                    <button type="submit">Logout</button>
                </form>
            </li>
        <?php else: ?>
            <li><a href="/accounts/login.php">Login</a></li>
        <?php endif; ?>
    </ul>
    <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>