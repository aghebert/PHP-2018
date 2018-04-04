<?php
/**
 * Created by PhpStorm.
 * User: Aaron Hebert
 * php Color Grid
 * Date: 10/4/2017
 * Time: 10:07 AM
 */

//generates rows of tables to store the colors and show the hex value
$table = "<table>\n"; //empty table var
for ($rows =1; $rows <= 10; $rows++) {
    $table .= "\t<tr>";
    for ($cols = 1; $cols <= 10; $cols++){
        $tempHex = genRanHex();
        //this adds the color to the table, and shows the hex value
        $table .= "<td style='background-color:$tempHex;color:black'> $tempHex <br /> <span style='color:white'>$tempHex </span> </td>";
    }
    $table .= "</tr>\n";

}

//this creates a 2 character variable converted from decimal to hex. The str_pad makes sure it outputs two characters, because sometimes it wont.
//It then returns the variable
function getRandColor(){
    $randColor = str_pad((dechex(mt_rand(0, 255))),2, '0', STR_PAD_LEFT);
return $randColor;

}

//This generates a six character hex color value
function genRanHex(){
    $ranHex = "#";
   $ranHex .= getRandColor();
   $ranHex .= getRandColor();
   $ranHex .= getRandColor();

    return $ranHex;
}


$table .= "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<?php echo $table; ?>
</body>

</html>