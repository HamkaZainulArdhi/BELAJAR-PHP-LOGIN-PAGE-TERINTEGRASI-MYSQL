<?php

    include "servis/database.php";

    $pesan = "";

    if(isset($_POST['login'])) {
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $hash_password = hash("sha256", $password);

          $sql = "SELECT * FROM user where username = '$username' AND password = '$hash_password'";

          $result = $db->query($sql);

          if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            header("location: dasbord.php");

          } else {
            $pesan = "username/password salah awokawokawok";
          }

    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
            text-align: center;
            margin-top: 12rem;
            display: flex;
            justify-content: center;
            position: relative;
        }
        form input{
            display: flex; 
            flex-direction: column;
            align-items: center;
            width:15rem ; /*ini diubah*/
            height: 25px; /*30rpx, */
            margin: 10px 34rem 10px;
            border-radius: 5px;
            border: 0;
            box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;
          

        }
                
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: auto; /* Ukuran kotak */
            width: 28rem;
            border-radius: 35px;
            z-index: 3;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        button {
            margin-top: 9px; /*5px*/
        }

        marquee {
            margin-top: 7px;
        }

        input[type="password"] { /*ini g ada tadinya*/
            margin-top: 2px;
            height: 12px;
            border-radius: 0;

        }
        

    
    </style>
    
</head>
<body>
    
    <div class="container">
    <?php include "fitur/header.html" ?>
    
    <h4>LOGIN DULU GA SIH</h4>
    <form action="login.php" method="POST">  
        Masukan username<input type="text" placeholder="username" name="username">
        Masukan Sandi<input type="password" name="password">
        <button type="submit" name="login">masuk sekarang</button>
    </form>

    <marquee behavior="" direction=""><i><?= $pesan?></i></marquee>

    <?php include"fitur/footer.html"?>
    </div>
    
</body>
</html>