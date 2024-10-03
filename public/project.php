<?php
  declare(strict_types = 1);
  require 'connect.php';

  $projectId = $_GET['id'] ?? $_POST['projectId'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formStartTime = $_POST['formStartTime'];
    $currentTime = time();
    $timeTaken = $currentTime - $formStartTime;

    if ($timeTaken >= 3 && empty($_POST['name'])) {
      $content = htmlspecialchars($_POST['new-comment'] ?? '');

      $projectId = $connection->real_escape_string($projectId);
      $content = $connection->real_escape_string($content);

      $query = 'INSERT INTO comments (projectId, content) VALUES (' . $projectId . ',\'' . $content . '\')';

      if ($connection->query($query) === FALSE) {
        echo "Error: " . $connection->error;
      }
    }
  }

  $query = 'SELECT * FROM projects WHERE id=' . $projectId;
  $projectQuery = $connection->query($query);
  $projectInfo = mysqli_fetch_array($projectQuery);

  $commentsQuery = 'SELECT * FROM comments WHERE projectId=' . $projectId;
  $comments = $connection->query($commentsQuery);
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
      <input type="hidden" name="projectId" value="<?php echo $projectInfo['id'] ?>">
      <input type="text" name="name" style="display: none;">
      <input type="hidden" name="formStartTime" value="<?php echo time() ?>">

      <label for="new-comment">New Comment:</label>
      <input type="text" id="comment-input" name="new-comment" required>
      <button type="submit">Submit</button>
    </form>
    <?php while($row = mysqli_fetch_array($comments)): ?>
      <section>
        <p><?php echo $row['content'] ?></p>
        <p><?php echo $row['timestamp'] ?></p>
      </section>
    <?php endwhile; ?>
  </section>
  <?php include 'footer.php' ?>
</body>
</html>