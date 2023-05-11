<?php
/*
* Assignment 9
* Name: Kush Gandhi
* z1968933
* CSCI 466-PE1
* 4/7/23
* 
*/

include 'secrets.php';

//establish the connection to database
  try {
    $dsn = "mysql:host=courses;dbname=z1968933";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
  }

  //1. prints out all information about s in a table
  $sql = $pdo->query("SELECT * FROM S;");
  $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

  echo "<table border = 1 cellspacing = 1>";
  foreach($rows as $row) {
    echo "<tr>";
    echo "<td>" . $row["S"] . "</td>";
    echo "<td>" . $row["SNAME"] . "</td>";
    echo "<td>" . $row["SSTATUS"] . "</td>";
    echo "<td>" . $row["CITY"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

  //2. shows all parts and details about it
  $sql2 = $pdo->query("SELECT * FROM P;");
  $rows1 = $sql2->fetchAll(PDO::FETCH_ASSOC);
  
  echo "<table border = 1 cellspacing = 1>";
  foreach($rows1 as $row1) {
    echo "<tr>";
    echo "<td>" . $row1["P"] . "</td>";
    echo "<td>" . $row1["PNAME"] . "</td>";
    echo "<td>" . $row1["COLOR"] . "</td>";
    echo "<td>" . $row1["WEIGHT"] . "</td>";
  }
  echo "</table>";

  //3. selects a part and display the supplier as well as how many parts
  echo "<form method = 'POST' action='Assignmnet9.php'>";
  echo "<label for='part'>Enter Part name:</label>";
  echo "<input type='text' name='part'>";
  echo "<input type='submit' value='submit'>";
  echo "</form>";

  $part = $_POST["part"];
  $sql3 = $pdo->prepare("SELECT SNAME FROM S JOIN SP ON S.S = SP.S JOIN P ON P.P = SP.P WHERE PNAME = '.$part.';");
  $sql3->execute();

  //4. selects a supplier and displya information
  echo "<form method='POST' action-'Assignment9.php'>";
  echo "<label for='supplier'>Enter Supplier name:</label>";
  echo "<input type='text' name='supplier'>";
  echo "<input type='submit' value='submit'>";
  echo "</form>";

  $supplier = $_POST["supplier"];
  $sql4 = $pdo->prepare("SELECT PNAME FROM P JOIN SP ON SP.P = SP.QTY;");
  $sql4->execute();
  echo "<br><br>";

  //5. allows the user to select a supplier and buy some number of parts
  echo "<form method='POST' action='Assignmnet9.php'>";
  echo "Select part and supplier:";
  echo "<select name='part'>";
  echo "<option value='P1'>Nut</option>";
  echo "<option value='P2'>Bolt</option>";
  echo "<option value='P3'>Screw</option>";
  echo "<option value='P4'>Screw</option>";
  echo "<option value='P5'>Cam</option>";
  echo "<option value='P6'>Cog</option>";
  echo "</select>";

  echo "<select name='supplier'>";
  echo "<option value='S1'>Smith</option>";
  echo "<option value='S2'>Jones</option>";
  echo "<option value='S3'>Blake</option>";
  echo "<option value='S4'>Clark</option>";
  echo "<option value='S5'>Adams</option>";
  echo "</select>";

  echo "Enter Quantity";
  echo "<input type='number' name='qty'>";
  echo "<input type='submit' value='submit'>";
  echo "<br><br>";

  $partName = $_POST['part'];
  $supplierName = $_POST['supplier'];
  $qty = $_POST['qty'];
  $sql5 = $pdo->prepare("UPDATE SP SET QTY = QTY - $qty WHERE SP.S = $supplierName AND SP.P = $partName;");
  $sql5->execute();

  //6. a form that adds a new part into the databse
  echo "<form method='POST' action='Assignmnet9.php'>";
  echo "P:";
  echo "<input type='text' name='id'>";
  echo "part name:";
  echo "<input type='text' name='pname'>";
  echo "color:";
  echo "<input type='text' name='color'>";
  echo "weight:";
  echo "<input type='text' name='weight'>"; 
  echo "<input type='submit' value='add part'>";
  echo "</form";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $p = $_POST["p"];
    $pname = $_POST["pname"];
    $color = $_POST["color"];
    $weight = $_POST["weight"];
    $sql6 = $pdo->prepare("INSERT INTO P (P, PNAME, COLOR, WEIGHT) VALUES (".$p.", ".$pname.", ".$color.", ".$weight.");");
    $sql6->execute();
  }
  echo "<br><br>";

  //7. allows the user to choose a supplier and part and quantity
  echo "<form method='POST' action='Assignmnet9.php'>";
  echo "Add and select part and supplier:";
  echo "<select name='part'>";
  echo "<option value='P'>Nut</option>";
  echo "<option value='P2'>Bolt</option>";
  echo "<option value='P3'>Screw</option>";
  echo "<option value='P4'>Screw</option>";
  echo "<option value='P5'>Cam</option>";
  echo "<option value='P6'>Cog</option>";
  echo "</select>";

  echo "<select name='supplier'>";
  echo "<option value='S'>Smith</option>";
  echo "<option value='S2'>Jones</option>";
  echo "<option value='S3'>Blake</option>";
  echo "<option value='S4'>Clark</option>";
  echo "<option value='S5'>Adams</option>";
  echo "</select>";

  echo "<input type='text' name='qty'>";

  $parts = $_POST['part'];
  $suppliers = $_POST['supplier'];
  $qtys = $_POST['qty'];
  $sql7 = $pdo->prepare("INSERT INTO SP (S, P, QTY) VALUES (".$parts.", ".$suppliers.", ".$qtys.");");
  $sql7->execute();
?>