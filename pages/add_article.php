<?php
include '../includes/db.php';
// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
