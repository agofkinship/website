<?php 
require __DIR__ . "/accounts/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - A Group of Friends</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="theme.css" />
</head>
<body>

  <?php include __DIR__ .'/components/nav.php'; ?>

  <main class="container mt-4">

    <header class="mb-4">
      <h1 class="header-text">About A Group of Friends</h1>
      <p><em>A Group of Friends</em> is a kinship on the Glamdring server for Lord of the Rings Online. We created it to hang out without feeling pressured to do certain things or behave in a certain way (except being nice, of course).</p>
    </header>

    <section class="card mb-4 p-3 shadow-sm">
      <h2 class="header-text mb-3">Kinship Charter</h2>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">We play our own way, at our own pace, with no pressure to join group events or raids.</li>
        <li class="list-group-item">We are <em>literally</em> a group of friends - nobody owns us, nobody's the boss, everyone's voice matters.</li>
        <li class="list-group-item">We treat each other as friends would: we have fun, respect boundaries, accept our differences, avoid drama and ensure that everyone feels included.</li>
        <li class="list-group-item">We don’t need a rule book for how to behave - common sense and respect for our friends is what guides us.</li>
      </ul>
    </section>

    <section class="card mb-4 p-3 shadow-sm">
      <h2 class="header-text mb-3">How We Behave</h2>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">While "bad words" aren't forbidden, we don’t go overboard, we don’t swear <em>at</em> people, and we never use racist or derogatory slurs.</li>
        <li class="list-group-item">Politics, religion, and other sensitive topics aren’t forbidden either, but we keep it chill and back off before it can turn into an argument.</li>
        <li class="list-group-item">The bottom line: we are guided by common sense and respect for our friends.</li>
      </ul>
    </section>

    <section class="card mb-4 p-3 shadow-sm">
      <h2 class="header-text mb-3">For Those Who Want to Contribute</h2>

      <div class="mb-3">
        <h3 class="header-text">Helping Out</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Any member is welcome to pitch in - no title needed.</li>
          <li class="list-group-item">If a task already has an officer assigned, they’ll coordinate anyone who wants to help.</li>
          <li class="list-group-item">We collaborate, so no silos!</li>
        </ul>
      </div>

      <div class="mb-3">
        <h3 class="header-text">Officers</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Officers are "friendly helpers" and not police or order-givers.</li>
          <li class="list-group-item">If the officer has a speciality (e.g., Events), their role is to coordinate those who want to participate or contribute.</li>
          <li class="list-group-item">We’ll cap officers at 10 people, or one-third of the kinship (whichever is larger).</li>
          <li class="list-group-item">Inactive officers will be rotated out so active members can have a turn.</li>
        </ul>
      </div>

      <div>
        <h3 class="header-text">Committee</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Instead of a single leader, we have a committee of at least three people with equal authority.</li>
          <li class="list-group-item">The in-game kin leader and Discord server owners are just admin functions and hold no extra authority. These roles may be rotated among committee members.</li>
          <li class="list-group-item">Those with a history of hostile, selfish and/or manipulative behaviours are not eligible to join the committee.</li>
          <li class="list-group-item">Committee members have sworn to uphold the charter, and deliberately acting against it is grounds for their dismissal from the committee.</li>
        </ul>
      </div>
    </section>

    <button id="back-to-top" class="btn btn-secondary">Back to Top</button>

  </main>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
    // Back to Top functionality
    const backBtn = document.getElementById('back-to-top');
    backBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  </script>
</body>
</html>