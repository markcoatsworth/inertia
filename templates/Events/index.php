<table class="eventActions">
    <tr>
        <td class="add">
            <?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add'], ['class' => 'button']) ?>
        </td>
        <td class="sortYear">
            <!--form id="eventsFilter" method="POST">
                <label>View events by year:</label>
                <select name="year" class="year">
                </select>
            </form-->
        </td>
</table>

<table class="index">
    <thead>
        <tr>
            <th>Event</th>
            <th>Date</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $event): ?>
        <tr>
            <td>
                <?= $event->title ?>
            </td>
            <td class="date">
                <?= date('F j, Y', strtotime($event->date)); ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $event->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $event->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete event {0}?', $event->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table> 