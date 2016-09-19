<?php require 'template/header.php'; ?>


                  <!-- Print User Details in Page -->
                  <?php

                  $sql = 'SELECT  full_name,user_name,email,pass,home_town FROM users';
                  $result = $conn->query($sql);

                  ?>



                <div class="user-dashboard">
                    <h1 style="text-align:left;"> User Deatils</h1>
                    <div class="row">
                    </div>



                    <!--User Details  table-->
                     <div class="col-md-6">
                        <table class="table table-hover">
                          <tr>
                            <th width=50px>Full Name </th>
                            <th width=400px> Username</th>
                            <th width=400px> email </th>
                            <th width=400px> Password </th>
                             <th width=400px> Home Town </th>
                          </tr>

                        <!--Print Data on admin page-->
                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                        ?>

                          <tr class="tr">
                            <td class="td"><?php echo $row['full_name']; ?> </td>
                            <td class="td"><?php echo $row['username']; ?></td>
                            <td class="td"><?php echo $row['email']; ?>  </td>
                            <td class="td"><?php echo $row['pass']; ?>  </td>
                            <td class="td"><?php echo $row['home_town']; ?>  </td>
                          </tr>


                          <?php   }  } ?> <!-- ende user details printin-->
                        </table>
                      </div>

                      <!--user management-->

                      <div class="col-md-6">
                        <form method="post" action="user_detail.php">
                            <table>
                              <th><h2>User Management</h2> </th>
                              <tr>
                                <th><br><br><br><br></th>
                              </tr>

                              <tr>
                                <th> User Name : </th>
                                <th> <input type="text" name="mange_user" > </th>
                              </tr>

                              <tr>
                                <th> <br> <br> <input type="submit" name="delete_user" value="Delete This User" >

                                  <input type="submit" name = "make_admin"  value="Make as Admin"> </th>
                              </tr>

                            </table>
                        </form>

                            <!-- USER DELETING METHOD -->

                            <?php

                          
                                  if(isset($_POST["delete_user"]))
                                  {
                                    $username = $_POST["mange_user"];
                                    $isavailble = "SELECT user_name FROM users WHERE user_name='$mange_user'";

                                    if(mysqli_num_rows($conn->query($isavailble)) == 0 )
                                      {
                                      echo '<br>'.'<center/>'.'<p style="color:red;">'.'No Users Found to Remove';
                                      }
                                      else
                                      {
                                        $delete = "DELETE FROM users  WHERE user_name='$mange_user'";

                                        if(($conn->query($delete) === true))
                                        {
                                          echo '<br>'.'<center/>'.'<p style="color:red;">'.'User'.'$mange_user'.' Removed Succesfully';
                                        }
                                        else
                                        {
                                          echo '<br>'.'<center/>'.'<p style="color:red;">'.'An Erro Occurd While Removing thr User';
                                        }
                                      }
                                  }
                                  ?>
                      </div>


                </div>
<?php require 'template/footer.php'; ?>
