<?php
$conn = pg_connect("host=localhost dbname=lebedeva  user=postgres password=123");
if (!$conn) {
    die("Ошибка подключения: " . pg_last_error());
}
echo "Подключение к PostgreSQL успешно!";
pg_close($conn);
?>
