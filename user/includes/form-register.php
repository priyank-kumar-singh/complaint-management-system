<a title="Home" href="../"><i class="fa fa-home avatar avatar-top"></i></a>
<div class="form-login form-register">
    <h2 class="form-login-heading"></h2>
    <p style="padding-left:4%; padding-top:2%;  color:red">
        <?php if ($errormsg) {
            echo htmlentities($errormsg);
        } ?></p>
    <p style="padding-left:4%; padding-top:2%;  color:green">
        <?php if ($msg) {
            echo htmlentities($msg);
        } ?></p>
    <form class="login-wrap row g-3" name="login" method="post">
        <div class="col-md-6">
            <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="uid" placeholder="<?php if ($_COOKIE['type'] == 'student') echo "Enrollment No"; else echo "Employee Id";  ?>" required>
        </div>
        <div class="col-md-6">
            <select name="department" class="form-select" required>
                <option value="" hidden selected disabled>Department</option>
                <option value="CSE">Computer Science and Engineering</option>
                <option value="ECE">Electronics and Communications Engineering</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <?php
            if ($_COOKIE['type'] == 'faculty') {
                echo '<div class="col-md-12">';
                echo '<select name="designation" class="form-select" required>';
                echo '<option value="" hidden selected disabled>Designation</option>';
                echo '<option value="Assitant Professor">Assistant Professor</option>';
                echo '<option value="Professor">Professor</option>';
                echo '<option value="Head of Department">Head of Department</option>';
                echo '</select>';
                echo '</div>';
            }
        ?>
        <div class="col-md-6">
            <select name="gender" class="form-select" required>
                <option value="" hidden selected disabled>Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Prefer Not to Say</option>
            </select>
        </div>
        <div class="col-md-6">
            <input type="tel" class="form-control" name="mobile" placeholder="Mobile" required>
        </div>
        <div class="col-md-12">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email" onBlur="userAvailability()" required>
            <span id="user-availability-status" style="font-size:12px;"></span>
        </div>
        <div class="col-md-12">
            <input type="password" class="form-control" name="password" placeholder="New Password" required>
        </div>
        <div class="col-md-12">
            <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> Register</button>
        </div>
        <hr>
        <div class="registration">
            Already Registered
            <br />
            <a class="hyperlink" href="index.php">Sign In</a>
        </div>
    </form>
</div>
