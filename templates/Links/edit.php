<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Link $link
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $link->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $link->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Links'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="links form content">
            <?= $this->Form->create($link) ?>
            <fieldset>
                <legend><?= __('Edit Link') ?></legend>
                <?php
                    echo $this->Form->control('url');
                    echo $this->Form->control('short_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
