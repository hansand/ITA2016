<?php require 'db_connect.php' ?>

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
          echo '<br>'.'<center>'.'Question Added';
        }
        else
        {
            echo '<br>'.'<center>'.'An Erro occurd While adding the question';

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
                echo '<br>'.'<center/>'.'No Records Found to Delete';
                }
                else
                {
                  $delete = "DELETE FROM faq  WHERE q_no='$q_no'";

                  if(($conn->query($delete) === true))
                  {
                    echo '<br>'.'<center/>'.'Delete Success';
                  }
                  else
                  {
                    echo '<br>'.'<center/>'.'An Erro Occurd While Deleting';
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
                      echo '<br>'.'<center/>'.'No Records Found to Update';
                      }
                      else
                      {
                        $update = "UPDATE faq  SET question='$question',answer='$answer' WHERE q_no='$q_no'";

                        if(($conn->query($update) === true))
                        {
                          echo '<br>'.'<center/>'.'Update Success';
                        }
                        else
                        {
                          echo '<br>'.'<center/>'.'An Erro Occurd While Updating';
                        }
                      }
                  }
                  ?>

                  <?php

                  $sql = 'SELECT  q_no,question, answer FROM faq';
                  $result = $conn->query($sql);

                  ?>



<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" type="text/css" href="http://localhost/ITA/StyleSheets/tables.css" />
    <meta charset="utf-8">
    <title>FAQ Editor</title>
  </head>
  <body>


    <div style="position:absolute;top:50px;left:400px;">
    <!--FAQ add Form-->
    <form  action="faq_editor.php" method="post">
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





            <br><br><br>

              <div style="position:absolute;top:400px;left:400px;width:700px;">
            <table class="table">
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


  </body>
</html>
