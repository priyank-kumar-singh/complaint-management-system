<?php
$email = $_SESSION['email'];
$uid   = $_SESSION['uid'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$dep = $_SESSION['dep'];
$desig = $_SESSION['desig'];
$tel = $_SESSION['tel'];
$type = $_COOKIE['type'];
?>

<script>
    // Navigation Bar Title
    const navbarTitle = document.getElementById("navbar-title");
    navbarTitle.innerText = "Complaint Management System";
    navbarTitle.setAttribute("href", "http://localhost/cms/user/dashboard.php");

    const uid = '<?php echo $uid; ?>';
    const name = '<?php echo $fname; ?>' + ' ' + '<?php echo $lname; ?>';
    const email = '<?php echo $email; ?>';
    let dep = '<?php echo $dep; ?>';
    const desig = '<?php echo $desig; ?>';
    const tel = '<?php echo $tel; ?>';

    let image = 'user-s.png';
    if ('<?php echo $type; ?>' === 'faculty') {
        image = 'user-f.png';
    } else if ('<?php echo $type; ?>' === 'administrator') {
        image = 'user-a.png';
        desig = 'Administrator';
    }

    if (dep == 'CSE') {
        dep = 'Computer Science and Engineering';
    } else if (dep == 'ECE') {
        dep = 'Electronics and Communications Engineering';
    } else {
        dep = 'Other Department';
    }

    // Navigation Bar Items
    document.getElementById("navbar-items").innerHTML = `
        <a class="nav-link active" href="http://localhost/cms/"><i class="fa fa-home"></i> Site Home</a>
        <a class="nav-link active" href="http://localhost/cms/user">Dashboard</a>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="/cms/assets/img/${image}" width="30" height="30" class="rounded-circle"/>
        </a>
        <div class="profile dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <img class="profile-item image rounded-circle" src="/cms/assets/img/${image}"/>
            <div class="profile-item username"> ${name} </div>
            <div class="profile-item email"> ${email} </div>
            <?php
                if ($_COOKIE['type'] != 'student') {
                    echo '<div class="profile-item designation"> ${desig} </div>';
                }
            ?>
            <div class="profile-item department"> ${dep} </div>
            <div class="profile-item uid"> ${uid} | ${tel} </div>
            <hr>
            <a class="profile-item profile-btn btn btn-outline-secondary" type="button" href="#">Manage Profile</a>
            <br><br>
            <a class="profile-item profile-btn btn btn-secondary" type="button" href="/cms/includes/logout.php">Log Out</a>
        </div>`;
</script>
