<?php /* ehw-randverse-scripts.php */

$var = array( 
   "green" => array("one", "two"), 
   "red" => array("three", "four"),
   "yellow" => array("five", "six")
   );
   
$color = array_rand($var); //here yoy get random first of array(green or red or yellow)
// echo $var[$color][array_rand($var[$section])]; //here you get random element of this array
echo $var[$color][array_rand($var[$color])];
exit;




$verse1 = 'For I know the thoughts that I think toward you,' . 
'saith the LORD, thoughts of peace, and not of evil,' . 
'to give you an expected end. -- Jeremiah 29:11';

$verse2 = 'For God so loved the world, that he gave his only '. 
'begotten Son, that whosoever believeth in him should not perish,'.
'but have everlasting life. -- John 3:16';

$verse3 = 'And we know that all things work together for good to '.
'them that love God, to them who are the called according to his'.
'purpose. -- Romans 8:28';

$verses['Jeremiah'][29][11] = $verse1;
$verses['John'][3][16] = $verse2;
$verses['Romans'][8][28] = $verse3;


// $verses = [$verse1, $verse2, $verse3];
$rand_keys = array_rand($verses);

// $output = $verses[];

?>

<div class='ehw-rbv'>
  <?php echo $output; ?>
</div>
