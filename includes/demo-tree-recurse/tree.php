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

// SAMPLE $verses array:
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
   $markup = [];
   $out_arr = [];

   foreach ($verses as $book_name => $book_val) {
      // echo '<h3>$book_name: ' . $book_name . '</h3>';
      // print_r($book_val);

      foreach ($book_val as $ch_num => $ch_val) {
         // echo '<h3>$ch_num: ' . $ch_num . '</h3>';
         // print_r($ch_val);
            
         foreach ($ch_val as $verse_num => $verse_val) {
            // echo '<h3>$verse_num: ' . $verse_num . '</h3>';
            // print_r($verse_val);

            // Pad chapter and verse numbers with leading zeros
            $ch_num_p = str_pad($ch_num, 2, 0, STR_PAD_LEFT);
            $v_num_p = str_pad($verse_num, 2, 0, STR_PAD_LEFT);

            // unique key for this verse
            $markup_key = $book_name.'-'.$ch_num_p.'-'.$v_num_p;

            // output html version one
            $html_out .= "<section class='ehw-rbv'>";
            $html_out .= "<h3>$book_name $ch_num_p:$v_num_p</h3>";
            $html_out .= "<p>$verse_val</p>";
            $html_out .= "</section>";
            
            $markup[$markup_key] = [
               'book_name' => $book_name,
               'ch_num' => $ch_num_p,
               'verse_num' => $v_num_p,
               'verse_txt' => $verse_val,
               'html_01' => $html_out
            ];

         }

      }
         
   } // /END foreach

   $out_arr['markup'] = $markup;

   return $out_arr;
}
?>

<link rel="stylesheet" href="../../css/style.css">

<?php

$my_vs = listVerses($verses);
$my_verse_ids = array_keys($my_vs['markup']);

echo "<H2>VERSES FORMATTED:</H2>";

var_dump($my_verse_ids);

foreach ($my_vs['markup'] as $verse => $key) {
   echo $key['html_01']. "<br>";
}




exit;