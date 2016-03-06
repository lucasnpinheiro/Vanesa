<div class="col-sm-4">
    <div class="m-t-10 m-u-2"><?= $this->Paginator->counter() ?></div>
</div><!-- /.col -->
<div class="col-sm-8 m-t-15-xs">
    <nav>
        <ul class="pagination pagination-split no-m pull-right no-pull-xs">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </nav>
</div><!-- /.col -->
