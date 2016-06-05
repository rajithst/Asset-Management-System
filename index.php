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
            <a class="logo" title="asset" href="index.html"><span>Asset Management System</span></a>

            <nav>
                <form action="" method="post" name="login">

                        <label for="email">Email</label>
                        <input type="text" name="email">

              <label for="password">password</label>
             <input type="password" name="password"> 
                </form>
            </nav>
    </header>

        <?php

        if(isset($_POST['register'])=== true)




        ?>






        <div class="left"><img src="images/aa.png" alt=""></div>
        <div class="right">
        <h1>Sign Up for free</h1>
         <form action="" method="post" name="register">
             <label for="fname">First name</label>
             <input type="text" name="fname"> <br>

             <label for="lname">Lirst name</label>
             <input type="text" name="lname"><br>

             <label for="email">Email</label>
             <input type="text" name="email"><br> 

              <label for="password">password</label>
             <input type="password" name="password"> <br>

             <input type="button" name="submit" value="Register">





         </form>
    </div>



</body>
</html>