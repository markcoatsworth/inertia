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
    <?php
        echo $this->Form->control('title');
        echo $this->Form->control('date', ['type' => 'datetime']);
        echo $this->Form->control('venue');
        echo $this->Form->control('city');
        echo $this->Form->control('details');
        echo $this->Form->control('flyer', ['type' => 'file']);
        if (isset($event->flyer) && !empty($event->flyer)) {
            echo $this->Html->image('Events/'.$event->flyer);
        }
        echo $this->Form->control('moreinfo');
        echo $this->Form->control('tickets_url');
        echo $this->Form->control('youtube_url');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
