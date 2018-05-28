<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/26/18
 * Time: 5:19 PM
 */

?>

<!-- referenced from w3schools.com-->
<form action="" method="post" class="container">
    <div>

    </div>
    <div class="form-group">
        <label for="emailLogin"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="emailLogin" required>
    </div>
    <div class="form-group">
        <label for="pswLogin"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pswLogin" required>
    </div>
    <div class="form">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" name="">Login</button>
        <input type="hidden" name="action" value="LOGIN">

    </div>
</form>

<hr>
<form action="#" method="POST" class="container">
    <div>

    </div>
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <div class="form-group">
        <label for="emailReg"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="emailReg" required>
    </div>
    <div class="form-group">
        <label for="pswReg"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pswReg" required>
    </div>
    <div class="form-group">
        <label for="pswrepeatReg"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="pswrepeatReg" required>
    </div>
    <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
    </div>

</form>