<?php
/*
Project Name:   EHW WP Plugin: EHW Random Bible Verse
Main Prj File:  ehw-randverse.php

This Filename:  tree.php
Date Created:   02/04/22
Date Updated:   02/05/22
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

$verses['Jeremiah'][29][11] = 'For I know the thoughts that I think toward you, saith the LORD, thoughts of peace, and not of evil, to give you an expected end.';
$verses['John'][3][16] = 'For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.';
$verses['Romans'][8][28] = 'And we know that all things work together for good to them that love God, to them who are the called according to his purpose.';
$verses['John'][1][1] = "In the beginning was the Word, and the Word was with God, and the Word was God.";
$verses['John'][1][3] = "All things were made by him; and without him was not any thing made that was made.";

/**
 * @args:
 * - Array $verses: an associative array of bible verses with depth of 3
 * 
 * @returns:
 * - Array $out_arr: associative array of output data
 */
function listVerses($verses, $lev=0, $options=[]) {
   $markup = '';
   $out_arr = [];

   foreach ($verses as $branch => $twig) {

         
   } // /END foreach

   $markup = '<ul>' . $markup . '</ul>';

}

echo "I'll put the TREE OUT here<br>";
echo "<section class='ehw-rbv'>";
echo listVerses($verses);
echo "</section>";
exit;