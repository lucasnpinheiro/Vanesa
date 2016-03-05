<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requisicoes'), ['controller' => 'Requisicoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisico'), ['controller' => 'Requisicoes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($produto->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Unidade') ?></th>
            <td><?= h($produto->unidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Nome Atalho') ?></th>
            <td><?= h($produto->nome_atalho) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($produto->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Grupo Estoque Id') ?></th>
            <td><?= $this->Number->format($produto->grupo_estoque_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Peso Baixa Estoque') ?></th>
            <td><?= $this->Number->format($produto->peso_baixa_estoque) ?></td>
        </tr>
        <tr>
            <th><?= __('Desconto Pedido') ?></th>
            <td><?= $this->Number->format($produto->desconto_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade Pedido') ?></th>
            <td><?= $this->Number->format($produto->quantidade_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Compra') ?></th>
            <td><?= $this->Number->format($produto->compra) ?></td>
        </tr>
        <tr>
            <th><?= __('Margem') ?></th>
            <td><?= $this->Number->format($produto->margem) ?></td>
        </tr>
        <tr>
            <th><?= __('Venda') ?></th>
            <td><?= $this->Number->format($produto->venda) ?></td>
        </tr>
        <tr>
            <th><?= __('Promocao') ?></th>
            <td><?= $this->Number->format($produto->promocao) ?></td>
        </tr>
        <tr>
            <th><?= __('Estoque Minimo') ?></th>
            <td><?= $this->Number->format($produto->estoque_minimo) ?></td>
        </tr>
        <tr>
            <th><?= __('Estoque Atual') ?></th>
            <td><?= $this->Number->format($produto->estoque_atual) ?></td>
        </tr>
        <tr>
            <th><?= __('Atalho') ?></th>
            <td><?= $this->Number->format($produto->atalho) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($produto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($produto->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pedidos Itens') ?></h4>
        <?php if (!empty($produto->pedidos_itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pedido Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Valor Venda') ?></th>
                <th><?= __('Quantidade') ?></th>
                <th><?= __('Valor Total') ?></th>
                <th><?= __('Perc Desconto') ?></th>
                <th><?= __('Valor Desconto') ?></th>
                <th><?= __('Valor Liquido') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->pedidos_itens as $pedidosItens): ?>
            <tr>
                <td><?= h($pedidosItens->id) ?></td>
                <td><?= h($pedidosItens->pedido_id) ?></td>
                <td><?= h($pedidosItens->produto_id) ?></td>
                <td><?= h($pedidosItens->valor_venda) ?></td>
                <td><?= h($pedidosItens->quantidade) ?></td>
                <td><?= h($pedidosItens->valor_total) ?></td>
                <td><?= h($pedidosItens->perc_desconto) ?></td>
                <td><?= h($pedidosItens->valor_desconto) ?></td>
                <td><?= h($pedidosItens->valor_liquido) ?></td>
                <td><?= h($pedidosItens->created) ?></td>
                <td><?= h($pedidosItens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PedidosItens', 'action' => 'view', $pedidosItens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PedidosItens', 'action' => 'edit', $pedidosItens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidosItens', 'action' => 'delete', $pedidosItens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosItens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requisicoes') ?></h4>
        <?php if (!empty($produto->requisicoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Numero Documento') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Quantidade') ?></th>
                <th><?= __('Motivo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->requisicoes as $requisicoes): ?>
            <tr>
                <td><?= h($requisicoes->id) ?></td>
                <td><?= h($requisicoes->numero_documento) ?></td>
                <td><?= h($requisicoes->data) ?></td>
                <td><?= h($requisicoes->produto_id) ?></td>
                <td><?= h($requisicoes->tipo) ?></td>
                <td><?= h($requisicoes->quantidade) ?></td>
                <td><?= h($requisicoes->motivo) ?></td>
                <td><?= h($requisicoes->created) ?></td>
                <td><?= h($requisicoes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requisicoes', 'action' => 'view', $requisicoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requisicoes', 'action' => 'edit', $requisicoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requisicoes', 'action' => 'delete', $requisicoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisicoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
