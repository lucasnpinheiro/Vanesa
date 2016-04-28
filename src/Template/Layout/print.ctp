<?php $this->assign('title', 'Administração'); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?= $this->fetch('title') . ' - ' . $titulo_pagina ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        echo $this->Html->css('/css/bootstrap.min.css', ['media' => 'all']);
        echo $this->Html->css('/css/font-awesome.min.css', ['media' => 'all']);
        echo $this->Html->css('/css/app.min.css', ['media' => 'all']);
        echo $this->Html->css('/css/print.css', ['media' => 'all']);
        ?>
    </head>

    <body>

        <div>
            <?= $this->fetch('content') ?>
        </div>
        <?= $this->fetch('css') ?>
        <script type="text/javascript">
            window.print();
            setTimeout(function () {
                window.location.href = "<?php echo $redirect; ?>";
            }, 3000);

        </script>

    </body>
</html>