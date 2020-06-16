<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
</head>
<body>
<?php foreach ($data as $datum): ?>
    <div>
        <h1><a href="/article.php?id=<?= $datum->id ?>"><?= $datum->title ?></a></h1>
        <p><?= $datum->date ?></p>
        <p><?= $datum->content ?></p>
    </div>
<?php endforeach; ?>
</body>
</html>