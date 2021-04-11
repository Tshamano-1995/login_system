<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
        <form class="" action="login.php" method="post">
            <div class="container">
            
                <label for="">Sign Up</label>
                <input type="text" name="email" placeholder="Email" value="">
                <input type="password" name="password" placeholder="password" value="">
                <a href="#"> forget password?</a>
                <button type="submit" class="btn" name="log">Login</button>
                <?php
            $con = mysqli_connect("localhost", "root", "","logindb");
            if (isset($_POST['log'])){
                $username = mysqli_real_escape_string($con,$_POST['email']);
                $passwd = mysqli_real_escape_string($con,$_POST['password']);


                if ($username!="" && $passwd!=""){
                    $sql="SELECT id FROM login WHERE username='$username' and passwd='$passwd'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                    $count = mysqli_num_rows($result);
                    if ($count==1){
                        header("location:index.html");
                        
                         
                    }else{
                        echo "<center><h2>please enter correct details!</h2></center>";

                    }
                }else{
                    echo "<center><h2>please enter Username & Password</h2></center>";

                }

            }
        ?>

            </div>
        </form>
    </body>
</html>