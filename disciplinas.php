<?php
require_once('conex.php');
include('protect.php');
include("pesquisar_disc.php");


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/tabela.css" />
    <title>Disciplinas</title>
</head>
<body>
    <nav class="navbar"></nav>
    
    <main class="container">
        <h1>Lista de Disciplinas</h1>
        
        <form method="POST" class="search-form">
            <input type="text" name="buscar_disc" placeholder="Pesquisar por nome ou disciplina" 
                   value="<?= htmlspecialchars($buscar_disc, ENT_QUOTES, 'UTF-8') ?>">
            <button type="submit" class="btn-buscar_disc">Buscar</button>
        </form>
        
        <div class="table-responsive">
            <table class="tabela-dados">
                <thead>
                    <tr>

                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($disciplinas) > 0): ?>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <tr>
                                <td><?= htmlspecialchars($disciplina['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="sem-dados">Nenhuma disciplina encontrada</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="index.php">Voltar</a>
    </main>

    <footer class="footer"></footer>

    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/footer.js"></script>
</body>
</html>