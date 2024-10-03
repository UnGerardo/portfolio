<?php
  declare(strict_types = 1);
  require 'connect.php';

  $projectName = $_GET['project'];
  $query = 'SELECT * FROM projects WHERE projectName=\'' . $projectName . '\'';
  $projectQuery = $connection->query($query);
  $projectInfo = mysqli_fetch_array($projectQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/styles.css">
  <title><?php echo 'Project Name' ?></title>
</head>
<body>
  <section>
    <a href="<?php echo $projectInfo['projectLink'] ?>">
      <h2><?php echo $projectInfo['projectName'] ?></h2>
    </a>
    <p><?php echo $projectInfo['projectDescription'] ?></p>
  </section>
  <?php include 'footer.php' ?>
</body>
</html>