<html>
<head>
<title>
Top 30 Batters by PA: 2005-2010
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
      
<h1>Top 30 Batters by PA: 2005-2010</h1>

<h2>Comparisons to MLB Regulars: Misery Index!</h2>

<p>Are "the grinders" better or worse than the following MLB regulars?</p>

<table>
    <tr>
        <th>Name</th>
        <th>PA</th>
        <th>AB</th>
        <th>H</th>
        <th>2b</th>
        <th>3b</th>
        <th>HR</th>
        <th>BB</th>
        <th>K</th>
        <th>HP</th>
        <th>SB</th>
        <th>CS</th>
        <th>AVG</th>
        <th>OBP</th>
        <th>SLG</th>
    </tr>
    
    <tr>
        <td>Yuniesky Betancourt</td>
        <td>3068</td>
        <td>2901</td>
        <td>785</td>
        <td>162</td>
        <td>24</td>
        <td>47</td>
        <td>104</td>
        <td>277</td>
        <td>7</td>
        <td>26</td>
        <td>25</td>
        <td>.271</td>
        <td>.295</td>
        <td>.392</td>
    </tr>
    
    <tr>
        <td>Jose Lopez</td>
        <td>3607</td>
        <td>3382</td>
        <td>900</td>
        <td>189</td>
        <td>11</td>
        <td>81</td>
        <td>134</td>
        <td>402</td>
        <td>29</td>
        <td>24</td>
        <td>16</td>
        <td>.266</td>
        <td>.297</td>
        <td>.400</td>
    </tr>
</table>

<h2>Park and League-Adjusted (MLE) Stats: The Grinders</h2>

<p>What "the grinders" would have done in a neutral park in MLB.</p>

<table>
    <tr>
        <th>Name</th>
        <th>PA</th>
        <th>AB</th>
        <th>H</th>
        <th>2b</th>
        <th>3b</th>
        <th>HR</th>
        <th>BB</th>
        <th>K</th>
        <th>HP</th>
        <th>SB</th>
        <th>CS</th>
        <th>AVG</th>
        <th>OBP</th>
        <th>SLG</th>
    </tr>

<?php while($row = mysql_fetch_array($playerinfomle)): ?>
    <tr>
        <td><a href="<?php echo site_url('/mlsplits/playerinfo/' . $row['Player']); ?>"><?php echo $row['name']; ?></a></td>
        <td><?php echo $row['PA']; ?></td>
        <td><?php echo $row['AB']; ?></td>
        <td><?php echo $row['H']; ?></td>
        <td><?php echo $row['D']; ?></td>
        <td><?php echo $row['T']; ?></td>
        <td><?php echo $row['HR']; ?></td>
        <td><?php echo $row['W']; ?></td>
        <td><?php echo $row['K']; ?></td>
        <td><?php echo $row['HP']; ?></td>
        <td><?php echo $row['SB']; ?></td>
        <td><?php echo $row['CS']; ?></td>
        <td><?php echo strstr(number_format(@($row['H']/$row['AB']), 3), '.'); ?></td>
        <td><?php echo strstr(number_format((@($row['H']+$row['W']+$row['HP']) / ($row['AB']+$row['W']+$row['HP'])), 3), '.'); ?></td>
        <td><?php echo strstr(number_format((@($row['H']+$row['D']+(2*$row['T'])+(3*$row['HR']))/$row['AB']), 3), '.'); ?></td>
    </tr>

<?php endwhile; ?>
</table>
