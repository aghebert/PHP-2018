<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/26/18
 * Time: 5:19 PM
 */

?>

<!--referenced from w3schools.com-->
<form action='#' method='get' class='form-group container'>
    <label for="emailLogin"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="emailLogin" id="emailLogin" required>
    <br>
    <label for="pswLogin"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswLogin" required>
    <br/>
    <button type="submit" class="cancelbtn" name="cancel" action="./indexd.php">Cancel</button>
    <button type="submit">Login</button>

</form>

<hr>
<form action='#' method="post">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>


        <div class="container" class="form-group">
            <label for="emailReg"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="emailReg" required>
        </div>

        <div class="container" class="form-group">
            <label for="pswReg"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pswReg" required>
        </div>
        <div class="container" class="form-group">
            <label for="psw-repeatReg"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeatReg" required>
        </div>


        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form>