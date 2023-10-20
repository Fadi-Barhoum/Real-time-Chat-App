<?php 
    session_start();
    if (!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="user">
            <header>
                <?php 
                    include_once "php/config.php";
                    $userInformationQuery = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";
                    $userInformation = mysqli_query($conn, $userInformationQuery);
                    if (mysqli_num_rows($userInformation) > 0){
                        $row = mysqli_fetch_assoc($userInformation);
                    }
                ?>
                <div class="content">
                    <img src="php/images/<?php echo $row['img'];?>">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select a user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="user-list">
                
            </div>
        </section> 
    </div>

    <script src="asset/js/users.js"></script>
</body>
</html>