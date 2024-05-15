
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Job Application" />
  <meta name="keywords"    content="HTML, CSS" />
  <meta name="author"      content="Joshua Jasin" />
  <title>Job Application</title>
  <link href="styles/style.css" rel="stylesheet">
  <style>
</style>
</head>
<body> 
<?php 
include("header.inc");
include("menu.inc");
?>
<div class="container">
  <h1>Join Our Team!</h1>
  <p>Afer reading our stunning work opportunities. Nows your chance to enroll in! </p>
  <p>(Before applying please double check our job descriptions page and come back with the job code!).</p>
  <form method = "post" action="https://mercury.swin.edu.au/it000000/formtest.php">
   <fieldset>
    <legend>Job Code:</legend>
    <p><label for="ArcherID">Archer ID</label>
<input type="text" name="ArcherID" id="ArcherID" minlength="1" maxlength="6" placeholder="Enter a valid Archer ID." required pattern="(#AB12|#XZ34)" />
	</fieldset>
        <fieldset>
        <legend>Archer Information:</legend>
    <p><label for="Name">First name:</label>
    <input type="text" name = "Name" id="Name" pattern="[A-Za-z]+" maxlength="20" required/>
    <p><label for="Gender">Gender:</label>
    <input type="text" name = "Gender" id="Gender" pattern="[A-Za-z]+" maxlength="20" required/>
    <p><label for="Age">Age:</label>
    <input type="text" name = "Age" id="Age" maxlength="3" required/>
   <p><label for="DivisionID">Division ID:</label>
    <input type="text" name = "DivisionID" id="DivisionID"  maxlength="5" required/>
   <p><label for="EquipmentTypeID">Equipment Type ID:</label>
    <input type="text" name = "EquipmentTypeID" id="EquipmentTypeID" maxlength="5" required/>
    <label for="state">State:</label>
  <select name="state" id="state" required>
    <option value="" disabled selected hidden>Please Select</option>
    <option value="Victoria">VIC</option>
    <option value="New South Wales">NSW</option>
    <option value="Queensland">QLD</option>
    <option value="Nothern Territory">NT</option>
    <option value="Westen Australia">WA</option>
    <option value="Southern Australia">SA</option>
    <option value="Tasmania">TAS</option>
    <option value="Australian Capital Territory">ACT</option>
  </select>
        </fieldset>
	<fieldset>
	<legend>Gender:</legend>
<div class = "gender">
  <label><input type="radio" name="gender" required value="male" /> Male </label>
</div>

<div class = "gender">
  <label><input type="radio" name="gender" value="female" /> Female </label>
</div>

<div class = "gender">
  <label><input type="radio" name="gender" value="other" /> Other </label>
</div>
  </fieldset>
  <fieldset>
  <legend>Contact Information:</legend>
  <p><label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <p><label for="pNumber">Phone Number:</label>
  <input type="text" name = "pNumber" id="pNumber" pattern="^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{1}( |-){0,1}[0-9]{3}$" maxlength="12" required placeholder="(+61) or (04)"/>
  </fieldset>
  <fieldset>
  <legend>Skills</legend>
<input type="checkbox" id="skill1" name="skill" class="skill-checkbox">
<label for="skill1"> Minimum of 3 years of Coding experience</label><br>
<input type="checkbox" id="skill2" name="skill" class="skill-checkbox" value="skill2">
<label for="skill2">Minimum knowledge of 3 coding languages</label><br>
<input type="checkbox" id="skill3" name="skill" class="skill-checkbox" value="skill3">
<label for="skill3">Past job experiences</label><br>
<input type="checkbox" id="skill4" name="skill" class="skill-checkbox" value="Other">
<label for="skill4">Other</label>
<br>
<textarea name="issue"
rows="5" cols="40">
Write description of unique skills not listed here...
</textarea>
  </fieldset>
  	<input type= "submit" value="Apply"/>
	<input type= "reset" value="Reset Form"/>
  </form>
</div>
<?php
include("footer.inc");
?>
</body>
</html>
