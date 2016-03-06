
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Quantum Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php
        echo $this->Html->css('/css/bootstrap.min.css');
        echo $this->Html->css('/css/icon.css');
        echo $this->Html->css('/css/font-awesome.min.css');
        echo $this->Html->css('/css/animsition.min.css');
        echo $this->Html->css('/css/app.css');
        ?>       
    </head>

    <body class="bg-dark3">

        <!-- wrapper -->
        <div class="wrapper">
            <div class="container text-center">
                <h1 class="font-header login-header text-upper">Vanessa<span class="text-main">Sorvetes</span></h1>
                <div class="single-wrap">
                    <?= $this->Flash->render() ?>
                </div>
                <div class="single-wrap">
                    <?= $this->fetch('content') ?>
                </div><!-- /.login-wrap -->
            </div><!-- /.container -->
        </div>
        <!-- /.wrapper -->

        <?php
        echo $this->Html->script('/js/jquery-1.11.2.min.js');
        echo $this->Html->script('/js/bootstrap.min.js');
        ?>

    </body>
</html>