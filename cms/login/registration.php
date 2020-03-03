<?php
require "../config.php";
require "../templates/header.php";
if (isset($_POST['btn_submit'])) {
    $user= new User;
    if (isset($_POST['tb_name']) && $user->check($_POST['tb_name'])) {
        echo "Username is already taken!";
    }
    else{
        if(isset($_POST['tb_pass']) && $_POST['tb_pass']!=$_POST['tb_pass_conf'])
        {
            echo "The password is not the same!";
        }
        else{
            $user->Registration($_POST['tb_name'], $_POST['tb_pass_conf']);
            Header( 'Location: index.php?success=1' );
        }
    }
}

?>
<div class="card-body"><br/>

<form method="post">
<div class="form-group">
<label>Username:</label>
<input class="form-control" type="text" name="tb_name" /><br/>
</div>
<div class="form-group">
<label>Password:</label>
<input class="form-control" type="text" name="tb_pass" /><br/>
</div>
<div class="form-group">
<label>Confirm password</label>
<input class="form-control" type="password" name="tb_pass_conf" /><br/>
</div>

<input type="submit" name="btn_submit" class="btn btn-primary mb-2" value="Sign up">
</form>
<p>Already have account? <a href="index.php">Login</a><br/>
<a href="../">Return to Homepage</a></p>

</div>	