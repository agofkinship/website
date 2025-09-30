<?php 
require __DIR__ . "/../accounts/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="../style.css">
    <title>Guides by Kinship</title>
</head>
<body>

<?php include __DIR__ . '/../components/nav.php'; ?>

    <div class="guides-landing">
  <h1 class="header-text">Kinship Guides</h1>
  <p class="sub-header-text">Welcome to our library of guides. Choose a topic below to get started!</p>
  
  <div class="guides-grid">
    <div class="guide-card">
      <img src="#" alt="Legendary Items">
      <h2>Legendary Items</h2>
      <p>Learn how the LI system works, reforging, and traceries.</p>
      <a href="legendary-items/index.php" class="btn">Read More</a>
    </div>
    
    <div class="guide-card">
      <img src="#" alt="Crafting">
      <h2>Crafting</h2>
      <p>All about professions, resources, and how to maximize crafting.</p>
      <a href="#" class="btn">Read More</a>
    </div>
    
    <div class="guide-card">
      <img src="#" alt="Leveling">
      <h2>Leveling</h2>
      <p>Tips and tricks for getting your character to cap at your own pace.</p>
      <a href="#" class="btn">Read More</a>
    </div>

    <div class="guide-card">
        <img src="#" alt="Home decor">
        <h2>Home Decoration</h2>
        <p>Home Decorations and Where to Find Them</p>
        <a href="#" class="btn">Read More</a>
    </div>
  </div>
</div>

<script src="../script.js"></script>

</body>
</html>