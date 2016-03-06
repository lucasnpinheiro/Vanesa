<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?= $this->fetch('title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php
        echo $this->Html->css('/css/bootstrap.min.css');
        echo $this->Html->css('/css/icon.css');
        echo $this->Html->css('/css/font-awesome.min.css');
        echo $this->Html->css('/css/app.min.css');
        ?>
    </head>

    <body>

        <!-- wrapper -->
        <div class="wrapper animsition nav-top has-footer full-width-container">
            <?php echo $this->element('Painel/header'); ?>
            <?php echo $this->element('Painel/menu'); ?>

            <!-- Start Main Container -->
            <div class="main-container">
                <div class="container" style="margin-top: 10px;">
                    <div>
                        <?= $this->Flash->render() ?>
                    </div>
                    <?= $this->fetch('content') ?>
                </div><!-- /.container -->
            </div>
            <!-- End Main Container -->

            <!-- Start Footer -->
            <footer class="footer">
                <div class="container">
                    &copy; <?php echo date('Y') ?>. <b>Vanessa Sorvetes</b>
                </div>
            </footer>
            <!-- End Footer -->

        </div>
        <!-- /.wrapper -->
        <?php echo $this->Html->script('/js/jquery-1.11.2.min.js'); ?>
        <?php echo $this->Html->script('/js/bootstrap.min.js'); ?>
        <?php echo $this->Html->script('/js/app.min.js'); ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>