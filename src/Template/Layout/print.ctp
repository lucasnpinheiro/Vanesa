<?php $this->assign('title', 'Administração'); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?= $this->fetch('title') . ' - ' . $titulo_pagina ?></title>
        <?php
        echo $this->Html->css('/css/bootstrap.min.css', ['media' => 'all']);
        echo $this->Html->css('/css/font-awesome.min.css', ['media' => 'all']);
        echo $this->Html->css('/css/app.min.css', ['media' => 'all']);
        echo $this->Html->css('/css/print.css', ['media' => 'all']);
        ?>
    </head>

    <body style="width: 800px;">

        <div>
            <?= $this->fetch('content') ?>
        </div>
        <script type="text/javascript">
            window.print();
            setTimeout(function () {
                window.location.href = "<?php echo $redirect; ?>";
            }, 3000);

        </script>

    </body>
</html>