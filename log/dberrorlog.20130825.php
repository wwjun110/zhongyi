
<?PHP exit('------------------Www.Zyiis.Com------------------'); ?>
ZYADS: MySQL Query Sql Error
Time: 2013-8-25 12:40pm
Error:  Table 'zy_adun.zyads_cheat' doesn't exist
Errno:  1146
Script: /v7/do.php
SQL: SELECT id,zoneid,planid,siteid,date(from_unixtime(unixtime)) AS unixtime,SUM(pv) as pv, SUM(m1) as m1,SUM(m3) as m3, SUM(m5) as m5, SUM(m10) as m10, SUM(m15) as m15, SUM(m30) as m30, SUM(c1) as c1, SUM(c3) as c3, SUM(c5) as c5, SUM(c10) as c10,SUM(c15) as c15, SUM(c30) as c30, SUM(s1) as s1,SUM(s5) as s5,SUM(s10) as s10, SUM(s15) as s15, SUM(s30) as s30, SUM(s60) as s60 FROM zyads_cheat WHERE 1 AND unixtime=1377360000 GROUP BY siteid,unixtime ORDER BY unixtime DESC LIMIT 0,20
