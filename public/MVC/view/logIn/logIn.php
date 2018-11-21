<html xmlns="http://www.w3.org/1999/html">
<head>
    <style>
        form {
            width: 500px;
            height: 400px;
            border: springgreen 3px solid;
            margin: 0 auto;
            text-align: center;
            border-radius: 15px;

        }
        input{
            width: 300px;
            height: 70px;
            border: springgreen 3px solid;
            border-radius: 15px;
            text-align: center;
            font-size: x-large;
        }
        .sub{
            margin-top: 100px;
            color: white;
            background-color: springgreen;
        }
        .sub:hover{
            opacity: 0.6;
        }
        .text{
            margin-top: 20px;
        }
        a{
            padding: 10px;
            text-decoration: none;
            border-radius: 10px;
        }
        .pagrindinis{
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <?php session_unset(); ?>
    <?php session_destroy(); ?>

    <form action="http://185.80.130.158/MVC/index.php/LogIn" method="post">
        <input class="text" type="text" name="userName" placeholder="username">
        <br>
        <input class="text" type="password" name="password" placeholder="password">
        <br>
        <input class="sub" type="submit">
        <br>
        <div class="pagrindinis"><a href="http://185.80.130.158/MVC/index.php/products" class="sub">view shop without logining</a></div>
    </form>
</body>
</html>