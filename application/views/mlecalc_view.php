<html>
<head>
<title>
Minor League Equivalency calculator
</title>
<link type="text/css" rel="stylesheet" href="http://mlsplits.drivelinebaseball.com/stylesheet/stylesheet.css?v=2">
<script>
function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
</script>
</head>
<body>

<p>Search again, or go <a href="<?php echo site_url('/mlsplits'); ?>">back to home...</a>
<form name="playername" action="<?php echo site_url('/mlsplits/playersearch'); ?>" method="POST">
<input type="text" name="firstname" value="First" onfocus="clearText(this);">
<input type="text" name="lastname" value="Last" onfocus="clearText(this);">
<input type="submit" value="Search">
</form>

<h2>Minor League Equivalency Calculator</h2>

<p>This calculator is straight up taken from Jeff's old minorleaguesplits.com site that I wanted to mirror and make sure it remained running. Here's his description:</p>

<blockquote><code>Enter a player's minor league stats, select his current league and team, and this will spit out equivalent stats at the major league level.
You can also select a team and league for the equivalent stats.  So in addition to traditional MLEs (how would a minor leaguer fare in the majors?), you can see how a player would do
in a different league/level, or in a different park in the same league.</code></blockquote>
 
<p><form name="actual"> 
  <table cellpadding=4> 
    <tr> 
	<th>&nbsp;</th>	
	<th><b>League</b></th> 
        <th><b>Team&nbsp;&nbsp;&nbsp;&nbsp;</b></th> 
	<th><b>AB</b></th> 
	<th><b>R</b></th> 
	<th><b>H</b></th> 
	<th><b>2B</b></th> 
	<th><b>3B</b></th> 
	<th><b>HR</b></th> 
	<th><b>RBI</b></th> 
	<th><b>BB</b></th> 
	<th><b>K</b></th> 
	<th><b>BA</b></th> 
	<th><b>OBP</b></th> 
	<th><b>SLG</b></th> 
	<th><b>SB</b></th> 
	<th><b>CS</b></th> 
	<th><b>HP</b></th> 
 
</tr> 
<tr> 
<td><b>Actual:&nbsp; &nbsp;</b></td> 
<td><select name="leagueStart" onchange="getTeamMenu('start');  calculate();"> 
<option value="">Select Lg</option> 
<option value="PCL">PCL (AAA)</option> 
<option value="IL">IL (AAA)</option> 
<option value="TEX">TEX (AA)</option> 
<option value="SL">SL (AA)</option> 
<option value="EL">EL (AA)</option> 
<option value="FSL">FSL (A+)</option> 
<option value="CAL">CAL (A+)</option> 
<option value="CAR">CAR (A+)</option> 
<option value="MDW">MDW (A)</option> 
<option value="SAL">SAL (A)</option> 
<option value="MLB">MLB</option> 
</select> 
</td> 
<td><span id="startTeam"></span></td> 
<td><input type="text" style="width:30px;" name="ab" onchange="calculate();"></td> 
<td><input type="text" style="width:30px;" name="r" onchange="calculate();"></td> 
<td><input type="text" style="width:30px;" name="h" onchange="calculate();"></td> 
<td><input type="text" style="width:25px;" name="d" onchange="calculate();"></td> 
<td><input type="text" style="width:25px;" name="t" onchange="calculate();"></td> 
<td><input type="text" style="width:25px;" name="hr" onchange="calculate();"></td> 
<td><input type="text" style="width:30px;" name="rbi" onchange="calculate();"></td> 
<td><input type="text" style="width:30px;" name="w" onchange="calculate();"></td> 
<td><input type="text" style="width:30px;" name="k" onchange="calculate();"></td> 
<td>&nbsp;</td> 
<td>&nbsp;</td> 
<td>&nbsp;</td> 
<td><input type="text" style="width:25px;" name="sb" onchange="calculate();"></td> 
<td><input type="text" style="width:25px;" name="cs" onchange="calculate();"></td> 
<td><input type="text" style="width:25px;" name="hp" onchange="calculate();"></td> 
    </tr> 
    <tr> 
      <td>&nbsp;</td> 
    </tr> 
    <tr> 
<td><b>Equivalent:</b></td> 
<td><select name="leagueEnd" onchange="getTeamMenu('end'); calculate();"> 
<option value="MLB">Select Lg</option> 
<option value="MLB">MLB</option> 
<option value="PCL">PCL (AAA)</option> 
<option value="IL">IL (AAA)</option> 
<option value="TEX">TEX (AA)</option> 
<option value="SL">SL (AA)</option> 
<option value="EL">EL (AA)</option> 
<option value="FSL">FSL (A+)</option> 
<option value="CAL">CAL (A+)</option> 
<option value="CAR">CAR (A+)</option> 
<option value="MDW">MDW (A)</option> 
<option value="SAL">SAL (A)</option> 
</select> 
</td> 
<td><span id="endTeam"></span></td> 
<td><input type="text" style="width:30px;" id="eab" readonly="readonly"></td> 
<td><input type="text" style="width:30px;" id="er" readonly="readonly"></td> 
<td><input type="text" style="width:30px;" id="eh" readonly="readonly"></td> 
<td><input type="text" style="width:25px;" id="ed" readonly="readonly"></td> 
<td><input type="text" style="width:25px;" id="et" readonly="readonly"></td> 
<td><input type="text" style="width:25px;" id="ehr" readonly="readonly"></td> 
<td><input type="text" style="width:30px;" id="erbi" readonly="readonly"></td> 
<td><input type="text" style="width:30px;" id="ew" readonly="readonly"></td> 
<td><input type="text" style="width:30px;" id="ek" readonly="readonly"></td> 
<td><input type="text" style="width:40px;" id="eba" readonly="readonly"></td> 
<td><input type="text" style="width:40px;" id="eobp" readonly="readonly"></td> 
<td><input type="text" style="width:40px;" id="eslg" readonly="readonly"></td> 
<td><input type="text" style="width:25px;" id="esb" readonly="readonly"></td> 
<td><input type="text" style="width:25px;" id="ecs" readonly="readonly"></td> 
<td><input type="text" style="width:25px;" id="ehp" readonly="readonly"></td> 
    </tr> 
  </table> 
</form> 
 
<script src="http://mlsplits.drivelinebaseball.com/mlecalc/mlecalc.js"></script>
