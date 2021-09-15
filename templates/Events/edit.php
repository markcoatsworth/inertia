<div class="content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <h2>Edit Event</h2>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('date', ['type' => 'datetime']);
            echo $this->Form->control('venue');
            echo $this->Form->control('city');
            echo $this->Form->control('details');
            echo $this->Form->control('flyer', ['type' => 'file']);
            echo $this->Form->control('moreinfo');
            echo $this->Form->control('tickets_url');
            echo $this->Form->control('youtube_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>