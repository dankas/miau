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
        <h1>Bem-vindo, <?php echo $users->username; ?></h1>
        <div style="text-align: right;">
            <form action="home.php?action=exportJson" method="post" style="display: inline;">
            <button type="submit">Exportar Dados</button>
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