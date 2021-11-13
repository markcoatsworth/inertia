<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Inertia Entertainment';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inertia Entertainment</title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['reset', 'normalize.min', 'milligram.min', 'cake', 'inertia']) ?>
    <?= $this->Html->script(['jquery/jquery-1.5.min', 'jquery/jquery.pngFix.pack', 'inertia']) ?>
    <script src="https://cdn.tiny.cloud/1/h5dqht91ez2y0zlpio9b4vktrwu21xy4vcwhochwdmt2umsc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
   
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '222771348378110'); 
        fbq('track', 'PageView');
    </script>
    <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=222771348378110&ev=PageView
        &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body>
    <div id="header">
        <h1><a href="/" class="home"><span class="hidden">Inertia Entertainment</span></a></h1>
        <div class="mascot"></div>
    </div>
    <div id="navigation">
        <ul class="navigation">
            <li><a href="/" admin="false">Events</a></li>
            <li><a href="/history">History</a></li>
            <li><a href="mailto:inertia@inertia-entertainment.com">Contact</a></li>
            <li><a href="https://www.facebook.com/pages/INERTIA-ENTERTAINMENT/6393274882" class="facebook" target="_blank">FB</a></li>
            <li><a href="http://instagram.com/INERTIA_NOEL" class="instagram" target="_blank">IG</a></li>
        </ul>
        <div class="clear"></div>   
    </div>
    <div id="container">
    <div class="admin_navigation">
            <p>
            <ul class="admin_navigation">
                <li>Welcome, <?= $this->request->getSession()->read('Auth.first_name') ?>!</li>
                <li class="separator">&bull;</li>
                <li><?= $this->Html->link('Event Manager', array('controller' => 'pages', 'action' => 'admin')) ?></li>
                <li class="separator">&bull;</li>
                <li><?= $this->Html->link('User Manager', array('controller' => 'users', 'action' => 'index')) ?></li>
                <li class="separator">&bull;</li>
                <li><?= $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) ?></li>
            </ul>
        </div>
        <div class="clear"></div>
        <h2>Administration Panel</h2>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <div id="footer">
        All contents copyright Inertia Entertainment, 2021.
    </div>
</body>
</html>
