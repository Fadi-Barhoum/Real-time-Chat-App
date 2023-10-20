<?php 
    session_start();
    if (!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php 
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $userInformationQuery = "SELECT * FROM users WHERE unique_id = {$user_id}";
                $userInformation = mysqli_query($conn, $userInformationQuery);
                if (mysqli_num_rows($userInformation) > 0){
                    $row = mysqli_fetch_assoc($userInformation);
                }
            ?>
                <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'];?>">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, sint?</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="asset/img/Fadi-Barhoum-profile.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis, esse.</p>
                    </div>
                </div> 
            </div>
            <form action="#" class="typing-area">
                <input type="text" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section> 
    </div>

    <script src="asset/js/script.js"></script>
</body>
</html>