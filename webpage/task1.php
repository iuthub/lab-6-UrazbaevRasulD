<?php

//a PHP script that removes the whitespaces from a string
$replacedText = preg_replace("/\s/", "", "The quick ” ” brown fox");
echo $replacedText;

echo "<br><br>";


// PHP script to remove nonnumeric characters except comma and dot
$replacedText = preg_replace("/[^0-9.,]/", "", "$123,34.00A");
echo $replacedText;

echo "<br><br>";

// PHP script to remove new lines
$replacedText = preg_replace("/\n/", "", "Twinkle, twinkle, little star,
How I wonder what you are.
Up above the world so high,
Like a diamond in the sky.");
echo $replacedText;


echo "<br><br>";

//PHP script to extract text (within parenthesis) from a string
$replacedText = preg_replace("/\[|]/", "", "The quick brown [fox].");
echo $replacedText;


