<?php require '../db_connect.php' ?>
<?php require '../common.php'; ?>

      <!--image-->
      <div style="width:100%;height:auto;margin:0;position:absolute;top:0px;">

          <img src="http://localhost/ITA/Pictures/Home%20Page/honda.jpg" width=100%>
          </div>

          <div style="position:absolute;left:400px;top:100px;color:rgba(255,255,255,1);">
            <?php
                  if(isset($_POST["sign"]))
                  {
                    $name = $_POST["name"];
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password=$_POST["pass"];
                    $home = $_POST["hometown"];
                    $chekuser =  "SELECT user_name FROM users WHERE user_name='$username'";
                    $chekemail= "SELECT email FROM users WHERE email='$email'" ;

                    if( mysqli_num_rows($conn->query($chekuser)) == 0  & mysqli_num_rows ($conn->query($chekemail)) == 0) //checking avalabilty
                    {
                        $insert = "INSERT INTO users (full_name,user_name,email,pass,home_town) VALUES ('$name','$username','$email','$password','$home')";

                        if(($conn->query($insert) === true))
                        {
                            echo '<br>'.'<center/>'.'<p style="color:red;">'.'Successfully Signed UP';
                        }
                        else
                        {
                          echo '<br>'.'<center/>'.'<p style="color:red;">'.'Erro Login';

                        }
                      }
                    else
                     {
                      echo "username or password exist" ;
                     }
                   }
                  ?>


            <!--login -->
            <?php

            if(isset($_POST['log_in']))
            {
              $log_user = $_POST['log_username'];
              $log_pass = $_POST['log_pass'];

              $chekuser  =  "SELECT user_name FROM users WHERE user_name='$username'";
              $chekemail = "SELECT email FROM users WHERE email='$email'" ;

              if( mysqli_num_rows($conn->query($chekuser)) == 0  & mysqli_num_rows ($conn->query($chekemail)) == 0) //checking avalabilty
              {
                echo "sucseesFully Logged";
              }
              else {
                echo "Incorect User Name or Password";
              }
            }
            ?>
          </div>

          <div id="fotterg">
            <br/>
              Copyright &copy - 2016 All Right Reserved<br><br>
          </div>


</body>

</html>
