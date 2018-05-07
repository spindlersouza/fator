<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banner $banner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Ações') ?></li>
        <li><?php echo $this->Html->link(__('Editar Banner'), ['action' => 'edit', $banner->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Apagar Banner'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('Listagem'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('Novo Banner'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="banner view large-9 medium-8 columns content">
    <h3><?php echo h($banner->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Titulo') ?></th>
            <td><?php echo h($banner->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Arquivo') ?></th>
            <td><img src="<?php echo WWW_ROOT . 'uploads' . DS . $banner->arquivo; ?>" width="100" height="150"/></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $this->Number->format($banner->id) ?></td>
        </tr>
    </table>
</div>
