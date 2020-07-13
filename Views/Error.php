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
    <?php if (count($this->errors) > 0) : ?>
    <?php foreach ($this->errors->getErrors() as $error) : ?>
    <div class="alert alert-danger"><?= $error->getMessage() ?></div>
    <?php endforeach; ?>
    <?php endif; ?>
</main>
</body>
</html>