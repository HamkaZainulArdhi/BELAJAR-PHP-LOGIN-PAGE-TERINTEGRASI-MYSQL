<?php 
    include "servis/database.php";

    $pesan ="";

    if(isset($_POST['daftar'])) {
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $hash_password = hash("sha256", $password);

        $sql = " INSERT INTO user(username, password) VALUES ('$username', '$hash_password')";

        try {
            if ($db->query($sql)) {
           $pesan = "berhasil mendaftar, silahkan login";
            }else{
            $pesan = "gagal mendaftar, silahkan coba lagi";
            }
        } catch (mysqli_sql_exception) {
            $pesan = "username sudah ada harap ganti";

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
            width:20rem ;
            height: 30px;
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
            height: 25rem; /* Ukuran kotak */
            width: 25rem;
            border-radius: 35px;
            z-index: 3;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        button {
            margin-top: 5px;
        }
        

    
    </style>
    
</head>
<body>
    
    <div class="container">
    <?php include "fitur/header.html" ?>
    
    <h4>REGISTER DULU GA SIH</h4>
    <form action="register.php" method="POST">  
        username<input type="text" placeholder="username" name="username">
        password<input type="password" placeholder="password" name="password">
        <button type="submit" name="daftar">DAFTAR</button>
    </form>

    <marquee behavior="" direction=""><i><?= $pesan ?></i></marquee>

    <?php include"fitur/footer.html"?>
    </div>
    
</body>
</html>