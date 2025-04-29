<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    
    // Отправка email (пример)
    $to = "your@email.com";
    $subject = "Новое сообщение от $name";
    mail($to, $subject, $message, "From: $email");
    
    echo "Сообщение отправлено!";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Контакты</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
    <h1>Свяжитесь с нами</h1>
    <form method="POST" action="">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea id="message" name="message" required><?= htmlspecialchars($message ?? '') ?></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Отправить</button>
        </form>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>