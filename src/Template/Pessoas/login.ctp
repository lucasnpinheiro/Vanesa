<div class="single-inner-padding text-center">
    <h3 class="font-header no-m-t">Faça login na sua conta</h3>

    <div class="dots-divider m-t-20 center-block"><span class="icon-flickr4"></span></div>

    <?= $this->Form->create(null, ['url' => '/pessoas/login']) ?>
    <div class="form-group form-input-group m-t-30 m-b-5">
        <input type="text" class="form-control input-lg font-14" autofocus="autofocus" placeholder="Usuario" name="username">
        <input type="password" class="form-control input-lg font-14" placeholder="Senha" name="senha">
    </div>


    <button type="submit" class="btn btn-main btn-lg btn-block font-14 m-t-30 animsition-link">Logar</button>
    <?= $this->Form->end() ?>
</div>