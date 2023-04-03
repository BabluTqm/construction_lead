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

$cakeDescription = 'Construction & Lead Management';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>
<?= $this->Html->css([
        'material-dashboard',
        'style',
        // 'neucleo-icons',
        // 'neucleo-svg',

    ]) ?>

</head>
<body class="g-sidenav-show  bg-gray-100">
     <?= $this->fetch('content') ?>
  <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <?= $this->Html->script([
        'jquery_plugin',
        'validate_plugin',
        'ajax',
        'admin',
        'core/popper.min',
        'core/bootstrap.min',
        'material-dashboard',
        'plugins/perfect-scrollbar.min',
        'plugins/smooth-scrollbar.min',
        'neucleo-icons',
        'neucleo-svg',

    ]) ?>
</body>
</html>

