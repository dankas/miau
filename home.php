<?php 
require_once 'controllers/homecontroller.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background: #222;
            color: #fff;
            padding-top: 30px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5em;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #333;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background: #444;
        }
        .main-content {
            margin-left: 220px;
            padding: 40px;
        }
    </style>
</head>
<body>
    <?php  include 'partials/sidebarpartial.php';?>
    <div class="main-content">
            <?php if (isset($_GET['message'])): ?>
                <div class="alert" style="background:rgb(56, 179, 107); color: white; padding: 15px; border-radius: 5px;margin-top: 15px;margin-bottom: 15px;">
                <p style="text-align: right;"> <a href="home.php" style="background: white; padding: 5px ; color: white; text-decoration: none;">❌</a></p>
                <p><strong><?php echo $_GET['message']; ?></strong></p>
                </div>
            <?php endif; ?>
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <img src="assets/imgs/<?php echo $user->imgprofile; ?>" alt="Imagem de perfil" style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; margin-right: 20px;">
            <h1 style="margin: 0;">Bem-vindo, <?php echo $user->username; ?></h1>
            <p><strong style="margin: 5px;"> (Telefone: <?php echo $user->telefone; ?>)</strong></p>
        </div>

        <div style="text-align: right; margin-bottom: 20px;">
            <form action="home.php?action=exportJson" method="post" style="display: inline;">
            <button type="submit">Exportar Dados ⤴️</button>
            </form>
        </div>
        <?php
        $section = isset($_GET['section']) ? $_GET['section'] : '';

        switch ($section) {
            case 'perfil':
                include 'partials/perfilpartial.php';
                break;
            case 'consultas':
                include 'partials/consultaspartial.php';
                break;
            default:
                include 'partials/petspartial.php';
                break;
        }
        ?>


    </div>
</body>
</html>