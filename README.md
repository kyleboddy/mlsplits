mlsplits
========

###Minor League Splits - Reborn (and now dead)
original author: Jeff Sackmann
rebooted author: Kyle Boddy (kyle.boddy@gmail.com)

This project started off as a rebirth of Jeff Sackmann's great work over at Minor League Splits (http://minorleaguesplits.com/). Jeff's website was beloved by many, and it was sad when it was finally taken offline due to maintainance issues. My vision was to get the original version back online and to eventually parse MLBAM data to give everyone the Minor League Splits website back that they wanted - under the name MLsplits.

Sadly, while I have a working parser and downloader of data (many thanks to Mike Fast, Harry Pavlidis, and Brian Cartwright), I do not have the time to devote to writing a series of scripts that pulls out and summarizes minor league play-by-play data. The task is simply too great, and my side projects too many. I have a full-time job in the field of data analysis / data science, and I maintain other private side projects that relate to baseball.

However, as Jeff made his data open source, I will also do the same - except, I will release mine in a SQL format which is ready for import, and I will additionally release all of my PHP/CodeIgniter source code that made it possible to view the stats in a (relatively) easy-to-browse format. (Hey, I'm not a UI designer - and neither was Jeff!)

You can find the compressed MySQL dump of the MLsplits data on the downloads page (https://github.com/kyleboddy/mlsplits/downloads) of this repository. You'll need it to view anything if you decide to boot the code.

##Code Notes

Support for the code is going to be limited. Let's just say I wrote the code to work, and not using best practices. :)

The code is all PHP 5 and CodeIgniter 2.x compliant (it was originally written in 1.x). Notable changes you will need to make:

+Changing the <pre>/application/config/config.php</pre> folder with relevant <pre>base_url</pre> and other info
+Changing the <pre>.htaccess</pre> files if you want to rename directories and/or don't want to support <pre>mod_rewrite</pre> in apache
+Changing the MySQL connection string in <pre>/application/models/datamodel.php</pre> to point at a working copy of a database (as well as editing all references to the DB name, <pre>drivebb_minorleague</pre> if you want to change that name too)

That's all I can think of for now.

Well, it's really a pity to let it die, though I will leave http://mlsplits.drivelinebaseball.com up for an indefinite period of time. The MLE calculator still gets plenty of use, and there are random links here and there despite the website not seeing an update for over a year.

Jeff did great work, and I wish I could have followed his work up. But with an upcoming book, a facility to manage, a toddler, a full-time job, a wife... you get the picture.

Fork my project and make something of it. And let me know about it, will ya?

-Kyle Boddy
kyle.boddy@gmail.com
@drivelinebases