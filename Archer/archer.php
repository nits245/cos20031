<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Archery Records" />
  <meta name="keywords"    content="" />
  <meta name="author"      content="nits" />
  <title>Archery Club</title>
  <link href="styles/style.css" rel="stylesheet">
	<script>
      function calculateTotal() {
          let total = 0;
          for (let i = 1; i <= 6; i++) {
              let shotValue = parseInt(document.getElementById('shot' + i).value) || 0;
              total += shotValue;
          }
          document.getElementById('total').innerText = total;
      }
  </script>

</head>


<body>
<?php
      function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
  session_start();
  include("header.inc");  
  if (!$_SESSION["login"]) {
				header("location: login.php");
				exit("Direct access through URL detected. Script execution aborted.");
			}

  else{							
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){        
    echo'<div class="container">';
    echo'<h1>SHOWING ALL ARCHER / RECORD INFO :</h1>';
    require_once("settings.php");
    $connection = @mysqli_connect($host,$user,$pwd,$sql_db);
    if (isset($_POST["button1"]))
       {if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
        $query1 = "SELECT * from Archer ORDER BY ArcherID ASC";
        $result1 = mysqli_query($connection,$query1);
        if (!$result1){echo'<p>something is wrong with query</p>';}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>ArcherID</th>\n";
                      echo"<td>Name</th>\n";
                      echo"<td>Gender</td>\n";
                      echo"<td>Age<td>\n";
                      echo"<td>DivisionID<td>\n";
                      echo"<td>EquipmentTypeID<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result1))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["ArcherID"],"</td>\n";
                      echo"<td>",$row["Name"],"</td>\n";
                      echo"<td>",$row["Gender"],"</td>\n";
                      echo"<td>",$row["Age"],"<td>\n";
                      echo"<td>",$row["DivisionID"],"<td>\n";
                      echo"<td>",$row["EquipmentTypeID"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result1);
             }
        }
      }



    if (isset($_POST["button2"])){
        if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
        $query2 = "SELECT * from Round ORDER BY RoundID";
        $result2 = mysqli_query($connection,$query2);
        if (!$result2){echo"<p>something is wrong with query",$query2,"</p>";}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>RoundID</th>\n";
                      echo"<td>ArcherID</th>\n";
                      echo"<td>TotalArrows</td>\n";
                      echo"<td>Distance<td>\n";
                      echo"<td>TargetFace<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result2))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["RoundID"],"</td>\n";
                      echo"<td>",$row["ArcherID"],"</td>\n";
                      echo"<td>",$row["TotalArrows"],"</td>\n";
                      echo"<td>",$row["Distance"],"<td>\n";
                      echo"<td>",$row["TargetFace"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result2);
                  }
             }
}


    if (isset($_POST["button3"])){
    if (isset($_POST["Name"])){$Name = trim($_POST["Name"]);}
    else{header("location: archer.php");}
    if (isset($_POST["ArcherID"])){$ArcherID = trim($_POST["ArcherID"]);}
    if (isset($_POST["Gender"])){$Gender = trim($_POST["Gender"]);}
    if (isset($_POST["Age"])){$Age = trim($_POST["Age"]);}
         if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
        $query3 = "SELECT * from Archer WHERE ArcherID = '".$ArcherID."' AND  Name = '".$Name."' AND  Gender = '".$Gender."' AND  Age = '".$Age."'";
        $result3 = mysqli_query($connection,$query3);
        if (!$result3){echo"<p>something is wrong with query",$query3,"</p>";}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>ArcherID</th>\n";
                      echo"<td>Name</th>\n";
                      echo"<td>Gender</td>\n";
                      echo"<td>Age<td>\n";
                      echo"<td>DivisionID<td>\n";
                      echo"<td>EquipmentTypeID<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result3))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["ArcherID"],"</td>\n";
                      echo"<td>",$row["Name"],"</td>\n";
                      echo"<td>",$row["Gender"],"</td>\n";
                      echo"<td>",$row["Age"],"<td>\n";
                      echo"<td>",$row["DivisionID"],"<td>\n";
                      echo"<td>",$row["EquipmentTypeID"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result3);
             }
            }
          }



    if (isset($_POST["button4"])){
      if (isset($_POST["RoundID"])){$RoundID = trim($_POST["RoundID"]);}
      else{echo"Enter Round ID";}
              if (!$connection){echo'<p>Error connecting to database.</p>';}
              else{
              $query4b = "DELETE from Round WHERE RoundID ='".$RoundID."'";
              $result4b = mysqli_query($connection,$query4b);
              if (!$result4b){echo"<p>something is wrong with query",$query4b,"</p>";}
              $query4 = "SELECT * from Round";
              $result4 = mysqli_query($connection,$query4);
              if (!$result4){echo"<p>something is wrong with query",$query4,"</p>";}
              else {echo"<table border=\"1\">\n";
                echo"<tr>\n";
                echo"<td>RoundID</th>\n";
                echo"<td>ArcherID</th>\n";
                echo"<td>TotalArrows</td>\n";
                echo"<td>Distance<td>\n";
                echo"<td>TargetFace<td>\n";
                echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result4))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["RoundID"],"</td>\n";
                      echo"<td>",$row["ArcherID"],"</td>\n";
                      echo"<td>",$row["TotalArrows"],"</td>\n";
                      echo"<td>",$row["Distance"],"<td>\n";
                      echo"<td>",$row["TargetFace"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result4);
             }
            }

}
    if (isset($_POST["button5"])){
if (isset($_POST["RoundID"])){$RoundID = trim($_POST["RoundID"]);}
else{echo"Enter Round ID";}
if (isset($_POST["ArcherID"])){$ArcherID = trim($_POST["ArcherID"]);}
else{echo"Write Archer ID";}
if (isset($_POST["TotalArrows"])){$TotalArrows = trim($_POST["TotalArrows"]);}
else{echo"Enter Total Arrows";}
if (isset($_POST["Distance"])){$Distance = trim($_POST["Distance"]);}
else{echo"Enter Distance";}
if (isset($_POST["TargetFace"])){$TargetFace = trim($_POST["TargetFace"]);}
else{echo"Enter Target Face";}

        if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
        $query5b = "INSERT INTO `Round`(`RoundID`, `ArcherID`, `TotalArrows`, `Distance`, `TargetFace`)
        VALUES ('".$RoundID."', '".$ArcherID."', '".$TotalArrows."', '".$Distance."', '".$TargetFace."');";
        $result5b = mysqli_query($connection,$query5b);
        if (!$result5b){echo"<p>something is wrong with query ",$query5b,"</p>";}
        $query5 = "SELECT * from Round ORDER BY RoundID ASC";
        $result5 = mysqli_query($connection,$query5);
        if (!$result5){echo"<p>something is wrong with query",$query5,"</p>";}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>RoundID</th>\n";
                      echo"<td>ArcherID</th>\n";
                      echo"<td>TotalArrows</td>\n";
                      echo"<td>Distance<td>\n";
                      echo"<td>TargetFace<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result5))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["RoundID"],"</td>\n";
                      echo"<td>",$row["ArcherID"],"</td>\n";
                      echo"<td>",$row["TotalArrows"],"</td>\n";
                      echo"<td>",$row["Distance"],"<td>\n";
                      echo"<td>",$row["TargetFace"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result5);
      }
    }
}
    if (isset($_POST["button6"])){$_SESSION["login"]=false;}

    mysqli_close($connection);
    echo"<br><br><br><br><br><br><br><br><br><br><br><br><br></div>";
    }
    else{
    echo'
    <div class="container">

    <h1>Archery club queries</h1>
    
    <fieldset>
    <legend>Archer info:</legend>
    <form method = "post" action="archer.php">
    <p>Show all archer information:</p>
    <input type= "submit" name= "button1" value="Show all info"/>
    </fieldset>
    </form>
    
    <fieldset>
    <legend>Record info:</legend>
    <form method = "post" action="archer.php">
    <p>Show all records:</p>
    <input type= "submit" name="button2" value="Show all records"/>
    </form>
    </fieldset>

    <fieldset>
    <legend>List archer information for a particular applicant:</legend>
    <form method = "post" action="archer.php">
    <p><label for="ArcherID">Archer ID:</label>
    <input type="text" placeholder= "Enter Archer ID" name = "ArcherID" id="ArcherID" required minlength="1" maxlength="10"/>
    <p><label for="Name">Name:</label>
    <input type="text" placeholder= "Enter Name" name = "Name" id="Name" pattern="[A-Za-z]+" minlength="1" maxlength="20" required/>
    <label><input type="radio" name="Gender" required value="Male" /> Male </label>
    <label><input type="radio" name="Gender" value="Female" /> Female </label>
    <label><input type="radio" name="Gender" value="Others" /> Others </label><br>
    <p><label for="Age">Age:</label>
    <input type="text" placeholder= "Enter Age" name = "Age" id="Age" maxlength="3" required/>
    <input type="submit" name = "button3" value="List all information for this applicant">
    </form>
    </fieldset>

    <fieldset>
    <legend>Delete all record for Round ID:</legend>
    <form method = "post" action="archer.php">
    <p><label for="RoundID">Round ID</label>
    <input type="text" name="RoundID" id="RoundID" minlength="0" maxlength="5" placeholder="Must be valid Round ID" required />
    <input type= "submit" name = "button4" value="Delete all data for Round ID"/>
    </form>
    </fieldset>
    
    <fieldset>
    <legend>Add a new record</legend>
    <form method="post" action="archer.php">
    <input type="text" name="RoundID" id="RoundID" minlength="0" maxlength="5" required placeholder="Enter valid Round ID" />
    <input type="text" name="ArcherID" id="ArcherID" minlength="0" maxlength="40" required placeholder="Enter Archer ID" />
    <input type="text" name="TotalArrows" id="TotalArrows" minlength="0" required maxlength="5" placeholder="Enter total arrows shot" />
    <p>Distance(in m) :
    <select name="Distance" id="Distance">
    <option value="10">10</option>
    <option value="20">20</option>
    <option value="30">30</option>
    <option value="40">40</option>
    <option value="50">50</option>
    <option value="60">60</option>
    <option value="70">70</option>
    <option value="80">80</option>
    <option value="90">90</option>
    </select>
    </p>
    <input type="text" name="TargetFace" id="TargetFace" required minlength="0" maxlength="5" placeholder="Enter target face" />
    <input type="submit" name = "button5" value="Add Record">
    </form>
    </fieldset>

    <fieldset>
        <legend>Input Final Score </legend>
        <form method="post" action="submit_scores.php">
	    <label for="scoreID">Arrow ID:</label> 
            <input type="text" id="arrowID" name="arrowID" required><br>

	    <label for="scoreID">End ID:</label> 
            <input type="text" id="endID" name="endID" required><br>

            <label for="roundID">Game ID:</label>
            <input type="text" id="gameID" name="gameID" required><br>

            <label for="archerID">Archer ID:</label>
            <input type="text" id="archerID" name="archerID" required><br>

	    <p><label for="end_number">End Number:</label>
            <input type="text" name="end_number" id="end_number" required minlength="1" maxlength="5" /></p>
                

            <label for="score">Score:</label>
            <input type="number" id="shot1" name="score[]" min="0" max="10" onchange="calculateTotal()" required>
            <input type="number" id="shot2" name="score[]" min="0" max="10" onchange="calculateTotal()" required>
            <input type="number" id="shot3" name="score[]" min="0" max="10" onchange="calculateTotal()" required>
            <input type="number" id="shot4" name="score[]" min="0" max="10" onchange="calculateTotal()" required>
            <input type="number" id="shot5" name="score[]" min="0" max="10" onchange="calculateTotal()" required>
            <input type="number" id="shot6" name="score[]" min="0" max="10" onchange="calculateTotal()" required>
            <br><br>

            <label>Total Score: <span id="total">0</span></label><br><br>

            <input type="submit" name="submit" value="Submit Scores">
        </form>
        </fieldset>


   <fieldset>
    <form method="post" action="logout.php">
    <input type="submit" name = "button6" value="Log Out">
    <br>
    </form>
    </fieldset>
    </div>
    ';}

include("footer.inc");
}
?>
</body>
</html>
