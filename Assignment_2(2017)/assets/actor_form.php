<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 9:45 AM
 */
$currentDay = date('Y\-m\-d');

?>

<form  method="POST" action="#">
    First Name: <br /> <input type="text" name="firstname" value=""/> <br />
    Last Name: <br/> <input type="text" name="lastname" value="" /> <br />
    Date of Birth: <br/> <input type="text" name="dob" value=""/> <br />
    Height: <br /> <input type="text" name="height" value="" /> <br />
    <input type="submit" id="submitactors" name="action" value="Add" />
</form>