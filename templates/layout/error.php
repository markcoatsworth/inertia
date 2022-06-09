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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W5TMYM1DLE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-W5TMYM1DLE');
    </script>

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
         <img height="1" width="1" src="https://www.facebook.com/tr?id=222771348378110&ev=PageView &noscript=1"/>
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
            <li><a href="https://www.facebook.com/pages/INERTIA-ENTERTAINMENT/6393274882" class="facebook" target="_blank"></a></li>
            <li><a href="http://instagram.com/inertia_entertainment" class="instagram" target="_blank"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="container">
        <div class="column_wide left">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <div class="column_narrow right">
            <p style="font-size: 14px; margin: 5px 0 10px 5px; text-align: center;"><img style="width: 180px;" src="/img/BestOf2015_winner.png"></p>
            <p style="font-size: 14px; margin: 5px 0 10px 5px; text-align: center;"><img style="width: 180px;" src="/img/BestOf2014_winner_colour.png"></p>
            <p style="font-size: 14px; margin: 5px 0; text-align: center;"><img style="width: 180px;" src="/img/BestOf2013_winner_colour.jpg"></p>
            <p style="font-size: 14px; margin: 5px 0; text-align: center;">Toronto's Best Concert Promoter</p>
            <div class="search_widget" style="display:none;">
                <form action="/" method="post">
                    <input type="text" name="search"></input>
                    <input type="submit" value="Search"></input>
                </font>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div id="footer">
        All contents copyright Inertia Entertainment, 2021.
    </div>
</body>
</html>