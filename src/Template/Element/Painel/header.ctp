
<!-- Start Header -->
<header class="header-top navbar header-dark">
    <div class="top-bar">
        <div class="container">
            <div class="main-search">
                <div class="input-wrap">
                    <input class="form-control" type="text" placeholder="Search Here...">
                    <a href="blank.html#"><i class="icon-search"></i></a>
                </div>
                <span class="close-search search-toggle">Cancel</span>
            </div>
        </div>
    </div><!-- /.container -->

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle top-menu-toggle collapsed" data-toggle="collapse" data-target="#topNavbarCollapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand text-upper" href="index.html">Vanessa Sorvetes</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="headerNavbarCollapse">

            <ul class="nav navbar-nav navbar-right">
                <li class="user-profile dropdown">
                    <a href="blank.html#" class="clearfix dropdown-toggle" data-toggle="dropdown">
                        <div class="user-name"><?php echo $this->request->session()->read('Auth.User.nome'); ?> <span class="caret m-l-5"></span></div>
                    </a>
                    <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                        <li>
                            <?php echo $this->Html->link('Perfil', ['controller' => 'Pessoas', 'action' => 'edit', $this->request->session()->read('Auth.User.id')], ['icon' => false]) ?>
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