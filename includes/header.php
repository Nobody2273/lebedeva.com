<?php
$menuItems = [
    'Главная' => '/index.php',
    'Мерч' => '/pages/merch.php',
    'Фотографии' => '/pages/photo.php'
];
?>
<header>
<div class="div_logo"><img class="logo" src="/assets/images/logo.png"></a></div>
    <nav>
    <ul class="menu-list">
            <?php foreach ($menuItems as $title => $url): ?>
                <li>
                    <a href="<?= $url ?>" <?= $_SERVER['REQUEST_URI'] == $url ? 'class="active"' : '' ?>>
                        <?= $title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
