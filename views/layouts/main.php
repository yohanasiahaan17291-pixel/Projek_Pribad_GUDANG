<?php
$content = $content ?? '';
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/navbar.php';
echo '<div class="container">'.$content.'</div>';
include __DIR__ . '/../components/footer.php';
?>