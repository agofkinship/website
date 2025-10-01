<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">MySite</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
      aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="/guides/guide-landing.php">Guides</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

        <?php $userId = checklogin(); ?>
        <?php if ($userId): ?>
          <li class="nav-item"><a class="nav-link" href="/dashboard/index.php">Dashboard</a></li>
          <li class="nav-item">
            <form method="POST" action="/accounts/logout.php" class="d-inline">
              <button type="submit" class="btn btn-link nav-link">Logout</button>
            </form>
          </li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/accounts/register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="/accounts/login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>