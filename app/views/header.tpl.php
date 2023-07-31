<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $viewVars['title'] ?></title>
    <link rel="stylesheet" href="<?= $_SERVER['BASE_URI']?>/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <a class="logo" href="<?= $_SERVER['BASE_URI'] ?>">Pokédex</a>
            <nav>
                <ul>
                    <li><a href="<?= $_SERVER['BASE_URI'] ?>">Liste</a></li>
                    <li><a href="<?= $_SERVER['BASE_URI']. '/types' ?>">Types</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
