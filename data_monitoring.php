<!DOCTYPE html>
<html>
<head>
  <title>monitoring</title>
</head>
<body>
  <?php
  include("header.php");
  ?>
  <h2 align="center">DATA MONITORING</h2>
  <table border="1" align="center" width="100%">
    <tr border="1" align="center" bgcolor="Aqua">
      <th >No</th>
      <th>waktu</th>
      <th>suhu</th>
      <th>pH</th>
      <th>kekeruhan</th>
      <th>kontrol</th>
    </tr>
    <?php 
      include "koneksi.php";
      $query = mysqli_query($koneksi, "SELECT * FROM tb_sensor");
      while ($data = mysqli_fetch_array($query)) {
    ?>

      <tr>
        <td border="1" align="center"><?php echo ($data['id']); ?></td>
        <td border="1" align="center"><?php echo ($data['waktu']); ?></td>
        <td border="1" align="center"><?php echo ($data['suhu']); ?></td>
        <td border="1" align="center"><?php echo ($data['pH']); ?></td>
        <td border="1" align="center"><?php echo ($data['kekeruhan']); ?></td>
        <td border="1" align="center"><?php echo ($data['kontrol']); ?></td>
      </tr>
    <?php
      } // End of while loop
    ?>
  </table>
</body>
</html>

<?php
  include("footer.php");
  ?> 