<h2>Administration Panel</h2>
<h3>Login</h3>

<?= $this->Form->create('User', array('url' => array('controller' => 'pages', 'action' =>'login'))) ?>
<?= $this->Form->input('User.username', array('label' => 'Username: ')) ?>
<?= $this->Form->input('User.password', array('label' => 'Password: ')) ?>
<?= $this->Form->end('Login') ?>