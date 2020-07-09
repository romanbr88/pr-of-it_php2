<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Главная</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Главная</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/articles">Все новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin">Админка</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <?php foreach ($this->articles as $article): ?>
        <div class="jumbotron">
            <h1><?= $article->title ?></h1>
            <div class="row">
                <div class="col-4">
                    <?php if (!is_null($article->author)) : ?>
                        Автор: <?= $article->author->name ?>
                    <?php endif; ?>
                </div>
                <div class="col-6"><?= $article->date ?></div>
            </div>
            <p class="lead"></p>
            <a class="btn btn-lg btn-primary" href="/article/?id=<?= $article->id ?>" role="button">Открыть</a>
        </div>
    <?php endforeach; ?>
</main>
<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted"><?= $this->getTimer() ?></span>
    </div>
</footer>
</body>
</html>