<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtome Chat App</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="asset/js/search-bar-show-hide.js" defer></script>
</head>
<body>
    <div class="wrapper">
        <section class="user">
            <header>
                <div class="content">
                    <img src="asset/img/Fadi-Barhoum-profile.png" alt="">
                    <div class="details">
                        <span>Fadi Barhoum</span>
                        <p>Active now</p>
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
                <a href="">
                    <div class="content">
                        <img src="asset/img/Fadi-Barhoum-profile.png" alt="">
                        <div class="details">
                            <span>Fadi Barhoum</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
            </div>
        </section> 
    </div>
</body>
</html>