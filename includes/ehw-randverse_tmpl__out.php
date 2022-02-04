<?php /* ehw-randverse-scripts.php */

$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";
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

$verses = [];


$output = $verse1;

?>

<div class='ehw-rbv'>
  <?php echo $output; ?>
</div>
