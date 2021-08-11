<h1><?= h($event->title) ?></h1>
<p><?= h($event->details) ?></p>
<p><small>Created: <?= $event->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $event->id]) ?></p>