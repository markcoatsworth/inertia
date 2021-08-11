<h1>Events</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we iterate through our $events query object, printing out event info -->

    <?php foreach ($events as $event): ?>
    <tr>
        <td>
            <?= $this->Html->link($event->title, ['action' => 'view', $event->id]) ?>
        </td>
        <td>
            <?= $event->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>