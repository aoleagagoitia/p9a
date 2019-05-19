<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css"/><!-- El base_url está en parameters.php -->
</head>
<body>
<div id="container">

    <!-- CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="<?= base_url ?>assets/img/camiseta_empresa.jpg" alt="Camiseta Logo"/>
            <a href="<?= base_url ?>">
                Tienda de camisetas
            </a>
        </div>
    </header>

    <!-- MENU -->
    <?php $categorias = Utils::showCategorias(); ?><!--Me devuelve un array de objetos-->
    <nav id="menu">
        <ul>
            <li>
                <a href="<?= base_url ?>">Inicio</a>
            </li>

            <?php while ($cat = $categorias->fetch_object()): ?><!--Recorre y saca objetos de todas las categorías-->
            <li>
                <a href="<?= base_url ?>categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
            </li>
            <?php endwhile; ?>
        </ul>
    </nav>
    <div id="content">