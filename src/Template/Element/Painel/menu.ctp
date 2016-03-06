<!-- Start top Navigation -->
<div class="top-navigation">
    <div class="container">
        <div class="top-navigation-inner">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="topNavbarCollapse">
                <ul class="nav navbar-nav magic-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Parametros</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">
                            <li><?php echo $this->Html->link('Configurações', ['controller' => 'Paramentros', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Usuários', ['controller' => 'Pessoas', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Empresas', ['controller' => 'Pessoas', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">
                            <li><?php echo $this->Html->link('Grupos', ['controller' => 'Grupos', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Grupos Estoques', ['controller' => 'GruposEstoques', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Produtos', ['controller' => 'Produtos', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php echo $this->Html->link('Sair', '/sair', ['class' => 'animsition-link', 'icon' => false]); ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container -->
</div>
<!-- End top Navigation -->