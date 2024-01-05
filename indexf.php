<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: black;
            overflow: hidden;
        }

        #particles-js {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: 50% 50%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .container {
            max-width: 300px;
            padding: 20px;
            background: rgba(48, 46, 45, 0.8);
            border: 1px solid black;
            border-radius: 5px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .logo h1 {
            font-family: 'Poiret One', cursive;
            color: white;
            margin: 0;
        }

        input {
            width: 94%;
            padding: 10px;
            margin-bottom: 10px;
            background: rgb(98, 96, 96);
            border: 0;
            border-radius: 3px;
            color: white;
        }

        input:focus {
            outline: none;
            box-shadow: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #b1c900;
            border: none;
            border-radius: 3px;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: rgba(48, 46, 45, 1);
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .container {
                max-width: 100%;
            }

            .logo img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="img/bhai3.jpg" alt="Logo" />
            <h1>Login</h1>
        </div>
        <form action="login.php" method="post">
         <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
            <input type="text" name="uname" placeholder="User Name">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
    <div id="particles-js"></div>


</body>
</html>
