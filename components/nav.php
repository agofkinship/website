<?php require __DIR__."/../accounts/auth.php"; ?>

  <nav>
    <ul class="nav-links">  
      <?php $userId = checklogin();
      if ($userId): ?>
        <form method="POST" action="/accounts/logout.php">
        <button type="submit">Logout</button>
        </form>
        <?php else: ?>
          <a href="/accounts/login.php"><button>Login</button></a>
          <?php endif; ?>
      <?php if (checklogin()): ?>
        <li><a href="/../guides/submit.php">Submit Guide</a></li>
        <?php endif; ?>
      <li><a href="/index.php">Home</a></li>
      <li><a href="/about.php">About</a></li>
      <li><a href="/guides/guide-landing.php">Guides</a></li>
      <li><a href="/#">Events</a></li>
      <li><a href="/#">Contact</a></li>
    
    </ul>
    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
