<?php /* ehw-randverse-scripts.php */

// SAMPLE $verses array (King James Version, KJV):
$verses['Jeremiah'][29][11] = 'For I know the thoughts that I think toward you, saith the LORD, thoughts of peace, and not of evil, to give you an expected end.';
$verses['John'][3][16] = 'For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.';
$verses['Romans'][8][28] = 'And we know that all things work together for good to them that love God, to them who are the called according to his purpose.';
$verses['John'][1][1] = "In the beginning was the Word, and the Word was with God, and the Word was God.";
$verses['John'][1][3] = "All things were made by him; and without him was not any thing made that was made.";

/**
 * @purpose:
 * Reads through multidimensional array of bible verses (book name, chapter
 * number, verse number), with the applicable verse text being the assisgnment
 * value, and builds a new array of arrays. The new array elements look like
 * objects, having as their key a string built of "book-ch-num" concatenated.
 * The properties of each first-level array consist of book_name, ch_num,
 * verse_num, and verse_txt. An additional property of 'html_01' builds
 * the formatted verse text that gets displayed.
 * 
 * @usage:
 * 
 * // Returns array of formattedVerse array objects
 * $my_vs = buildFormattedVerses($verses);
 * 
 * // Get all book-ch-verse array keys
 * $my_verse_ids = array_keys($my_vs);
 * 
 * // Get verse text for John 3:16
 * $my_vs['John-03-16']['verse_text']
 * 
 * @args:
 * - Array $verses: an associative array of bible verses with depth of 3
 * 
 * @requires:
 * - CSS styles loaded via wp_enqueue_styles() hook for .ehw-rbv
 * 
 * @returns:
 * - Array $out_arr: array of object-like arrays
 */
function buildFormattedVerses($verses) {
   $markup = [];
   $out_arr = [];

   foreach ($verses as $book_name => $book_val) {

      foreach ($book_val as $ch_num => $ch_val) {
            
         foreach ($ch_val as $verse_num => $verse_val) {

            // Pad chapter and verse numbers with leading zeros
            $ch_num_p = str_pad($ch_num, 2, 0, STR_PAD_LEFT);
            $v_num_p = str_pad($verse_num, 2, 0, STR_PAD_LEFT);

            // unique key for this verse
            $markup_key = $book_name.'-'.$ch_num_p.'-'.$v_num_p;

            // output html version one
            $html_out = "<section class='ehw-rbv'>";
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

   $out_arr = $markup;

   return $out_arr;
}
?>

<link rel="stylesheet" href="../../css/style.css">

<?php

$my_vs = buildFormattedVerses($verses);
$my_verse_ids = array_keys($my_vs);

/**
 * @purpose:
 * Loops through a verses array and prints all results to screen
 * in HTML format. Styling is outside scope of this function.
 * 
 * @args:
 * - Array $va: array of verses built with buildFormattedVerses()
 * 
 * @returns:
 * - VOID
 */
function displayFormattedVerses($va) {
   foreach ($va as $verse => $key) {
      echo $key['html_01']. "<br>";
   }
}
// displayFormattedVerses($my_vs);

/**
 * 
 * @usage:
 * 
 * // display formatted verse html segment
 * echo $output['html_01'];
 * 
 * @requires:
 * - CSS styles loaded via wp_enqueue_styles() hook for .ehw-rbv
 * 
 * @args:
 * - Array $va: array of verses built with buildFormattedVerses()
 * 
 * @returns:
 * - Array obj $verse: 
 */
function getRandVerse($va) {

   $rand_keys = array_rand($va);

   $out_verse = $va[$rand_keys];

   return $out_verse;
}

$output = getRandVerse($my_vs);
echo($output['html_01']);


?>

<?php echo $output['html_01']; ?>

