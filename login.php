<?php 
    session_start();
    if (isset($_SESSION['unique_id'])){
        header("location: user.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Name</label>
                    <input type="text" name="email" placeholder="Enter your email" require>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" require>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section> 
    </div>

    <script src="asset/js/pass-show-hide.js"></script>
    <script src="asset/js/login.js"></script>
</body>
</html>