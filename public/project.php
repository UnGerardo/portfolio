<?php
  declare(strict_types = 1);
  require 'connect.php';

  $projectId = $_GET['id'];
  $query = 'SELECT * FROM projects WHERE id=' . $projectId;
  $projectQuery = $connection->query($query);
  $projectInfo = mysqli_fetch_array($projectQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/styles.css">
  <title><?php echo $projectInfo['projectName'] ?></title>
</head>
<body>
  <section>
    <a href="<?php echo $projectInfo['projectLink'] ?>">
      <h2><?php echo $projectInfo['projectName'] ?></h2>
    </a>
    <p><?php echo $projectInfo['projectDescription'] ?></p>
  </section>
  <section id="comments">
    <form id="new-comment" method="POST" action="#">
      <label for="new-comment">New Comment:</label>
      <input type="text" id="comment-input" name="new-comment" required>
      <button type="submit">Submit</button>
    </form>
  </section>
  <?php include 'footer.php' ?>
</body>
</html>