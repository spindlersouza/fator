<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banner[]|\Cake\Collection\CollectionInterface $banner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Ações') ?></li>
        <li><?php echo $this->Html->link(__('Novo Banner'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="banner index large-9 medium-8 columns content">
    <h3><?php echo __('Banner') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?php echo $this->Paginator->sort('id') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('arquivo') ?></th>
                <th scope="col" class="actions"><?php echo __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($banner as $banner): ?>
            <tr>
                <td><?php echo $this->Number->format($banner->id) ?></td>
                <td><?php echo h($banner->titulo) ?></td>
                <td><img src="<?php echo WWW_ROOT . 'uploads' . DS . $banner->arquivo; ?>" width="100" height="150"/>
</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Visualizar'), ['action' => 'view', $banner->id]) ?>
                    <?php echo $this->Html->link(__('Editar'), ['action' => 'edit', $banner->id]) ?>
                    <?php echo $this->Form->postLink(__('Apagar'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('Primeiro')) ?>
            <?php echo $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(__('Próximo') . ' >') ?>
            <?php echo $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?php echo $this->Paginator->counter(['format' => __('Página {{page}}/{{pages}}, registros {{current}}/{{count}} ')]) ?></p>
    </div>
</div>
