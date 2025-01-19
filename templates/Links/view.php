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
            <?= $this->Html->link(__('Edit Link'), ['action' => 'edit', $link->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Link'), ['action' => 'delete', $link->id], ['confirm' => __('Are you sure you want to delete # {0}?', $link->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Links'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Link'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="links view content">
            <h3><?= h($link->short_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Short Id') ?></th>
                    <td><?= h($link->short_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($link->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($link->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($link->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($link->url)); ?>
                </blockquote>
                <strong><?= __('Url') ?></strong>
                <blockquote>
                    <?= $this->Html->link(__($link->short_id), ['action' => 'l', $link->short_id]); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>