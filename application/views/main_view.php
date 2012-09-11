<p>Here's where you find out all sorts of neat splits, major league equivalencies, and park effects for minor league baseball players. Want to know more? Click the links above to
toggle info boxes on this page.</p>

<p><strong>News (9/10/2012)</strong>: MLsplits is a dead project. Good news, though: You can bring it back to life. All data and source code has been made available on GitHub. Go to work, 
my friends. I would love to see it live on.</p>

<h2>Search for a Player</h2>

<div id="validation">
    <?php echo validation_errors(); ?>
</div>

<div id="warning"></div>

<p><strong>New!</strong> <a href="<?php echo site_url('/mlsplits/mlecalc'); ?>">MLE Calculator</a>: Roll your own MLEs for minor league players for 2011 that aren't in my database (yet).</p>
<p>Hot searches: <a href="<?php echo site_url('/mlsplits/playerinfo/519058'); ?>">Mike Moustakas</a>, <a href="<?php echo site_url('/mlsplits/playerinfo/452121'); ?>">Brent Lillibridge</a>,
<a href="<?php echo site_url('/mlsplits/playerinfo/475174'); ?>">Yonder Alonso</a>, <a href="<?php echo site_url('/mlsplits/playerinfo/502082'); ?>">Lonnie Chisenhall</a>...</p>
<p>Fun reports: <a href="<?php echo site_url('/mlsplits/top30batters'); ?>">The minor league grinders: Top 30 Batters (by PA) from 2005-2010</a></p>

<form name="playername" action="<?php echo site_url('/mlsplits/playersearch'); ?>" method="POST">
<strong>First Name</strong><br />
<input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" onfocus="clearText(this);"><br/>
<strong>Last Name</strong><br />
<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" onfocus="clearText(this);"><br/>
<input type="submit" value="Search">
</form>

<?php if(@$players): ?>

<table id="players">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Bats</th>
        <th>Throws</th>
        <th>Birthdate</th>
        <th>Splits</th>
    </tr>
    
    <?php while($row = mysql_fetch_array($players)): ?>
    
    <tr>
        <td><?php echo $row['First']; ?></td>
        <td><?php echo $row['Last']; ?></td>
        <td><?php echo $row['Bats']; ?></td>
        <td><?php echo $row['Throws']; ?></td>
        <td><?php echo $row['M']; ?>-<?php echo $row['D']; ?>-<?php echo $row['Y']; ?></td>
        <td><a href="playerinfo/<?php echo $row['MLBAM']; ?>" title="Click for more information..."><img src="../images/stats.gif" width="30" height="30"></a></td>
    </tr>
    
    <?php endwhile; ?>
    
</table>

<?php endif; ?>

<div id="stufftoknow">

<h2>Stuff You Should Know About this Data</h2>

<p>This website is a visual representation of the open source data that Jeff Sackmann has graciously provided on his site, <a href="minorleaguesplits.com">minorleaguesplits.com</a>. We have
abided by all the rules he set forth via the <a href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons license he used</a>. At least, we think so. If we screwed up,
please let us know. Very little - basically none - of the information on this site was originally derived by <a href="http://www.kyleboddy.com">Kyle Boddy</a> and/or
<a href="http://www.drivelinebaseball.com">Driveline Baseball</a>. We just transformed the data into a neat interface for people to check out.
However, we are working on independently deriving MLEs, including pitcher stats.</p>

<p>The data spans from 2005-2010, because, well, that's what Jeff made available. We're also making the files we used on this site
available as a free download. Pick up the <a href="http://www.drivelinebaseball.com/files/drivebb_minorleague.rar">full SQL dump (33 MB) in RAR format</a>. The SQL dump is how I arranged the CSV files
and is not Jeff's schema. Don't contact him for technical support on this product.</p>

<p>You may notice data missing from pages. If so, please contact me - kyle at drivelinebaseball dot com. However, please note that <strong>Rookie league and Short-Season A ball is intentionally omitted</strong>
from park effects and MLEs. So don't email me about that.</p>

<ul>
<li>All data comes from <a href="http://www.minorleaguesplits.com/">minorleaguesplits.com open source data files</a>. Thanks, Jeff.</li>
<li>MLE's are calculated using the league factors and formulas that Sean Smith shared with Jeff Sackmann.</li>
<li>Minor league park factors are Dan Szymborski's, and MLB's are those published at baseball-reference.com. NW Arkansas, Lehigh Valley, Gwinnett Stadium, Midland (Texas), and Richmond (EL) are assumed to be neutral.
I didn't park-adjust walks or strikeouts. Because Jeff didn't either.</li>
<li>FAQ: Why does the number of at-bats change? I hold plate appearances constant, so if walks or HBPs change, ABs change as well.</li>
</ul>
</div>

<div id="release">

<h2>Release Notes, FAQ, Other Stuff</h2>

<ul>
    <li><strong>9/10/2012</strong>: I cannot update this site anymore. However, you can get all the code and data for free, if you like - on GitHub!</li>
	<li><strong>6/29/2011</strong>: Added some more AdSense stuff. Added titles on the player info pages. Added an MLE calculator.</li>
    <li><strong>5/11/2011</strong>: Annoying graphic removed. Still figuring out how to do the data warehousing for 2011+ stats.</li>
    <li><strong>4/19/2011</strong>: Header change, Facebox.js used for pop-ups.</li>
    <li><strong>4/8/2011</strong>: Thanks to Mike Fast's suggestions, I found where MiLB box score and play-by-play data lives in XML format. I am going to point my MLB PITCHf/x scrapers/parsers at it and see if I can't figure something out going forward.</li>
    <li><strong>4/6/2011</strong>: FIP/xFIP updated with correct minor league constants, thanks to <strong>Phildo</strong>'s work. (<a href="https://spreadsheets.google.com/ccc?key=0AoIZJPw-V5n2dEgzdjNkS1lPUXBpTjE0R3NvcG1uSWc&hl=en&authkey=CO6EjeoD">source data</a>)</li>
    <li><strong>4/4/2011</strong>: Pitchers are now available on the site. MLEs are <strong>VERY TENTATIVE</strong>. Additionally, IP is NOT ADJUSTED for MLEs as of yet. FIP/xFIP uses
    3.20 as the constant in the equation. This is wrong. Accumulating minor league average component data is tough and I will need volunteers to make this more precise. Look for an announcement soon.</li>
</ul>

<p>Stuff I am thinking about adding:</p>

<ul>
    <li>Graphs to show league average performance vs. Major League Equivalents (MLE) of the player in question.</li>
    <li>Trends to show who people are searching for.</li>
</ul>
</div>