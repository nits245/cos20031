<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Management" />
  <meta name="keywords"    content="HTML, CSS,PHP" />
  <meta name="author"      content="nits" />
  <title>Job Application</title>
  <link href="styles/style.css" rel="stylesheet">
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
  include("menu.inc");
  
  if (!$_SESSION["login"]) {
				header("location: login.php");
				exit("Direct access through URL detected. Script execution aborted.");
			}

  else{							
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){        
    echo'<div class="container2">';
    echo'<h1>Manager query results</h1>';
    require_once("settings.php");
    $connection = @mysqli_connect($host,$user,$pwd,$sql_db);
    if (isset($_POST["button1"]))
       {if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{

        $query1 = "SELECT * from eoi";
        $result1 = mysqli_query($connection,$query1);
        if (!$result1){echo'<p>something is wrong with query</p>';}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>EOInumber</th>\n";
                      echo"<td>Job_reference_number</th>\n";
                      echo"<td>First_Name</td>\n";
                      echo"<td>Last_Name<td>\n";
                      echo"<td>Street_address<td>\n";
                      echo"<td>Suburb_or_town<td>\n";
                      echo"<td>State<td>\n";
                      echo"<td>Date_of_Birth<td>\n";
                      echo"<td>Postcode<td>\n";
                      echo"<td>Gender<td>\n";
                      echo"<td>Email_address<td>\n";
                      echo"<td>Phone_number<td>\n";
                      echo"<td>skills<td>\n";
                      echo"<td>Other_skills<td>\n";
                      echo"<td>Status<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result1))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["EOInumber"],"</td>\n";
                      echo"<td>",$row["Job_reference_number"],"</td>\n";
                      echo"<td>",$row["First_name"],"</td>\n";
                      echo"<td>",$row["Last_name"],"<td>\n";
                      echo"<td>",$row["Street_address"],"<td>\n";
                      echo"<td>",$row["Suburb_or_town"],"<td>\n";
                      echo"<td>",$row["State"],"<td>\n";
                      echo"<td>",$row["Date_of_Birth"],"<td>\n<br>";
                      echo"<td>",$row["Postcode"],"<td>\n";
                      echo"<td>",$row["Gender"],"<td>\n";
                      echo"<td>",$row["Email_address"],"<td>\n";
                      echo"<td>",$row["Phone_number"],"<td>\n";
                      echo"<td>",$row["Skills"],"<td>\n";
                      echo"<td>",$row["Other_skills"],"<td>\n";
                      echo"<td>",$row["Status"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result1);
             }
        }
      }



    if (isset($_POST["button2"])){
        if (isset($_POST["jID"])){$jID = trim($_POST["jID"]);}
        if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
        $query2 = "SELECT * from eoi WHERE Job_reference_number = '".$jID."'";
        $result2 = mysqli_query($connection,$query2);
        if (!$result2){echo"<p>something is wrong with query",$query2,"</p>";}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>EOInumber</td>\n";
                      echo"<td>Job_reference_number</td>\n";
                      echo"<td>First_Name</td>\n";
                      echo"<td>Last_Name<td>\n";
                      echo"<td>Street_address<td>\n";
                      echo"<td>Suburb_or_town<td>\n";
                      echo"<td>State<td>\n";
                      echo"<td>Date_of_Birth<td>\n";
                      echo"<td>Postcode<td>\n";
                      echo"<td>Gender<td>\n";
                      echo"<td>Email_address<td>\n";
                      echo"<td>Phone_number<td>\n";
                      echo"<td>skills<td>\n";
                      echo"<td>Other_skills<td>\n";
                      echo"<td>Status<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result2))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["EOInumber"],"</td>\n";
                      echo"<td>",$row["Job_reference_number"],"</td>\n";
                      echo"<td>",$row["First_name"],"</td>\n";
                      echo"<td>",$row["Last_name"],"<td>\n";
                      echo"<td>",$row["Street_address"],"<td>\n";
                      echo"<td>",$row["Suburb_or_town"],"<td>\n";
                      echo"<td>",$row["State"],"<td>\n";
                      echo"<td>",$row["Date_of_Birth"],"<td>\n";
                      echo"<td>",$row["Postcode"],"<td>\n";
                      echo"<td>",$row["Gender"],"<td>\n";
                      echo"<td>",$row["Email_address"],"<td>\n";
                      echo"<td>",$row["Phone_number"],"<td>\n";
                      echo"<td>",$row["Skills"],"<td>\n";
                      echo"<td>",$row["Other_skills"],"<td>\n";
                      echo"<td>",$row["Status"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result2);
                  }
             }
}


    if (isset($_POST["button3"])){
    if (isset($_POST["Fname"])){$Fname = trim($_POST["Fname"]);}
    else{header("location: manage.php");}
    if (isset($_POST["Lname"])){$Lname = trim($_POST["Lname"]);}
    else{header("location: manage.php");}
        if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
          $querys = "";
          $askin = array();
          if ($Fname!=""){array_push($askin,"First_Name='".$Fname."'");}
          if ($Lname!=""){array_push($askin,"Last_Name='".$Lname."'");}
          
          if (count($askin)==1){$querys="$askin[0]";}
          elseif (count($askin)==2){$querys=$askin[0]." and ".$askin[1];}
          if ($querys == ""){echo"<p>Enter a first name or last name.</p>";}
        $query3 = "SELECT * from eoi WHERE $querys";
        $result3 = mysqli_query($connection,$query3);
        if (!$result3){echo"<p>something is wrong with query",$querys,"</p>";}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>EOInumber</th>\n";
                      echo"<td>Job_reference_number</th>\n";
                      echo"<td>First_Name</td>\n";
                      echo"<td>Last_Name<td>\n";
                      echo"<td>Street_address<td>\n";
                      echo"<td>Suburb_or_town<td>\n";
                      echo"<td>State<td>\n";
                      echo"<td>Date_of_Birth<td>\n";
                      echo"<td>Postcode<td>\n";
                      echo"<td>Gender<td>\n";
                      echo"<td>Email_address<td>\n";
                      echo"<td>Phone_number<td>\n";
                      echo"<td>skills<td>\n";
                      echo"<td>Other_skills<td>\n";
                      echo"<td>Status<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result3))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["EOInumber"],"</td>\n";
                      echo"<td>",$row["Job_reference_number"],"</td>\n";
                      echo"<td>",$row["First_name"],"</td>\n";
                      echo"<td>",$row["Last_name"],"<td>\n";
                      echo"<td>",$row["Street_address"],"<td>\n";
                      echo"<td>",$row["Suburb_or_town"],"<td>\n";
                      echo"<td>",$row["State"],"<td>\n";
                      echo"<td>",$row["Date_of_Birth"],"<td>\n";
                      echo"<td>",$row["Postcode"],"<td>\n";
                      echo"<td>",$row["Gender"],"<td>\n";
                      echo"<td>",$row["Email_address"],"<td>\n";
                      echo"<td>",$row["Phone_number"],"<td>\n";
                      echo"<td>",$row["Skills"],"<td>\n";
                      echo"<td>",$row["Other_skills"],"<td>\n";
                      echo"<td>",$row["Status"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result3);
             }
            }
          }



    if (isset($_POST["button4"])){
               if (isset($_POST["jID"])){$jID = trim($_POST["jID"]);}
              else{header("location: manage.php");}
              if (!$connection){echo'<p>Error connecting to database.</p>';}
              else{
              $query4b = "DELETE from eoi WHERE Job_reference_number ='".$jID."'";
              $result4b = mysqli_query($connection,$query4b);
              if (!$result4b){echo"<p>something is wrong with query",$query4b,"</p>";}
              $query4 = "SELECT * from eoi";
              $result4 = mysqli_query($connection,$query4);
              if (!$result4){echo"<p>something is wrong with query",$query4,"</p>";}
              else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>EOInumber</td>\n";
                      echo"<td>Job_reference_number</td>\n";
                      echo"<td>First_Name</td>\n";
                      echo"<td>Last_Name<td>\n";
                      echo"<td>Street_address<td>\n";
                      echo"<td>Suburb_or_town<td>\n";
                      echo"<td>State<td>\n";
                      echo"<td>Date_of_Birth<td>\n";
                      echo"<td>Postcode<td>\n";
                      echo"<td>Gender<td>\n";
                      echo"<td>Email_address<td>\n";
                      echo"<td>Phone_number<td>\n";
                      echo"<td>skills<td>\n";
                      echo"<td>Other_skills<td>\n";
                      echo"<td>Status<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result4))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["EOInumber"],"</td>\n";
                      echo"<td>",$row["Job_reference_number"],"</td>\n";
                      echo"<td>",$row["First_name"],"</td>\n";
                      echo"<td>",$row["Last_name"],"<td>\n";
                      echo"<td>",$row["Street_address"],"<td>\n";
                      echo"<td>",$row["Suburb_or_town"],"<td>\n";
                      echo"<td>",$row["State"],"<td>\n";
                      echo"<td>",$row["Date_of_Birth"],"<td>\n";
                      echo"<td>",$row["Postcode"],"<td>\n";
                      echo"<td>",$row["Gender"],"<td>\n";
                      echo"<td>",$row["Email_address"],"<td>\n";
                      echo"<td>",$row["Phone_number"],"<td>\n";
                      echo"<td>",$row["Skills"],"<td>\n";
                      echo"<td>",$row["Other_skills"],"<td>\n";
                      echo"<td>",$row["Status"],"<td>\n";
                      echo"</tr>\n";
                    }
                 echo"</table>\n";
                 mysqli_free_result($result4);
             }
            }




}
    if (isset($_POST["button5"])){
if (isset($_POST["status"])){$status = trim($_POST["status"]);}
else{echo"Choose status";}
if (isset($_POST["EOInumber"])){$EOInumber = trim($_POST["EOInumber"]);}
else{echo"Write an EOI number";}

        if (!$connection){echo'<p>Error connecting to database.</p>';}
        else{
        $query5b = "UPDATE eoi SET Status='".$status."' WHERE EOInumber= ".$EOInumber." ";
        $result5b = mysqli_query($connection,$query5b);
        if (!$result5b){echo"<p>something is wrong with query",$query5b,"</p>";}
        $query5 = "SELECT * from eoi";
        $result5 = mysqli_query($connection,$query5);
        if (!$result5){echo"<p>something is wrong with query",$query5,"</p>";}
        else {echo"<table border=\"1\">\n";
                      echo"<tr>\n";
                      echo"<td>EOInumber</td>\n";
                      echo"<td>Job_reference_number</td>\n";
                      echo"<td>First_Name</td>\n";
                      echo"<td>Last_Name<td>\n";
                      echo"<td>Street_address<td>\n";
                      echo"<td>Suburb_or_town<td>\n";
                      echo"<td>State<td>\n";
                      echo"<td>Date_of_Birth<td>\n";
                      echo"<td>Postcode<td>\n";
                      echo"<td>Gender<td>\n";
                      echo"<td>Email_address<td>\n";
                      echo"<td>Phone_number<td>\n";
                      echo"<td>skills<td>\n";
                      echo"<td>Other_skills<td>\n";
                      echo"<td>Status<td>\n";
                      echo"</tr>\n";
              while ($row = mysqli_fetch_assoc($result5))
                    {
                      echo"<tr>\n";
                      echo"<td>",$row["EOInumber"],"</td>\n";
                      echo"<td>",$row["Job_reference_number"],"</td>\n";
                      echo"<td>",$row["First_name"],"</td>\n";
                      echo"<td>",$row["Last_name"],"<td>\n";
                      echo"<td>",$row["Street_address"],"<td>\n";
                      echo"<td>",$row["Suburb_or_town"],"<td>\n";
                      echo"<td>",$row["State"],"<td>\n";
                      echo"<td>",$row["Date_of_Birth"],"<td>\n";
                      echo"<td>",$row["Postcode"],"<td>\n";
                      echo"<td>",$row["Gender"],"<td>\n";
                      echo"<td>",$row["Email_address"],"<td>\n";
                      echo"<td>",$row["Phone_number"],"<td>\n";
                      echo"<td>",$row["Skills"],"<td>\n";
                      echo"<td>",$row["Other_skills"],"<td>\n";
                      echo"<td>",$row["Status"],"<td>\n";
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

    <h1>Manager query</h1>


    
    <fieldset>
    <legend>List all EOIS:</legend>
    <form method = "post" action="manage.php">
    <p>List all the expression of interests here:</p>
    <input type= "submit" name= "button1" value="List all EOI"/>
    </fieldset>
    </form>
    
    <fieldset>
    <legend>List out according to job reference number:</legend>
    <form method = "post" action="manage.php">
    <p><label for="jID">Job reference number</label>
    <input type="text" name="jID" id="jID" minlength="0" maxlength="5" placeholder="Must be valid Job number" required pattern="(#AB12|#XZ34)" />
    <input type= "submit" name="button2" value="List all EOI for Reference number"/>
    </form>
    </fieldset>



    <fieldset>
    <legend>List EOIs for a particular applicant:</legend>
    <form method = "post" novalidate="novalidate" action="manage.php">
    <p><label for="Fname">First name:</label>
    <input type="text" name = "Fname" id="Fname" pattern="[A-Za-z]+" maxlength="20" required/>
    <p><label for="Lname">Last name:</label>
    <input type="text" name = "Lname" id="Lname" pattern="[A-Za-z]+" maxlength="20" required/>
    <input type="submit" name = "button3" value="List all EOIs for this applicant">
    </form>
    </fieldset>



    <fieldset>
    <legend>Delete all EOIs for job reference number:</legend>
    <form method = "post" action="manage.php">
    <p><label for="jID">Job reference number</label>
    <input type="text" name="jID" id="jID" minlength="0" maxlength="5" placeholder="Must be valid Job number" required pattern="(#AB12|#XZ34)" />
    <input type= "submit" name = "button4" value="Delete all EOIs for Reference number"/>
    </form>
    </fieldset>
    
    

    <fieldset>
    <legend>Change status of an EOI</legend>
    <form method="post" action="manage.php">
    <input type="text" name="EOInumber" id="EOInumber" minlength="0" maxlength="5" placeholder="Enter valid EOI number" />
    <label><input type="radio" name="status" required value="New" /> New </label>
    <label><input type="radio" name="status" value="Current" /> Current </label>
    <label><input type="radio" name="status" value="Final" /> Final </label><br>
    <input type="submit" name = "button5" value="Change status">
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
