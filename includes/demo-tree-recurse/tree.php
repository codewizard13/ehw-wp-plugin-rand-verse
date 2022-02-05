<?php
/*
Project Name:   EHW WP Plugin: EHW Random Bible Verse
Main Prj File:  ehw-randverse.php

This Filename:  tree.php
Date Created:   02/04/22
Date Updated:   --
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
Defined treeOut() function for this demo.

Requires:
* index.php

Future:
* demo-tree-recurse/ dir and contents should be moved to own project
*/

/**
 * @args:
 * - Array $tree: any array structure
 * @returns:
 * - String - HTML $markup
 */
function treeOut($tree) {
   $markup = '';

   foreach ($tree as $branch => $twig) {
      $markup .= '<li>' . ((is_array($twig)) ? $branch . treeOut($twig) : $twig) . '</li>';
   }

   return '<ul>' . $markup . '</ul>';
}


/* ------------ */

$verse1 = 'For I know the thoughts that I think toward you,' . 
'saith the LORD, thoughts of peace, and not of evil,' . 
'to give you an expected end.';

$verse2 = 'For God so loved the world, that he gave his only '. 
'begotten Son, that whosoever believeth in him should not perish,'.
'but have everlasting life.';

$verse3 = 'And we know that all things work together for good to '.
'them that love God, to them who are the called according to his'.
'purpose.';

$verses['Jeremiah'][29][11] = $verse1;
$verses['John'][3][16] = $verse2;
$verses['Romans'][8][28] = $verse3;

$verses['John'][1][1] = "In the beginning was the Word, and the Word was with God, and the Word was God.";
$verses['John'][1][3] = "All things were made by him; and without him was not any thing made that was made.";

$options = [];

/**
 * @args:
 * - Array $tree: any array structure
 * @returns:
 * - String - HTML $markup
 */
function processTree($tree, $lev=0, &$options=[]) {
   $markup = '';
   $out_arr = [];

   foreach ($tree as $branch => $twig) {

      // Debug

      // If twig is verse text
      if (!is_array($twig)) {
         echo '<p><strong>Twig:</strong> ' . $twig . '</p>';
      }
      

      $markup .= '<li>';
      $cur_depth = $lev+1;
      $verse_count = 1;

      if ($cur_depth == 1) {
         $this_book = $branch;
         $options['out_verses'][$verse_count] = $this_book;
      } else if ($cur_depth == 2) {
         $this_ch_num = $branch;
      } else if ($cur_depth == 3) {
         $this_vers_num = $branch;
      }

      if (is_array($twig)) {
         // if node
         echo '<p><strong>Branch:</strong> ' . $branch . '</p>';
         $options[$cur_depth] = $branch;
         $markup .= "<h$cur_depth>" .$branch. "</h$cur_depth>" . processTree($twig, $cur_depth, $options);
      } else {
         // if leaf
         $options[$cur_depth] = $branch;
         $markup .= "<h$cur_depth>" .$branch. "</h$cur_depth>" . $twig;
      }
      
      $markup .= var_dump($options);
      $markup .= '</li>';
      
      $verse_count++;
   
   } // /END foreach

   $markup = '<ul>' . $markup . '</ul>';

}

echo "I'll put the TREE OUT here<br>";
echo "<section class='ehw-rbv'>";
echo processTree($verses);
echo "</section>";
echo "<h3>Printing OPTIONS</h3>";
var_dump($options);
exit;