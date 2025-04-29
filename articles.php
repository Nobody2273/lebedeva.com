<?php
include 'includes/db.php';
$result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");

$articles_html = ''; 

if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $articles_html .= "
        <div class='article-card'>
            <h2 class='article-title'>".htmlspecialchars($row['title'])."</h2>
            <div class='article-content'>
                ".nl2br(htmlspecialchars($row['content']))."
            </div>
            <div class='article-meta'>
                Опубликовано: ".date('d.m.Y H:i', strtotime($row['created_at']))."
            </div>
        </div>";
    }
} else {
    $articles_html = "<div class='no-articles'>Статей пока нет</div>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Cтатьи</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
    <div class="article-form-container">
            <h1>Cтатьи</h1>
            <?php echo $articles_html; ?>
            
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

