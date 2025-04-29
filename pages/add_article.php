<?php
include '../includes/db.php';
// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $title = pg_escape_string($_POST['title']);
   $content = pg_escape_string($_POST['content']);
  
   $result = pg_query_params(
       $conn,
       "INSERT INTO articles (title, content) VALUES ($1, $2)",
       [$title, $content]
   );
  
   if ($result) {
       header("Location: /articles.php");
       exit;
   } else {
       echo "Ошибка: " . pg_last_error($conn);
   }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление статьи</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
    <div class="article_main" style="margin-left: 30px; width: 100%; display: flex; justify-content: center;">
        <div class="article-form-container">
                <div class="form-header">
                    <h1>Добавить новую статью</h1>
                </div>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="title" class="form-label">Заголовок:</label>
                        <input type="text" id="title" name="title" required class="form-input">
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">Содержание:</label>
                        <textarea id="content" name="content" required class="form-input form-textarea"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Опубликовать статью</button>
                </form>
            </div> 
    </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>