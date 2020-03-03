<?php
require "../config.php";
require "../templates/header.php";
if (isset($_GET['success']) && $_GET['success']==1) {
    echo "Registration successful! You can log in now!";
}

?>


<div class="card-body ustify-content-center text-center">
<br/>

<form method="post" action="login.php">
<div class="form-group">
<label>Username:</label>
<input class="form-control " type="text" name="tb_name"  /><br/>
</div>
<div class="form-group">
<label>Password:</label>
<input class="form-control" type="password" name="tb_pass" /><br/><br/>
<input type="submit" name="btn_submit" value="Login" class="btn btn-primary mb-2">
</div>
<br/>
<br/>
</form>
<p>Don't have account? <a href="registration.php">Sign up</a><br/>
<a href="../">Return to Homepage</a></p>

</div>
