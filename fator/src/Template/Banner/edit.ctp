<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banner $banner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Ações') ?></li>
        <li><?php echo $this->Form->postLink(
                    __('Delete'), 
                    ['action' => 'delete', $banner->id], 
                    ['confirm' => __('Excluir Banner #{0}?', $banner->id)]
            )
            ?></li>
        <li><?php echo $this->Html->link(__('Listagem'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="banner form large-9 medium-8 columns content">
    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="/fator/fator/banner/edit/<?php echo $banner->id; ?>">
    <fieldset>
        <legend><?php echo __('Adicionar') ?></legend>
        <div class="input text required">
            <label for="arquivo">Título</label>
            <input type="text" name="titulo" required="required" maxlength="255" id="titulo" value="<?php echo $banner->titulo; ?>">
        </div>
        <div class="input text required">
            <label for="arquivo">Banner</label>
            <img src="<?php echo WWW_ROOT . 'uploads' . DS . $banner->arquivo; ?>" width="100" height="150"/>
        </div>
        <div class="input text required">
            <label for="arquivo">Arquivo</label>
            <input type="file" name="arquivo" required="required" maxlength="255" id="arquivo">
        </div>
    </fieldset>
    <?php echo $this->Form->button(__('Editar')) ?>
    </form>
</div>
