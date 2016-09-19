<?php require '../db_connect.php' ?>
<?php require '../common.php'; ?>


      <!--image-->
      <div style="width:100%;height:auto;margin:0;position:absolute;top:0px;">

          <img src="http://localhost/ITA/Pictures/Home%20Page/honda.jpg" width=100%>
          </div>

          <!--Rgester Form-->

    <div id="Register_div">
          <form id="register" action="afterlogin.php" method="post">
            <table align = "center">
              <th><h3> Register Here ......</h3> </th>
              <tr>
                <td> Name : </td>
                <td> <input type="text" name = "name" required>
              </tr>

              <tr>
                <td> Username : </td>
                <td> <input type="text" name="username" required> </td>
              </tr>

              <tr>
                <td> email : </td>
                <td> <input type ="text" name="email" required> </td>
              </tr>
                <tr>
                  <td> Password : </td>
                  <td> <input type = "password" name="pass" required> </td>
                </tr>
                <tr>
                  <td> Hometown </td>
                  <td> <input type="text" name="hometown" required> </td>
                </tr>

                <tr>
                  <td> <input type="submit" name="sign" value ="SIGN UP" required> </td>
                </tr>
            </table>
          </form>
        </div>

        <!--login  form-->

        <div id="login_div">
              <form id="login"  action="afterlogin.php" method="post">
                  <table align = "center">

                      <th> <h3>Login using Your Login Details</h3> </th>
                      <tr>
                          <td> Username: </td>
                          <td> <input type="text" name="log_username"></td>
                        </tr>

                      <tr>
                          <td> Password : </td>
                          <td> <input type="password" name="log_pass" >  </td>
                      </tr>

                      <tr>
                          <td> <input type="submit" name="log_in" > </td>
                      </tr>

                  </table>
              </form>
          </div>

          <div id="fotterg">
            <br/>
              Copyright &copy - 2016 All Right Reserved<br><br>
          </div>


</body>

</html>
