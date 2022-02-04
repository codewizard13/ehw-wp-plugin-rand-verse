<?php echo "I'm in " . basename(__FILE__);

require('tree.php');

$tree = [
   'core'=> [
      'init.php'
   ],
   'classes' => [
      'User.php',
      'Hash.php',
      'Session.php'
   ],
   'functions' => [
      'security.php'
   ],
   'template' => [
      'index.template.php',
      'includes' => [
         'header.template.php',
         'footer.template.php'
      ]
   ],
   'index.php',
   'login.php',
   'register.php'
];

echo treeOut($tree);