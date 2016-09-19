<?php require 'template/header.php'; ?>

<!--adding data to Database -->
<?php
      if(isset($_POST["add"]))
      {
        $question = $_POST["question"];
        $answer = $_POST["ans"];
        $q_no = $_POST["q_no"];
        $insert = "INSERT INTO faq (q_no,question,answer) VALUES ('$q_no','$question','$answer')";

        if(($conn->query($insert) === true))
        {
          echo '<br>'.'<center/>'.'<p style="color:red;">'.'Question Added';
        }
        else
        {
            echo '<br>'.'<center/>'.'<p style="color:red;">'.'An Erro occurd While adding the question';

        }
      }
      ?>

      <!--Deleting data from Database -->
      <?php
            if(isset($_POST["delete"]))
            {
              $question = $_POST["question"];
              $answer = $_POST["ans"];
              $q_no = $_POST["q_no"];
              $isavailble = "SELECT q_no FROM faq WHERE q_no='$q_no'";

              if(mysqli_num_rows($conn->query($isavailble)) == 0 )
                {
                echo '<br>'.'<center/>'.'<p style="color:red;">'.'No Records Found to Delete';
                }
                else
                {
                  $delete = "DELETE FROM faq  WHERE q_no='$q_no'";

                  if(($conn->query($delete) === true))
                  {
                    echo '<br>'.'<center/>'.'<p style="color:red;">'.'Delete Success';
                  }
                  else
                  {
                    echo '<br>'.'<center/>'.'<p style="color:red;">'.'An Erro Occurd While Deleting';
                  }
                }
            }
            ?>


            <!--Updating data in Database -->
            <?php
                  if(isset($_POST["update"]))
                  {
                    $question = $_POST["question"];
                    $answer = $_POST["ans"];
                    $q_no = $_POST["q_no"];
                    $isavailble = "SELECT q_no FROM faq WHERE q_no='$q_no'";

                    if(mysqli_num_rows($conn->query($isavailble)) == 0 )
                      {
                      echo '<br>'.'<center/>'.'<p style="color:red;">'.'No Records Found to Update';
                      }
                      else
                      {
                        $update = "UPDATE faq  SET question='$question',answer='$answer' WHERE q_no='$q_no'";

                        if(($conn->query($update) === true))
                        {
                          echo '<br>'.'<center/>'.'<p style="color:red;">'.'Update Success';
                        }
                        else
                        {
                          echo '<br>'.'<center/>'.'<p style="color:red;">'.'An Erro Occurd While Updating';
                        }
                      }
                  }
                  ?>

                  <?php

                  $sql = 'SELECT  q_no,question, answer FROM faq';
                  $result = $conn->query($sql);

                  ?>

                <div class="user-dashboard">
                    <h1 style="text-align:left;"> Admin Panel</h1>
                    <div class="row">
                       <div class="col-md-6">

                    <!--FAQ add Form-->
                    <form  action="faq.php" method="post">
                      <table >
                        <tr>
                          <td> question no: </td>
                          <td> <input name="q_no" type="text" >
                        <tr>
                          <td> Question : </td>
                          <td> <textarea name="question" type="text" rows="8" cols="40" ></textarea> </td>
                        </tr>

                        <tr>
                          <td> Answer :</td>
                          <td> <textarea name="ans" type="text" rows="8" cols="40" ></textarea></td>
                        </tr>

                        <tr>
                          <td><input type="submit" name="add" value="Add This Question "/> </td>
                            <td> <input type="submit" name="update" value = "Update the Question"/>
                            <input type="submit" name="delete" value = "Delete the Question"/></td>
                        </tr>
                      </table>
                        </form>
                    </div>
                     <div class="col-md-6">
                        <table class="table table-hover">
                          <tr>
                            <th width=50px>Qustion no</th>
                            <th width=400px> Question </th>
                            <th width=400px> Answere </th>
                          </tr>

                        <!--Print Data on admin page-->
                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                              

                        ?>

                          <tr class="tr">
                            <td class="td"><?php echo $row['q_no']; ?> </td>
                            <td class="td"><?php echo $row['question']; ?></td>
                            <td class="td"><?php echo $row['answer']; ?>  </td>
                          </tr>


                          <?php   }  } ?>
                        </table>
                      </div>

                    </div>
                </div>
<?php require 'template/footer.php'; ?>
