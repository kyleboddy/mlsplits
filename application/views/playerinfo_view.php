<html>
<head>
<?php while($row = mysql_fetch_array($playername)): ?>
<title>
Information for <?php echo $row['playername']; ?> - MLBAMID <?php echo $mlbamid; ?>
</title>
<link type="text/css" rel="stylesheet" href="http://mlsplits.drivelinebaseball.com/stylesheet/stylesheet.css?v=2">
<script>
function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#rawplatoontog').click(function() {
      $('.raw_vLeft').toggle('fast', function() {
        // Animation complete.
      });
      $('.raw_vRight').toggle('fast', function() {
        // Animation complete.
      });
    });
    
    $('#rawpitcherplatoontog').click(function() {
      $('.raw_pitcher_vLeft').toggle('fast', function() {
        // Animation complete.
      });
      $('.raw_pitcher_vRight').toggle('fast', function() {
        // Animation complete.
      });
    });
    
    $('#parkplatoontog').click(function() {
      $('.park_vLeft').toggle('fast', function() {
        // Animation complete.
      });
      $('.park_vRight').toggle('fast', function() {
        // Animation complete.
      });
    });
    
    $('#parkpitcherplatoontog').click(function() {
      $('.park_pitcher_vLeft').toggle('fast', function() {
        // Animation complete.
      });
      $('.park_pitcher_vRight').toggle('fast', function() {
        // Animation complete.
      });
    });
    
    $('#mleplatoontog').click(function() {
      $('.mle_vLeft').toggle('fast', function() {
        // Animation complete.
      });
      $('.mle_vRight').toggle('fast', function() {
        // Animation complete.
      });
    });
    
    $('#mlepitcherplatoontog').click(function() {
      $('.mle_pitcher_vLeft').toggle('fast', function() {
        // Animation complete.
      });
      $('.mle_pitcher_vRight').toggle('fast', function() {
        // Animation complete.
      });
    });
    
});
</script>
</head>
<body>
    
    <p>Search again, or go <a href="<?php echo site_url('/mlsplits'); ?>">back to home...</a>
    <form name="playername" action="<?php echo site_url('/mlsplits/playersearch'); ?>" method="POST">
<input type="text" name="firstname" value="First" onfocus="clearText(this);">
<input type="text" name="lastname" value="Last" onfocus="clearText(this);">
<input type="submit" value="Search">
</form>
    </p>
    
    <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fmlsplits.drivelinebaseball.com&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:23px;" allowTransparency="true"></iframe>
    
    <h1>Player Information for: <?php echo $row['playername']; ?></h1>
    <p>Bats: <?php echo $row['Bats']; ?> Throws: <?php echo $row['Throws']; ?><br />
    Birthdate: <?php echo $row['birthdate']; ?><br>
    <a href="http://web.minorleaguebaseball.com/milb/stats/stats.jsp?pos=OF&sid=milb&t=p_pbp&pid=<?php echo $mlbamid; ?>" target="_new">Official MiLB.com Page</a></p>
<?php endwhile; ?>

<h2>League Averages</h2>

<p>These are the average batted ball rates (2005-2010) for the leagues which this player played in!</p>

<table>
    <tr>
        <th>League</th>
        <th>Sample</th>
        <th>GB</th>
        <th>LD</th>
        <th>FB</th>
        <th>PU</th>
        <th>AVG</th>
        <th>OBP</th>
        <th>SLG</th>
    </tr>
<?php if(@$leagues): ?>
<?php foreach($leagues as $key => $value): ?>
<?php while($row = mysql_fetch_array($leagues[$key])): ?>

    <tr>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo number_format($row['AB']); ?></td>
        <td><?php echo number_format($row['GBrate'], 3)*100; ?>%</td>
        <td><?php echo number_format($row['LDrate'], 3)*100; ?>%</td>
        <td><?php echo number_format($row['FBrate'], 3)*100; ?>%</td>
        <td><?php echo number_format($row['PUrate'], 3)*100; ?>%</td>
        <td><?php echo strstr(number_format($row['AVG'], 3), '.'); ?></td>
        <td><?php echo strstr(number_format($row['OBP'], 3), '.'); ?></td>
        <td><?php echo strstr(number_format($row['SLG'], 3), '.'); ?></td>
    </tr>

<?php endwhile; ?>
<?php endforeach; ?>
<?php endif; ?>
</table>

<p>Wondering why batted ball data doesn't always add up to 100%? Rounding is part of the answer, but poor record keeping and/or errors in collection are the primary reasons. The same goes
for raw stat discrepancies between our site (Jeff Sackmann's data) and Baseball-Reference or MiLB.com. There are no plans to fix these "problems" as they are fairly minor in nature.</p>

<script type="text/javascript"><!--
google_ad_client = "ca-pub-5867685030817617";
/* ML Splits Interspersed Ad */
google_ad_slot = "6058589797";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<h2>Raw Stats</h2>

<p>What the player did.</p>

<?php if(@mysql_num_rows($playerinfo) > 0): ?>
<h3>Hitting Stats</h3>
<a id="rawplatoontog" href="javascript:void(0)">Show/Hide Platoon Splits</a>

<table>
    <tr>
        <th>Year</th>
        <th>Team</th>
        <th>League</th>
        <th>Level</th>
        <th>Split</th>
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
        <th>GB</th>
        <th>LD</th>
        <th>FB</th>
        <th>PU</th>
        <th>AVG</th>
        <th>OBP</th>
        <th>SLG</th>
    </tr>
       
<?php while($row = mysql_fetch_array($playerinfo)): ?>
    <tr class="raw_<?php echo $row['Split']; ?>">
        <td><?php echo $row['Year']; ?></td>
        <td><?php echo $row['Team']; ?></td>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo $row['Level']; ?></td>
        <td><?php echo $row['Split']; ?></td>
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
        <td><?php echo number_format(@($row['GB']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo number_format(@($row['LD']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo number_format(@($row['FB']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo number_format(@($row['PU']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo strstr(number_format(@($row['H']/$row['AB']), 3), '.'); ?></td>
        <td><?php echo strstr(number_format((@($row['H']+$row['W']+$row['HP']) / ($row['AB']+$row['W']+$row['HP'])), 3), '.'); ?></td>
        <td><?php echo strstr(number_format((@($row['H']+$row['D']+(2*$row['T'])+(3*$row['HR']))/$row['AB']), 3), '.'); ?></td>
    </tr>
<?php endwhile; ?>
</table>
<br/>
<?php endif; ?>


<?php if(@mysql_num_rows($pitcherinfo) > 0): ?>
<h3>Pitching Stats</h3>
<a id="rawpitcherplatoontog" href="javascript:void(0)">Show/Hide Platoon Splits</a>
<table>
    <tr>
        <th>Year</th>
        <th>Team</th>
        <th>League</th>
        <th>Level</th>
        <th>Split</th>
        <th>IP</th>
        <th>H</th>
        <th>2b</th>
        <th>3b</th>
        <th>HR</th>
        <th>BB</th>
        <th>IBB</th>
        <th>K</th>
        <th>HP</th>
        <th>GB</th>
        <th>LD</th>
        <th>FB</th>
        <th>PU</th>
        <th>FIP</th>
        <th>xFIP</th>
    </tr>

<?php while($row = mysql_fetch_array($pitcherinfo)): ?>
    <tr class="raw_pitcher_<?php echo $row['Split']; ?>">
        <td><?php echo $row['Year']; ?></td>
        <td><?php echo $row['Team']; ?></td>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo $row['Level']; ?></td>
        <td><?php echo $row['Split']; ?></td>
        <td><?php echo $row['IP']; ?></td>
        <td><?php echo $row['H']; ?></td>
        <td><?php echo $row['D']; ?></td>
        <td><?php echo $row['T']; ?></td>
        <td><?php echo $row['HR']; ?></td>
        <td><?php echo $row['W']; ?></td>
        <td><?php echo $row['IW']; ?></td>
        <td><?php echo $row['K']; ?></td>
        <td><?php echo $row['HP']; ?></td>
        <td><?php echo number_format(@($row['GB']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo number_format(@($row['LD']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo number_format(@($row['FB']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo number_format(@($row['PU']/($row['AB']-$row['K'])), 3)*100; ?>%</td>
        <td><?php echo $row['FIP']; ?></td>
        <td><?php echo $row['xFIP']; ?></td>
    </tr>
<?php endwhile; ?>
</table>
<?php endif; ?>
<p>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5867685030817617";
/* ML Splits Interspersed Ad */
google_ad_slot = "6058589797";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>
<h2>Park-Adjusted Stats</h2>

<p>What the player would have done in a neutral park in his league. No park adjustments are available for short-season leagues or many Low-A parks.</p>
<?php if(@mysql_num_rows($playerinfopark) > 0): ?>
<h3>Hitting Stats</h3>
<a id="parkplatoontog" href="javascript:void(0)">Show/Hide Platoon Splits</a>

<table>
    <tr>
        <th>Year</th>
        <th>Team</th>
        <th>League</th>
        <th>Level</th>
        <th>Split</th>
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

<?php while($row = mysql_fetch_array($playerinfopark)): ?>
    <tr class="park_<?php echo $row['Split']; ?>">
        <td><?php echo $row['Year']; ?></td>
        <td><?php echo $row['Team']; ?></td>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo $row['Level']; ?></td>
        <td><?php echo $row['Split']; ?></td>
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
<br/>
<?php endif; ?>

<?php if(@mysql_num_rows($pitcherinfopark) > 0): ?>
<h3>Pitching Stats</h3>
<a id="parkpitcherplatoontog" href="javascript:void(0)">Show/Hide Platoon Splits</a>
<table>
    <tr>
        <th>Year</th>
        <th>Team</th>
        <th>League</th>
        <th>Level</th>
        <th>Split</th>
        <th>IP</th>
        <th>H</th>
        <th>2b</th>
        <th>3b</th>
        <th>HR</th>
        <th>BB</th>
        <th>IBB</th>
        <th>K</th>
        <th>HP</th>
        <th>FIP</th>
        <th>xFIP</th>
    </tr>

<?php while($row = mysql_fetch_array($pitcherinfopark)): ?>
    <tr class="park_pitcher_<?php echo $row['Split']; ?>">
        <td><?php echo $row['Year']; ?></td>
        <td><?php echo $row['Team']; ?></td>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo $row['Level']; ?></td>
        <td><?php echo $row['Split']; ?></td>
        <td><?php echo $row['IP']; ?></td>
        <td><?php echo $row['H']; ?></td>
        <td><?php echo $row['D']; ?></td>
        <td><?php echo $row['T']; ?></td>
        <td><?php echo $row['HR']; ?></td>
        <td><?php echo $row['W']; ?></td>
        <td><?php echo $row['IW']; ?></td>
        <td><?php echo $row['K']; ?></td>
        <td><?php echo $row['HP']; ?></td>
        <td><?php echo $row['FIP']; ?></td>
        <td><?php echo $row['xFIP']; ?></td>
    </tr>
<?php endwhile; ?>
</table>
<?php endif; ?>
<p>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5867685030817617";
/* ML Splits Interspersed Ad */
google_ad_slot = "6058589797";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>
<h2>Park and League-Adjusted (MLE) Stats</h2>

<p>What the player would have done in a neutral park in MLB. For pitchers, IP is NOT properly adjusted and MLE factors are <strong>very</strong> experimental. And FIP/xFIP is not yet
calculated for MLE totals. xFIP for MLEs also assumes the pitcher will have the same amount of fly balls. This is probably wrong.</p>

<?php if(@mysql_num_rows($playerinfomle) > 0): ?>
<h3>Hitting Stats</h3>
<a id="mleplatoontog" href="javascript:void(0)">Show/Hide Platoon Splits</a>

<table>
    <tr>
        <th>Year</th>
        <th>Team</th>
        <th>League</th>
        <th>Level</th>
        <th>Split</th>
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
    <tr class="mle_<?php echo $row['Split']; ?>">
        <td><?php echo $row['Year']; ?></td>
        <td><?php echo $row['Team']; ?></td>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo $row['Level']; ?></td>
        <td><?php echo $row['Split']; ?></td>
        <td><?php echo $row['PA']; ?></td>
        <td><?php echo $row['newAB']; ?></td>
        <td><?php echo $row['H']; ?></td>
        <td><?php echo $row['D']; ?></td>
        <td><?php echo $row['T']; ?></td>
        <td><?php echo $row['HR']; ?></td>
        <td><?php echo $row['W']; ?></td>
        <td><?php echo $row['K']; ?></td>
        <td><?php echo $row['HP']; ?></td>
        <td><?php echo $row['SB']; ?></td>
        <td><?php echo $row['CS']; ?></td>
        <td><?php echo strstr(number_format(@($row['H']/$row['newAB']), 3), '.'); ?></td>
        <td><?php echo strstr(number_format((@($row['H']+$row['W']+$row['HP']) / ($row['newAB']+$row['W']+$row['HP'])), 3), '.'); ?></td>
        <td><?php echo strstr(number_format((@($row['H']+$row['D']+(2*$row['T'])+(3*$row['HR']))/$row['newAB']), 3), '.'); ?></td>
    </tr>

<?php endwhile; ?>

<?php while($row = mysql_fetch_array($playertotalmle)): ?>

<tr class="mle_<?php echo $row['Split']; ?>">
        <td><strong>Total</strong></td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td><?php echo $row['Split']; ?></td>
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
<br/>
<?php endif; ?>

<?php if(@mysql_num_rows($pitcherinfomle) > 0): ?>
<h3>Pitching Stats</h3>
<a id="mlepitcherplatoontog" href="javascript:void(0)">Show/Hide Platoon Splits</a>
<table>
    <tr>
        <th>Year</th>
        <th>Team</th>
        <th>League</th>
        <th>Level</th>
        <th>Split</th>
        <th>IP</th>
        <th>H</th>
        <th>2b</th>
        <th>3b</th>
        <th>HR</th>
        <th>BB</th>
        <th>IBB</th>
        <th>K</th>
        <th>HP</th>
        <th>FIP</th>
        <th>xFIP</th>
    </tr>

<?php while($row = mysql_fetch_array($pitcherinfomle)): ?>
    <tr class="mle_pitcher_<?php echo $row['Split']; ?>">
        <td><?php echo $row['Year']; ?></td>
        <td><?php echo $row['Team']; ?></td>
        <td><?php echo $row['League']; ?></td>
        <td><?php echo $row['Level']; ?></td>
        <td><?php echo $row['Split']; ?></td>
        <td><?php echo $row['IP']; ?></td>
        <td><?php echo $row['H']; ?></td>
        <td><?php echo $row['D']; ?></td>
        <td><?php echo $row['T']; ?></td>
        <td><?php echo $row['HR']; ?></td>
        <td><?php echo $row['W']; ?></td>
        <td><?php echo $row['IW']; ?></td>
        <td><?php echo $row['K']; ?></td>
        <td><?php echo $row['HP']; ?></td>
        <td><?php echo $row['FIP']; ?></td>
        <td><?php echo $row['xFIP']; ?></td>
    </tr>
<?php endwhile; ?>

<?php while($row = mysql_fetch_array($pitchertotalmle)): ?>

<tr class="mle_pitcher_<?php echo $row['Split']; ?>">
        <td><strong>Total</strong></td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td><?php echo $row['Split']; ?></td>
        <td><?php echo $row['IP']; ?></td>
        <td><?php echo $row['H']; ?></td>
        <td><?php echo $row['D']; ?></td>
        <td><?php echo $row['T']; ?></td>
        <td><?php echo $row['HR']; ?></td>
        <td><?php echo $row['W']; ?></td>
        <td><?php echo $row['IW']; ?></td>
        <td><?php echo $row['K']; ?></td>
        <td><?php echo $row['HP']; ?></td>
        <td>---</td>
        <td>---</td>
</tr>
    
<?php endwhile; ?>
</table>
<?php endif; ?>