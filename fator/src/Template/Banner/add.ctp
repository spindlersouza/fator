<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Ações') ?></li>
        <li><?php echo $this->Html->link(__('Listagem'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="banner form large-9 medium-8 columns content">
    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="/fator/fator/banner/add">
    <fieldset>
        <legend><?php echo __('Adicionar') ?></legend>
        <?php echo $this->Form->control('titulo'); ?>
        <div class="input text required">
            <label for="arquivo">Arquivo</label>
            <input type="file" name="arquivo" required="required" maxlength="255" id="arquivo" value="0">
        </div>
    </fieldset>
    <?php echo $this->Form->button(__('Cadastrar')) ?>
    </form>
</div>
