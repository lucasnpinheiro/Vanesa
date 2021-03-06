<!-- Start top Navigation -->
<div class="top-navigation">
    <div class="container">
        <div class="top-navigation-inner">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="topNavbarCollapse">
                <ul class="nav navbar-nav magic-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Parâmetros</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">
                            <li><?php echo $this->Html->link('Configurações', ['controller' => 'Parametros', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Usuários', ['controller' => 'Usuarios', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Empresas', ['controller' => 'Empresas', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">
                            <li><?php echo $this->Html->link('Clientes', ['controller' => 'Clientes', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Fornecedores', ['controller' => 'Fornecedores', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Funcionários', ['controller' => 'Funcionarios', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Operadores de Caixas', ['controller' => 'OperadoresCaixas', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Vendedores', ['controller' => 'Vendedores', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estoques</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">

                            <li><?php echo $this->Html->link('Grupos Estoques', ['controller' => 'GruposEstoques', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Produtos', ['controller' => 'Produtos', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Requisições', ['controller' => 'Requisicoes', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Relatórios', ['controller' => 'Produtos', 'action' => 'relatorios'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">

                            <li><?php echo $this->Html->link('Novo Pedido', ['controller' => 'Pedidos', 'action' => 'add'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Em aberto', ['controller' => 'Pedidos', 'action' => 'index', '?' => ['status' => 0]], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Recebido', ['controller' => 'Pedidos', 'action' => 'index', '?' => ['status' => 1]], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Cancelado', ['controller' => 'Pedidos', 'action' => 'index', '?' => ['status' => 2]], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Relatórios', ['controller' => 'Pedidos', 'action' => 'relatorios'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Financeiro</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">
                            <li><?php echo $this->Html->link('A Pagar', ['controller' => 'Apagar', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Funcionários', ['controller' => 'Pedidos', 'action' => 'funcionarios'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                            <li><?php echo $this->Html->link('Relatórios', ['controller' => 'Apagar', 'action' => 'relatorios'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Caixa</a>
                        <ul class="dropdown-menu dropdown-animated fade-effect">
                            <li><?php echo $this->Html->link('Caixas Diários', ['controller' => 'CaixasDiarios', 'action' => 'index'], ['class' => 'animsition-link', 'icon' => false]); ?></li>
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