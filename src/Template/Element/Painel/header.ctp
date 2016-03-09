
<!-- Start Header -->
<header class="header-top navbar header-dark">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle top-menu-toggle collapsed" data-toggle="collapse" data-target="#topNavbarCollapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php echo $this->Html->link('Vanessa Sorvetes', '/', ['class' => 'navbar-brand text-upper']); ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="headerNavbarCollapse">

            <ul class="nav navbar-nav navbar-right">
                <li class="user-profile dropdown">
                    <a href="#" class="clearfix dropdown-toggle" data-toggle="dropdown">
                        <div class="user-name"><?php echo $this->request->session()->read('Auth.User.nome'); ?> <span class="caret m-l-5"></span></div>
                    </a>
                    <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                        <li>
                            <?php echo $this->Html->link('Perfil', ['controller' => 'Usuarios', 'action' => 'edit', $this->request->session()->read('Auth.User.id')], ['icon' => false]) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Sair', '/sair', ['icon' => false]) ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</header>
<!-- End Header -->