<?php /* ehw-randverse-scripts.php */

// $var = array( 
//    "green" => array("one", "two"), 
//    "red" => array("three", "four"),
//    "yellow" => array("five", "six")
//    );
   
// $color = array_rand($var); //here yoy get random first of array(green or red or yellow)
// // echo $var[$color][array_rand($var[$section])]; //here you get random element of this array
// echo $var[$color][array_rand($var[$color])];
// exit;

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

echo "I'll put the TREE OUT here<br>";
echo treeOut($verses);
exit;

// var_dump($verses);
$john_ch_count = count(array_keys($verses['John']));
$ttl_v_count = count($verses);
echo '<p>Total Verses: ' . $ttl_v_count . '</p>';
// exit;

//$out = count( $verses['John'][array_keys($verses['John'])] );
//echo 'Total verses in John: ' .$out;
// exit;

function get_rand_verse($verses) {
   // test verse
   $verse = $verses['John'][3][16];

   $out = '';

   $book_names = array_keys($verses);
   echo '<h3>Book Names Array:</h3>';
   var_dump($book_names);

   foreach ($verses as $verse) {

      foreach ($verse as $ch) {
         foreach ($ch as $verse_text) {
            echo '<hr>';
            echo $verse_text . '<br>';
         }
      }
   }

   return $verse;
}

$output = get_rand_verse($verses);


// $verses = [$verse1, $verse2, $verse3];
// $rand_keys = array_rand($verses);
exit;
?>

<div class='ehw-rbv'>
  <?php echo $output; ?>
</div>
