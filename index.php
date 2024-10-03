<?php
  declare(strict_types = 1);
  require 'connect.php';

  $projectsQuery = 'SELECT * FROM projects';
  $projects = $connection->query($projectsQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Gerardo's Portfolio</title>
</head>
<body>
  <h1>Gerardo's Portfolio</h1>
  <main>
    <?php while($row = mysqli_fetch_array($projects)): ?>
      <section>
        <a href="/project.php?project=<?php echo $row['projectName'] ?>"><h3><?php echo $row['projectName'] ?></h3></a>
        <p><?php echo $row['projectDescription'] ?></p>
      </section>
    <?php endwhile; ?>
  </main>
  <?php include 'footer.php' ?>
</body>
</html>