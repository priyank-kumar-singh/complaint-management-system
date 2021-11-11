<a title="Home" href="../"><i class="fa fa-home avatar avatar-top"></i></a>
<div class="form-login">
    <h2 class="form-login-heading"></h2>
    <p style="padding-left:4%; padding-top:2%;  color:red">
        <?php if ($errormsg) {
            echo htmlentities($errormsg);
        } ?></p>
    <p style="padding-left:4%; padding-top:2%;  color:green">
        <?php if ($msg) {
            echo htmlentities($msg);
        } ?></p>
    <form class="login-wrap" name="login" method="post">
        <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
        <br>
        <input type="password" class="form-control" name="password" required placeholder="Password">
        <label class="forgot-password">
            <a class="hyperlink" data-toggle="modal" href="#myModal">Forgot Password?</a>
        </label>
        <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        <hr>
        <div class="registration">
            Don't have an account yet?
            <br />
            <a class="hyperlink" href="register.php">Create an account</a>
        </div>
    </form>
</div>
