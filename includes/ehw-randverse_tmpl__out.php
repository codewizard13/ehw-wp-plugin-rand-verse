<?php /* ehw-randverse_tmpl__out.php */

/* DEFINE VERSES ARRAY:
   NOTE: All Bible verses taken from King James Bible: Pure Cambridge Edition (PCE) via https://openbible.com/
   - Retrieved 02/15/22
   - License: As per bibleprotector.com, the PCE Edition of the King James Bible is public domain, and thus free to use:
   
   "The standard King James Bible was originally presented by Cambridge University Press,
   and the Pure Cambridge Edition that was historically published by Cambridge University
   is in the public domain, though it gained its authority to publish it from Crown of
   Great Britain. The Pure Cambridge Edition can and should be published and produced
   by anyone without restriction, except absolute accuracy." -- https://www.bibleprotector.com/GUIDE_TO_PCE.pdf
*/
$verses['Jeremiah'][29][11] = "For I know the thoughts that I think toward you, saith the LORD, thoughts of peace, and not of evil, to give you an expected end.";
$verses['John'][3][16] = "For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.";
$verses['Romans'][8][28] = "And we know that all things work together for good to them that love God, to them who are the called according to his purpose.";
$verses['John'][1][1] = "In the beginning was the Word, and the Word was with God, and the Word was God.";
$verses['John'][1][3] = "All things were made by him; and without him was not any thing made that was made.";

/* Additonal verses that are different in PCE, as per http://www.bibleprotector.com/forum/viewtopic.php?f=8&t=85: */
$verses['Isaiah'][49][13] = "Sing, O heavens; and be joyful, O earth; and break forth into singing, O mountains: for the LORD hath comforted his people, and will have mercy upon his afflicted.";
$verses['1 Corinthians'][12][28] = "And God hath set some in the church, first apostles, secondarily prophets, thirdly teachers, after that miracles, then gifts of healings, helps, governments, diversities of tongues.";
$verses['Ruth'][3][15] = "Also he said, Bring the vail that thou hast upon thee, and hold it. And when she held it, he measured six measures of barley, and laid it on her: and she went into the city.";
$verses['Matthew'][12][23] = "And all the people were amazed, and said, Is not this the son of David?";
$verses['Ezekiel'][24][7] = "For her blood is in the midst of her; she set it upon the top of a rock; she poured it not upon the ground, to cover it with dust;
   ";

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

$my_vs = buildFormattedVerses($verses);
$my_verse_ids = array_keys($my_vs);

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

?>

<?php echo wp_kses_post($output['html_01']); ?>

