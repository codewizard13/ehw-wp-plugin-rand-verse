<?php echo "I'm in " . basename(__FILE__);
/*
Project Name:   EHW WP Plugin: EHW Random Bible Verse
Main Prj File:  ehw-randverse.php

This Filename:  index.php
Date Created:   02/04/22
Date Updated:   --
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
Demonstrates PHP recursive tree walking. Demo outputs an indented
unordered list for a multidimensional array three levels deep.

- Create $tree variable (nested three dimensional array)
- Call treeOut() function

Requires:
* tree.php

Future:
* demo-tree-recurse/ dir and contents should be moved to own project
*/

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