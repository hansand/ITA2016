<?php

$sql = 'SELECT  q_no,question, answer FROM faq';
$result = $conn->query($sql);

?>
//////////////////////////////////////////////////<!doctype>
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
