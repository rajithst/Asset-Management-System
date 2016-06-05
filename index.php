<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css">
    

</head>
<body>
    
    <div id="page">
        <header>
            <a title="asset" href="index.html">                
                <div class="logo">
                    <img src="images/logo.png" height="66px" weight="66px" />
                    <span id="title">Asset Management System</span>
                </div>
            </a>

            <nav>
                <form action="" method="post" name="login">

                        <label for="email">Email</label>
                        <input id="input_block" type="text" name="email">

                        <label for="password">Password</label>
                        <input id="input_block" type="password" name="password"> 
                        <input id="btn_block" type="submit" value="Login" style="margin-left:10px;font-weight:bold;"/>
                </form>
            </nav>
        </header>

        <?php

        if(isset($_POST['register'])=== true)

        ?>
        <div class="left"><img src="images/aa.png" alt=""></div>
        <div class="right">
        <h1>Sign Up</h1>
         <form action="" method="post" name="register">
             <input id="text_input" type="text" name="fname" placeholder="First name"> <br />

             <input id="text_input" type="text" name="lname" placeholder="Last name"><br />

             <input id="text_input" type="text" name="email" placeholder="Email"><br />

             <input id="text_input" type="password" name="password" placeholder="Password"><br />

             <input type="button" name="submit" value="Create account" style="font-weight:bold;">
             
         </form>
         
         <hr />
         <span id="footer">&#169; 2016</span>
         
    </div>

    

</body>
</html>