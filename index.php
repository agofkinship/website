<?php
require __DIR__ . "/accounts/auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A Group of Friends - A Kinship for Lord of the Rings Online</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="theme.css">
</head>

<body>

  <?php include __DIR__ . '/components/nav.php'; ?>

  <!-- Banner -->
  <header class="text-center">
    <img src="images/a-group-of-friends-banner.jpg" alt="A Group of Friends" class="img-fluid main-image my-4">
  </header>

  <main class="container mt-4">
    <section class="intro mb-5">
      <p>A Group of Friends is a kinship on the Glamdring server for Lord of the Rings Online.</p>
      <p>We created it as a place to hang out without feeling pressured to do certain things or behave in a certain way.
        We function much like a group of friends in real life!</p>
    </section>

    <section class="unique mb-5">
      <h2 class="header-text mb-3">What Makes Us Unique</h2>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">We play our own way, at our own pace, with no pressure to join group events or
          raids.</li>
        <li class="list-group-item">We don't have a leader - instead a committee shares the responsibility of keeping
          things running.</li>
        <li class="list-group-item">We treat each other as real friends would: we have fun, respect boundaries, accept
          our differences, avoid drama and ensure that everyone feels included.</li>
        <li class="list-group-item">Everyone is welcome to chip in and contribute to the kinship.</li>
      </ul>
    </section>

    <section class="discord text-center mb-5 p-4 rounded">
      <a href="https://discord.agof.us" target="_blank">
        <img src="images/discord-logo.png" alt="Join us on Discord" class="linked-image mb-2">
      </a>
      <p class="mb-0">Join us on Discord! Guests are welcome and there is no obligation to join the kinship. Feel free
        to chat or just look around!</p>
    </section>

    <button id="back-to-top" class="btn btn-secondary">Back to Top</button>
  </main>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>