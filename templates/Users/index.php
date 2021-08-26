<?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button']) ?>
<h2><?= __('Users') ?></h2>
<table class="index">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Full Name</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->first_name) ?> <?= h($user->last_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete user {0}?', $user->username)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
