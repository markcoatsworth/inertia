<?= $this->Form->create($event, ['type' => 'file']); ?>
<fieldset>
    <h3>Create New Event</h3>
    <table class="event">
        <tr>
            <td><label>Title</label></td>
            <td><?= $this->Form->control('title', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Date</label></td>
            <td><?= $this->Form->control('date', ['type' => 'datetime', 'label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Venue</label></td>
            <td><?= $this->Form->control('venue', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>City</label></td>
            <td><?= $this->Form->control('city', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Details</label><p>(Appears on the homepage events listing)</p></td>
            <td><?= $this->Form->control('details', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Flyer Image</label></td>
            <td><?= $this->Form->control('flyer', ['type' => 'file', 'label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>More Info</label><p>(Appears on the detailed event view)</p></td>
            <td><?= $this->Form->control('moreinfo', ['label' => false]) ?></td>
        </tr>
        <tr>
            <td><label>Tickets URL</label></td>
            <td><?= $this->Form->control('tickets_url', ['label' => false]) ?></td>
        </tr>
    </table>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
