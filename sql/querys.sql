select t.id, t.name, sum(m.home_score) as home_score
from teams t
left join matches m on t.id = m.home_id
group by t.name


/* query for check home score and away score */

select t.id, t.name, 
0+COALESCE(sum(mh.home_score),0) as home_score, 
0+COALESCE(SUM(ma.away_score),0) as away_score,  
0+COALESCE(0+COALESCE(sum(mh.home_score),0) + 0+COALESCE(sum(ma.away_score),0)) as gf
from teams t
left join matches mh on t.id = mh.home_id 
left join matches ma on t.id = ma.away_id
group by t.name  
ORDER BY `gf`  DESC

/* query for check GF + GA */
select t.id, t.name, 
0+COALESCE(sum(mh.home_score),0) as home_score, 
0+COALESCE(SUM(ma.away_score),0) as away_score,  
0+COALESCE(0+COALESCE(sum(mh.home_score),0) + 0+COALESCE(sum(ma.away_score),0)) as GF,

0+COALESCE(sum(ma.home_score),0) as GAhome_score2,
0+COALESCE(sum(mh.away_score),0) as GAaway_score2,
0+COALESCE(0+COALESCE(sum(ma.home_score),0) + 0+COALESCE(sum(mh.away_score),0)) as GA

from teams t
LEFT join matches mh on t.id = mh.home_id 
LEFT join matches ma on t.id = ma.away_id
group by t.name  
ORDER BY `gf`  DESC


/* Matches  GP -  GF-GA-DF */
select t.id, t.name,
COUNT(mh.home_id) + COUNT(ma.away_id) as  GP,

COUNT(mh.home_id) as W,
COUNT(ma.away_id) as L,
 
0+COALESCE(0+COALESCE(sum(mh.home_score),0) + 0+COALESCE(sum(ma.away_score),0)) as GF,
0+COALESCE(0+COALESCE(sum(ma.home_score),0) + 0+COALESCE(sum(mh.away_score),0)) as GA,

(0+COALESCE(0+COALESCE(sum(mh.home_score),0) + 0+COALESCE(sum(ma.away_score),0))) - (0+COALESCE(0+COALESCE(sum(ma.home_score),0) + 0+COALESCE(sum(mh.away_score),0))) as DF

from teams t
LEFT join matches mh on t.id = mh.home_id 
LEFT join matches ma on t.id = ma.away_id
group by t.name  
ORDER BY `gf`  DESC


/* Matche GP - W - L - T */
select t.id, t.name, 
(COUNT(CASE WHEN mh.home_score > mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score < ma.away_score THEN 1 END )) 
+ (COUNT(CASE WHEN mh.home_score < mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score > ma.away_score THEN 1 END )) 
+ (COUNT(CASE WHEN mh.home_score = mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score = ma.away_score THEN 1 END )) as GP

COUNT(CASE WHEN mh.home_score > mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score < ma.away_score THEN 1 END ) AS W,

COUNT(CASE WHEN mh.home_score < mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score > ma.away_score THEN 1 END ) AS L,

COUNT(CASE WHEN mh.home_score = mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score = ma.away_score THEN 1 END ) AS D,


 
from teams t
LEFT join matches mh on t.id = mh.home_id 
LEFT join matches ma on t.id = ma.away_id
group by t.name


/* Matches */

select teams.id, teams.name, 
(COUNT(CASE WHEN mh.home_score > mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score < ma.away_score THEN 1 END )) 
+ (COUNT(CASE WHEN mh.home_score < mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score > ma.away_score THEN 1 END )) 
+ (COUNT(CASE WHEN mh.home_score = mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score = ma.away_score THEN 1 END )) as GP,

COUNT(CASE WHEN mh.home_score > mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score < ma.away_score THEN 1 END ) AS W,

COUNT(CASE WHEN mh.home_score < mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score > ma.away_score THEN 1 END ) AS L,

COUNT(CASE WHEN mh.home_score = mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score = ma.away_score THEN 1 END ) AS D,

0+COALESCE(0+COALESCE(sum(mh.home_score),0) + 0+COALESCE(sum(ma.away_score),0)) as GF,
0+COALESCE(0+COALESCE(sum(ma.home_score),0) + 0+COALESCE(sum(mh.away_score),0)) as GA,

(0+COALESCE(0+COALESCE(sum(mh.home_score),0) + 0+COALESCE(sum(ma.away_score),0))) - (0+COALESCE(0+COALESCE(sum(ma.home_score),0) + 0+COALESCE(sum(mh.away_score),0))) as DF,

(COUNT(CASE WHEN mh.home_score > mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score < ma.away_score THEN 1 END )) * 3 
+ (COUNT(CASE WHEN mh.home_score = mh.away_score THEN 1 END ) + COUNT(CASE WHEN ma.home_score = ma.away_score THEN 1 END )) as PTS

from teams 
LEFT join matches mh on teams.id = mh.home_id 
LEFT join matches ma on teams.id = ma.away_id
group by teams.id, teams.name

ORDER BY `PTS`  DESC, 'GD' DESC, 'GF'

/* Cards and goals */
SELECT playermatches.season_id, teams.id, teams.name, playermatches.card, playermatches.player_id, players.name, SUM(playermatches.qty)

from playermatches

LEFT JOIN teams ON teams.id = playermatches.team_id
LEFT JOIN players ON playermatches.player_id = players.id

GROUP BY playermatches.season_id, playermatches.team_id, playermatches.card, playermatches.id
ORDER BY teams.name

/* Players goals */
SELECT playermatches.season_id, teams.id, teams.name, playermatches.card, playermatches.player_id, players.name, SUM(playermatches.qty) as Goals

from playermatches 

LEFT JOIN teams ON teams.id = playermatches.team_id
LEFT JOIN players ON playermatches.player_id = players.id

WHERE playermatches.card = 'Goal'

GROUP BY playermatches.season_id, playermatches.team_id, playermatches.card, playermatches.player_id
ORDER BY Goals Desc

/* Players red and yellow */

 SELECT playermatches.season_id, teams.id, teams.name, playermatches.card, playermatches.player_id, players.name, SUM(playermatches.qty) as Goals

from playermatches 

LEFT JOIN teams ON teams.id = playermatches.team_id
LEFT JOIN players ON playermatches.player_id = players.id

WHERE playermatches.card <> 'Goal'

GROUP BY playermatches.season_id, playermatches.team_id, playermatches.card, playermatches.player_id
ORDER BY Goals Desc

/* new query */
SELECT seasons.season_name, matches.id, matches.home_id, matches.home_score,matches.away_id, matches.away_score
FROM seasons
INNER JOIN matches ON matches.season_id = seasons.id
WHERE seasons.id = 2

/* count game */
SELECT game.id, game.name, SUM(game.count_game) as GP FROM (
    
    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 THEN 1 END) as count_game
    FROM teams
    INNER JOIN matches ON matches.home_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name

    UNION

    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 THEN 1 END) as count_game
    FROM teams
    INNER JOIN matches ON matches.away_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name
    
    ) as game
    GROUP by game.id
	
/* count game GW */
SELECT game.id, game.name, SUM(game.count_GW) as W FROM (
    
    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score > matches.away_score THEN 1 END) as count_GW
    FROM teams
    INNER JOIN matches ON matches.home_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name

    UNION

    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 AND matches.away_score > matches.home_score THEN 1 END) as count_GW
    FROM teams
    INNER JOIN matches ON matches.away_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name
    
    ) as game
    GROUP by game.id


/* game L */

SELECT game.id, game.name, SUM(game.count_L) as L FROM (
    
    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score < matches.away_score THEN 1 END) as count_L
    FROM teams
    INNER JOIN matches ON matches.home_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name

    UNION

    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 AND matches.away_score < matches.home_score THEN 1 END) as count_L
    FROM teams
    INNER JOIN matches ON matches.away_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name
    
    ) as game
    GROUP by game.id
	
	/* game T*/

SELECT game.id, game.name, SUM(game.count_D) as D FROM (
    
    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score = matches.away_score THEN 1 END) as count_D
    FROM teams
    INNER JOIN matches ON matches.home_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name

    UNION

    SELECT teams.id, teams.name,
    COUNT(CASE WHEN matches.status_id = 2 AND matches.away_score = matches.home_score THEN 1 END) as count_D
    FROM teams
    INNER JOIN matches ON matches.away_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name
    
    ) as game
    GROUP by game.id
	
	/* game gf */
	
	SELECT game.id, game.name, SUM(game.sum_gf) as GF FROM (
    
    SELECT teams.id, teams.name,
    SUM(CASE WHEN matches.status_id = 2 THEN matches.home_score END) as sum_gf
    FROM teams
    INNER JOIN matches ON matches.home_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name

    UNION

    SELECT teams.id, teams.name,
    sum(CASE WHEN matches.status_id = 2 THEN matches.away_score END) as sum_gf
    FROM teams
    INNER JOIN matches ON matches.away_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name
    
    ) as game
    GROUP by game.id
	
	/* game GA */
SELECT game.id, game.name, SUM(game.sum_ga) as GA FROM (
    
    SELECT teams.id, teams.name,
    SUM(CASE WHEN matches.status_id = 2 THEN matches.away_score END) as sum_ga
    FROM teams
    INNER JOIN matches ON matches.home_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name

    UNION

    SELECT teams.id, teams.name,
    sum(CASE WHEN matches.status_id = 2 THEN matches.home_score END) as sum_ga
    FROM teams
    INNER JOIN matches ON matches.away_id = teams.id
    INNER JOIN seasons ON seasons.id = matches.season_id
    WHERE seasons.id = 2
    GROUP by teams.name
    
    ) as game
    GROUP by game.id



/* new query matches home */
(SELECT teams.id, teams.name, 
COUNT(CASE WHEN matches.status_id = 2 THEN 1 END) AS g_home,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score > matches.away_score THEN 1 END) as h_win,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score = matches.away_score THEN 1 END) as h_draw,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score < matches.away_score THEN 1 END) as h_loss,
SUM(CASE WHEN matches.status_id = 2 THEN matches.home_score END) as h_g_f,
SUM(CASE WHEN matches.status_id = 2 THEN matches.away_score END) as h_g_e


FROM teams

LEFT JOIN matches ON (teams.id = matches.home_id)

WHERE teams.status_id = 1 AND matches.season_id = 2
GROUP BY teams.id)

/* new query matches away */

(SELECT teams.id, teams.name, 
COUNT(CASE WHEN matches.status_id = 2 THEN 1 END) AS g_home,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score < matches.away_score THEN 1 END) as h_win,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score = matches.away_score THEN 1 END) as h_draw,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score > matches.away_score THEN 1 END) as h_loss,
SUM(CASE WHEN matches.status_id = 2 THEN matches.away_score END) as h_g_f,
SUM(CASE WHEN matches.status_id = 2 THEN matches.home_score END) as h_g_e


FROM teams

LEFT JOIN matches ON (teams.id = matches.away_id)

WHERE teams.status_id = 1 AND matches.season_id = 2
GROUP BY teams.id)


/* new matches */ 
SELECT game.id, game.name, 
SUM(g_home) as GP, 
SUM(h_win) as W ,
SUM(h_loss) as L,
SUM(h_draw) as D,
0+COALESCE(SUM(h_g_f), 0) as GF,
0+COALESCE(SUM(h_g_e), 0) as GA,
0+COALESCE((SUM(h_g_f) - SUM(h_g_e)), 0) as DF,
(SUM(h_win) * 3) + (SUM(h_draw) * 1) as PTS

FROM (

(SELECT teams.id, teams.name, 
COUNT(CASE WHEN matches.status_id = 2 THEN 1 END) AS g_home,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score > matches.away_score THEN 1 END) as h_win,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score = matches.away_score THEN 1 END) as h_draw,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score < matches.away_score THEN 1 END) as h_loss,
0+COALESCE( SUM(CASE WHEN matches.status_id = 2 THEN 0+COALESCE(matches.home_score) END)) as h_g_f,
0+COALESCE( SUM(CASE WHEN matches.status_id = 2 THEN 0+COALESCE(matches.away_score) END)) as h_g_e
FROM teams
LEFT JOIN matches ON (teams.id = matches.home_id)
WHERE teams.status_id = 1 AND matches.season_id = 2
GROUP BY teams.id)

UNION

(SELECT teams.id, teams.name, 
COUNT(CASE WHEN matches.status_id = 2 THEN 1 END) AS g_home,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score < matches.away_score THEN 1 END) as h_win,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score = matches.away_score THEN 1 END) as h_draw,
COUNT(CASE WHEN matches.status_id = 2 AND matches.home_score > matches.away_score THEN 1 END) as h_loss,
0+COALESCE( SUM(CASE WHEN matches.status_id = 2 THEN 0+COALESCE(matches.away_score) END)) as h_g_f,
0+COALESCE( SUM(CASE WHEN matches.status_id = 2 THEN 0+COALESCE(matches.home_score) END)) as h_g_e
FROM teams
LEFT JOIN matches ON (teams.id = matches.away_id)
WHERE teams.status_id = 1 AND matches.season_id = 2
GROUP BY teams.id)
    ) as game
    GROUP by game.id
    ORDER by PTS DESC, DF DESC, GF DESC


