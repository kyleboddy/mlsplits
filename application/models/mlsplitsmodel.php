<?php

class mlsplitsmodel extends CI_Model {

    function _construct()
    {
          // Call the Model constructor
          parent::_construct();
    }
    
    // connect to a database
    function dbsetup($db = NULL)
    {
        // connect to the database
		// MUST BE POPULATED
        $link = mysql_connect("", "", "");
        
        if (!$link) {
            die(mysql_error());
        }
        
        if($db)
        {
            // select the database
            mysql_select_db($db);
        }
    }
    
    // takes array, loops through it to insert into database - foreach key/value pair
    // use for basic key/value loop
    function dbinsert($tablename, $fieldlist, $valuelist)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $fields = NULL;
        $values = NULL;
        
        foreach($fieldlist as $key => $value)
        { $fields .= $value . ','; }
        
        // trim commas
        $fields = substr($fields,0,-1);
        
        foreach($valuelist as $key => $value)
        {
            if(is_array($value))
               $value = implode('\', \'', $value);
               
            $values = "'" . $key ."'". ', ' . "'". $value . "'";
            $query = 'INSERT INTO ' . $tablename . ' (' . $fields . ') VALUES (' . $values . ')' . ";";
            echo $query;
            echo "<br>";
        }
        
    }
    
    // takes mlbamid (integer), returns playername (mysql object)
    function playername($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT CONCAT(players.First, ' ', players.Last) as playername, players.Bats, players.Throws, CONCAT(players.M, '-', players.D, '-', players.Y) as birthdate
        FROM players WHERE players.MLBAM = '" .mysql_real_escape_string($mlbamid) . "'";
        
        $result = mysql_query($query);
        
        return $result;
    }
    
    // takes mlbamid (integer), returns player data (mysql object)
    function playerquery($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT battersbackup.Player, battersbackup.Year, battersbackup.Team, battersbackup.Split, battersbackup.AB, battersbackup.H, battersbackup.D, battersbackup.T, battersbackup.HR, battersbackup.W, battersbackup.HP, 
                    battersbackup.K, battersbackup.GB, battersbackup.LD, battersbackup.FB, battersbackup.PU, battersbackup.SB, battersbackup.CS, leagues.Level, teams.League,
		    (battersbackup.AB + battersbackup.W + battersbackup.HP) as PA FROM battersbackup 
                    JOIN teams on battersbackup.Team = teams.TeamID
                    JOIN leagues on teams.League = leagues.LeagueID
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
                    
    }
    
    function pitcherquery($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT pitchers.Player, pitchers.Year, pitchers.Team, pitchers.Split, pitchers.AB, pitchers.IP, pitchers.H, pitchers.D, pitchers.T, pitchers.HR, pitchers.W, pitchers.IW, pitchers.HP, 
                    pitchers.K, pitchers.GB, pitchers.LD, pitchers.FB, pitchers.PU, leagues.Level, teams.League,
		    (pitchers.AB + pitchers.W + pitchers.HP) as PA,
		    ROUND((HR*13+(W+HP-IW)*3-K*2)/IP+constants.constant,2) as FIP,
		    ROUND(((FB*.11)*13+(W+HP-IW)*3-K*2)/IP+constants.constant, 2) as xFIP
			 FROM pitchers 
                    JOIN teams on pitchers.Team = teams.TeamID
                    JOIN leagues on teams.League = leagues.LeagueID
                    JOIN constants on (constants.LeagueID = leagues.LeagueID AND pitchers.Year = constants.Year)
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
    }
    
    // takes mlbamid (integer), returns player data (mysql object)
    function parkadjpitcherquery($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT pitchers.Player, pitchers.Year, pitchers.Team, pitchers.IP, pitchers.Split, pitchers.AB,
		ROUND((pitchers.H * parkmults.h)) as H, ROUND((pitchers.D * parkmults.d)) as D, ROUND((pitchers.T * parkmults.d)) as T, ROUND((pitchers.HR * parkmults.hr)) as HR,
		 pitchers.W, pitchers.IW, pitchers.HP, pitchers.K, leagues.Level, teams.League,
		 (pitchers.AB + pitchers.W + pitchers.HP) as PA, 
		 	 ROUND((ROUND((pitchers.HR * parkmults.hr))*13+(W+HP-IW)*3-K*2)/IP+constants.constant,2) as FIP,
			 ROUND(((FB*.11)*13+(W+HP-IW)*3-K*2)/IP+constants.constant, 2) as xFIP 
			 FROM pitchers 
                    JOIN parkmults on parkmults.park = pitchers.Team
                    JOIN teams on pitchers.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
		    JOIN constants on (constants.LeagueID = leagues.LeagueID AND pitchers.Year = constants.Year)
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
                    
    }
    
    function mletotalpitcherquery($mlbamid)
    {
	// connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT pitchers.Player, pitchers.Year, pitchers.Split, pitchers.AB, ROUND(SUM(pitchers.IP), 1) as IP,
		SUM(ROUND((pitchers.H / parkmults.h / pow(lgmults.mult,0.4)))) as H, 
		SUM(ROUND((pitchers.D / parkmults.d / pow(lgmults.mult,0.5)))) as D,
		 SUM(ROUND((pitchers.T / parkmults.d / pow(lgmults.mult,0.75)))) as T, 
		 SUM(ROUND((pitchers.HR / parkmults.hr / pow(lgmults.mult,0.75)))) as HR,
       SUM(ROUND((pitchers.W / pow(lgmults.mult,0.75)))) as W,
       SUM(ROUND((pitchers.IW / pow(lgmults.mult,0.75)))) as IW,
       SUM(ROUND((pitchers.HP / pow(lgmults.mult,0.75)))) as HP,
       SUM(ROUND((pitchers.K * pow(lgmults.mult,0.2)))) as K, 
		 leagues.Level, teams.League,
		 (pitchers.AB + pitchers.W + pitchers.HP) as PA,
		 SUM(((pitchers.AB + pitchers.W + pitchers.HP) - ROUND((pitchers.W * pow(lgmults.mult,0.75))) - ROUND((pitchers.HP * pow(lgmults.mult,0.75))))) as newAB
		  FROM pitchers 
                    JOIN parkmults on parkmults.park = pitchers.Team
                    JOIN teams on pitchers.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
                    GROUP BY Split
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
    }
    
    // takes mlbamid (integer), returns player data (mysql object)
    function parkadjplayerquery($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT battersbackup.Player, battersbackup.Year, battersbackup.Team, battersbackup.Split, battersbackup.AB,
		ROUND((battersbackup.H / parkmults.h)) as H, ROUND((battersbackup.D / parkmults.d)) as D, ROUND((battersbackup.T / parkmults.d)) as T, ROUND((battersbackup.HR / parkmults.hr)) as HR,
		 battersbackup.W, battersbackup.HP, battersbackup.K, battersbackup.SB, battersbackup.CS, leagues.Level, teams.League,
		 (battersbackup.AB + battersbackup.W + battersbackup.HP) as PA FROM battersbackup 
                    JOIN parkmults on parkmults.park = battersbackup.Team
                    JOIN teams on battersbackup.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
                    
    }
    
        // takes mlbamid (integer), returns player data (mysql object)
    function mleadjplayerquery($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT battersbackup.Player, battersbackup.Year, battersbackup.Team, battersbackup.Split, battersbackup.AB,
		ROUND((battersbackup.H / parkmults.h * pow(lgmults.mult,0.4))) as H, 
		ROUND((battersbackup.D / parkmults.d * pow(lgmults.mult,0.5))) as D,
		 ROUND((battersbackup.T / parkmults.d * pow(lgmults.mult,0.75))) as T, 
		 ROUND((battersbackup.HR / parkmults.hr * pow(lgmults.mult,0.75))) as HR,
       ROUND((battersbackup.W * pow(lgmults.mult,0.75))) as W,
       ROUND((battersbackup.HP * pow(lgmults.mult,0.75))) as HP,
       ROUND((battersbackup.K / pow(lgmults.mult,0.2))) as K, 
		 ROUND((battersbackup.SB * pow(lgmults.mult,0.5))) as SB, 
		 ROUND((battersbackup.CS / pow(lgmults.mult,0.25))) as CS, 
		 leagues.Level, teams.League,
		 (battersbackup.AB + battersbackup.W + battersbackup.HP) as PA,
		 ((battersbackup.AB + battersbackup.W + battersbackup.HP) - ROUND((battersbackup.W * pow(lgmults.mult,0.75))) - ROUND((battersbackup.HP * pow(lgmults.mult,0.75)))) as newAB
		  FROM battersbackup 
                    JOIN parkmults on parkmults.park = battersbackup.Team
                    JOIN teams on battersbackup.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
                    
    }
    
        // takes mlbamid (integer), returns player data (mysql object)
    function mleadjpitcherquery($mlbamid)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT pitchers.Player, pitchers.Year, pitchers.Team, pitchers.Split, pitchers.AB, pitchers.IP,
		ROUND((pitchers.H / parkmults.h / pow(lgmults.mult,0.4))) as H, 
		ROUND((pitchers.D / parkmults.d / pow(lgmults.mult,0.5))) as D,
		 ROUND((pitchers.T / parkmults.d / pow(lgmults.mult,0.75))) as T, 
		 ROUND((pitchers.HR / parkmults.hr / pow(lgmults.mult,0.75))) as HR,
       ROUND((pitchers.W / pow(lgmults.mult,0.75))) as W,
       ROUND((pitchers.IW / pow(lgmults.mult,0.75))) as IW,
       ROUND((pitchers.HP / pow(lgmults.mult,0.75))) as HP,
       ROUND((pitchers.K * pow(lgmults.mult,0.2))) as K, 
		 leagues.Level, teams.League,
		 (pitchers.AB + pitchers.W + pitchers.HP) as PA,
		 ((pitchers.AB + pitchers.W + pitchers.HP) - ROUND((pitchers.W * pow(lgmults.mult,0.75))) - ROUND((pitchers.HP * pow(lgmults.mult,0.75)))) as newAB,
		 	 ROUND((ROUND((pitchers.HR / parkmults.hr / pow(lgmults.mult,0.75)))*13+(ROUND((pitchers.W / pow(lgmults.mult,0.75)))+ROUND((pitchers.HP / pow(lgmults.mult,0.75)))-ROUND((pitchers.IW / pow(lgmults.mult,0.75))))*3-ROUND((pitchers.K * pow(lgmults.mult,0.2)))*2)/IP+constants.constant,2) as FIP,
		    ROUND(((FB*.11)*13+(ROUND((pitchers.W / pow(lgmults.mult,0.75)))+ROUND((pitchers.HP / pow(lgmults.mult,0.75)))-ROUND((pitchers.IW / pow(lgmults.mult,0.75))))*3-ROUND((pitchers.K * pow(lgmults.mult,0.2)))*2)/IP+constants.constant, 2) as xFIP 
		  FROM pitchers 
                    JOIN parkmults on parkmults.park = pitchers.Team
                    JOIN teams on pitchers.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
                    JOIN constants on (constants.LeagueID = leagues.LeagueID AND pitchers.Year = constants.Year)
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
                    
    }
    
    
    function mletotalquery($mlbamid)
    {
	// connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT battersbackup.Player, battersbackup.Split, 
		SUM(ROUND((battersbackup.H / parkmults.h * pow(lgmults.mult,0.4)))) as H, 
		SUM(ROUND((battersbackup.D / parkmults.d * pow(lgmults.mult,0.5)))) as D,
		 SUM(ROUND((battersbackup.T / parkmults.d * pow(lgmults.mult,0.75)))) as T, 
		 SUM(ROUND((battersbackup.HR / parkmults.hr * pow(lgmults.mult,0.75)))) as HR,
       SUM(ROUND((battersbackup.W * pow(lgmults.mult,0.75)))) as W,
       SUM(ROUND((battersbackup.HP / pow(lgmults.mult,0.75)))) as HP,
       SUM(ROUND((battersbackup.K / pow(lgmults.mult,0.2)))) as K, 
		 SUM(ROUND((battersbackup.SB * pow(lgmults.mult,0.5)))) as SB, 
		 SUM(ROUND((battersbackup.CS / pow(lgmults.mult,0.25)))) as CS, 
		 SUM((battersbackup.AB + battersbackup.W + battersbackup.HP)) as PA,
		 SUM(((battersbackup.AB + battersbackup.W + battersbackup.HP) - ROUND((battersbackup.W * pow(lgmults.mult,0.75))) - ROUND((battersbackup.HP * pow(lgmults.mult,0.75))))) as AB
		  FROM battersbackup 
                    JOIN parkmults on parkmults.park = battersbackup.Team
                    JOIN teams on battersbackup.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
                    WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
                    AND (Split = 'total' OR Split = 'vLeft' OR Split = 'vRight')
  						  GROUP BY Split
                    ORDER BY Year DESC, Team, Split ASC";
                    
        $result = mysql_query($query);
        
        return $result;
    }
    
    function top30mletotalquery()
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT battersbackup.Player, battersbackup.Split, CONCAT(players.First, ' ', players.Last) as name,
		SUM(ROUND((battersbackup.H / parkmults.h * pow(lgmults.mult,0.4)))) as H, 
		SUM(ROUND((battersbackup.D / parkmults.d * pow(lgmults.mult,0.5)))) as D,
		 SUM(ROUND((battersbackup.T / parkmults.d * pow(lgmults.mult,0.75)))) as T, 
		 SUM(ROUND((battersbackup.HR / parkmults.hr * pow(lgmults.mult,0.75)))) as HR,
       SUM(ROUND((battersbackup.W * pow(lgmults.mult,0.75)))) as W,
       SUM(ROUND((battersbackup.HP / pow(lgmults.mult,0.75)))) as HP,
       SUM(ROUND((battersbackup.K / pow(lgmults.mult,0.2)))) as K, 
		 SUM(ROUND((battersbackup.SB * pow(lgmults.mult,0.5)))) as SB, 
		 SUM(ROUND((battersbackup.CS / pow(lgmults.mult,0.25)))) as CS, 
		 SUM((battersbackup.AB + battersbackup.W + battersbackup.HP)) as PA,
		 SUM(((battersbackup.AB + battersbackup.W + battersbackup.HP) - ROUND((battersbackup.W * pow(lgmults.mult,0.75))) - ROUND((battersbackup.HP * pow(lgmults.mult,0.75))))) as AB
		  FROM battersbackup 
                    JOIN parkmults on parkmults.park = battersbackup.Team
                    JOIN teams on battersbackup.Team = teams.TeamID
                    JOIN lgmults on lgmults.lg = teams.League
                    JOIN leagues on lgmults.lg = leagues.LeagueID
                    JOIN players on players.MLBAM = battersbackup.Player
		    AND (Split = 'total' AND AB > '10')
  		    GROUP BY Player
                    ORDER BY PA DESC, Player ASC, Year DESC, Team
                    LIMIT 30";
        
        $result = mysql_query($query);
        
        return $result;
    }
    
    // takes mlbamid (integer), returns all leagues a player played in (mysql object)
    function averageleagues($mlbamid)
    {
	// connect to minor league database
        $this->dbsetup('drivebb_minorleague');
	
	//
	// league information for batters
	//
        
        $query = "SELECT teams.League FROM battersbackup
		  JOIN teams on battersbackup.Team = teams.TeamID
		  WHERE Player = '" . mysql_real_escape_string($mlbamid) . "'
		  GROUP BY Team
		  ORDER BY Year DESC";
                    
        $leagues = mysql_query($query);
	
	// loop the where for each league
	
	while($row = mysql_fetch_array($leagues))
	{
	   $teamquery = "SELECT TeamID FROM teams WHERE (League = '" . $row['League'] . "')";
	   $teamresult = mysql_query($teamquery);
	   
	   $where = '(';
	   while ($row1 = mysql_fetch_array($teamresult))
	   {
	     $where .= "Team = '" . $row1['TeamID'] . "' OR ";
	   }
	   $where = substr($where, 0, -4);
	   $where .= ')';
	   
	   $result[$row['League']] = $this->leagueavg($where);
	}
	
	//
	// league information for pitchers
	//
	
        $query = "SELECT teams.League FROM pitchers
 		  JOIN teams on pitchers.Team = teams.TeamID
		  WHERE Player = '" . $mlbamid . "'
		  GROUP BY Team
		  ORDER BY Year DESC";
                    
        $leagues = mysql_query($query);
	
	// loop the where for each league
	
	while($row = mysql_fetch_array($leagues))
	{
	   $teamquery = "SELECT TeamID FROM teams WHERE (League = '" . $row['League'] . "')";
	   $teamresult = mysql_query($teamquery);
	   
	   $where = '(';
	   while ($row1 = mysql_fetch_array($teamresult))
	   {
	     $where .= "Team = '" . $row1['TeamID'] . "' OR ";
	   }
	   $where = substr($where, 0, -4);
	   $where .= ')';
	   
	   $result[$row['League']] = $this->leagueavg($where);
	}

        return $result;
    }
    
    // takes looped where statement (string), returns leagues averages for those leagues (mysql object)
    function leagueavg($where)
    {
	// connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT battersbackup.Team, teams.League, SUM(AB) as AB, (SUM(GB) / (SUM(AB) - SUM(K))) as FBrate, (SUM(FB) / (SUM(AB) - SUM(K))) as GBrate, (SUM(LD) / (SUM(AB) - SUM(K))) as LDrate,
		(SUM(PU) / (SUM(AB) - SUM(K))) as PUrate, 
		(SUM(H) / SUM(AB)) as AVG, 
		((SUM(H) + SUM(W) + SUM(HP)) / (SUM(AB) + SUM(W) + SUM(HP))) as OBP, 
		((SUM(H)+SUM(D)+(2*SUM(T))+(3*SUM(HR))) / SUM(AB)) as SLG FROM battersbackup
		JOIN teams on teams.TeamID = battersbackup.Team
		WHERE " . $where . " AND Split = 'Total'
		GROUP BY teams.League
		ORDER BY Year DESC";
                    
        $result = mysql_query($query);
        
        return $result;
    }
    
    // takes names (strings), returns a list of names that match (mysql object)
    function playersearch($first, $last)
    {
        // connect to minor league database
        $this->dbsetup('drivebb_minorleague');
        
        $query = "SELECT * FROM players
                  WHERE First LIKE '" . mysql_real_escape_string($first) . "%' AND Last LIKE '" . mysql_real_escape_string($last) . "%'
                  ORDER BY Last ASC";
                    
        $result = mysql_query($query);
        
        return $result;
    }
    
}