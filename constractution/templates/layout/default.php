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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css([
      
      'material-dashboard',
      'style',
      'neucleo-icons',
      'neucleo-svg',
      
      ]) ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
   
</head>
<body class="g-sidenav-show  bg-gray-100">
    
    
    <main class="main">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div> 
    </main>
   
    <footer>
    </footer>
    <?= $this->Html->script([
        'jquery_plugin',
        'validate_plugin',
        'script',
        'material-dashboard',
        'core/popper.min',
        'core/bootstrap.min',
        'plugins/perfect-scrollbar.min',
        'plugins/smooth-scrollbar.min',
        
       
        
        ]) ?>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<script>

  $(function() {
    var url = window.location.href;
    $(".nav-item a").each(function() {
        if (url == (this.href)) {
            $(this).addClass("bg-gradient-primary active ");
        }
    });
  }); 

</script>
<?= $this->fetch('script') ?>

</body>
</html>
