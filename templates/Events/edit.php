<script>
    tinymce.init({
        selector: "#moreinfo",
        skin: "oxide-dark",
        content_css: "dark"
    });
</script>


<?= $this->Form->create($event, ['type' => 'file']); ?>
<fieldset>
    <h3>Edit Event: <?= $event->title ?></h3>
    <table class="event">
        <tr><td><?= $this->Form->control('title') ?></td></tr>
        <tr><td><?= $this->Form->control('date', ['type' => 'datetime']) ?></td></tr>
        <tr><td><?= $this->Form->control('venue') ?></td></tr>
        <tr><td><?= $this->Form->control('city') ?></td></tr>
        <tr><td><?= $this->Form->control('details') ?></td></tr>
        <tr><td>1234
            <?php
                $this->Form->control('flyer', ['type' => 'file']);
                if (isset($event->flyer) && !empty($event->flyer)) {
                    echo $this->Html->image('Events/'.$event->flyer);
                }
             ?>
        </td></tr>
        <tr><td><?= $this->Form->control('moreinfo') ?></td></tr>
        <tr><td><?= $this->Form->control('tickets_url') ?></td></tr>
        <tr><td><?= $this->Form->control('youtube_url') ?></td></tr>
    </table>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
