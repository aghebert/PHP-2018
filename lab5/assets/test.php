<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/14/18
 * Time: 9:45 AM
 */
$string = "The text you want to filter goes here. http://google.com, https://www.youtube.com/watch?v=K_m7NEDMrV0,https://instagram.com/hellow/";

preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);

echo "<pre>";
print_r($match[0]);
echo "</pre>";