<?php

/**
 * Copyright (C) 2016-2021  Daniel Dolejška
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace RiotAPI\LeagueAPI\Objects;


/**
 *   Class ParticipantDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatchByTournamentCode
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchByTournamentCode
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatch
 *   match (v5)
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getMatch
 *
 * @linkable getStaticChampion($championId)
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ParticipantDto extends ApiObjectLinkable
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $participantId
	 */
	public $participantId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $championId
	 */
	public $championId;

	/**
	 * List of legacy Rune information. Not included for matches played with
	 * Runes Reforged.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var RuneDto[] $runes
	 */
	public $runes;

	/**
	 * Participant statistics.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ParticipantStatsDto $stats
	 */
	public $stats;

	/**
	 * 100 for blue side. 200 for red side.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $teamId
	 */
	public $teamId;

	/**
	 * Participant timeline data.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ParticipantTimelineDto $timeline
	 */
	public $timeline;

	/**
	 * First Summoner Spell id.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell1Id
	 */
	public $spell1Id;

	/**
	 * Second Summoner Spell id.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell2Id
	 */
	public $spell2Id;

	/**
	 * Highest ranked tier achieved for the previous season in a specific
	 * subset of queueIds, if any, otherwise null. Used to display border in
	 * game loading screen. Please refer to the Ranked Info documentation.
	 * (Legal values: CHALLENGER, MASTER, DIAMOND, PLATINUM, GOLD, SILVER,
	 * BRONZE, UNRANKED).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $highestAchievedSeasonTier
	 */
	public $highestAchievedSeasonTier;

	/**
	 * List of legacy Mastery information. Not included for matches played
	 * with Runes Reforged.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var MasteryDto[] $masteries
	 */
	public $masteries;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $assists
	 */
	public $assists;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $baronKills
	 */
	public $baronKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $bountyLevel
	 */
	public $bountyLevel;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $champExperience
	 */
	public $champExperience;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $champLevel
	 */
	public $champLevel;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $championName
	 */
	public $championName;

	/**
	 * This field is currently only utilized for Kayn's transformations.
	 * (Legal values: 0 - None, 1 - Slayer, 2 - Assassin).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $championTransform
	 */
	public $championTransform;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $consumablesPurchased
	 */
	public $consumablesPurchased;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageDealtToBuildings
	 */
	public $damageDealtToBuildings;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageDealtToObjectives
	 */
	public $damageDealtToObjectives;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageDealtToTurrets
	 */
	public $damageDealtToTurrets;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageSelfMitigated
	 */
	public $damageSelfMitigated;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $deaths
	 */
	public $deaths;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $detectorWardsPlaced
	 */
	public $detectorWardsPlaced;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $doubleKills
	 */
	public $doubleKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $dragonKills
	 */
	public $dragonKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstBloodAssist
	 */
	public $firstBloodAssist;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstBloodKill
	 */
	public $firstBloodKill;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstTowerAssist
	 */
	public $firstTowerAssist;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstTowerKill
	 */
	public $firstTowerKill;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $gameEndedInEarlySurrender
	 */
	public $gameEndedInEarlySurrender;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $gameEndedInSurrender
	 */
	public $gameEndedInSurrender;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $goldEarned
	 */
	public $goldEarned;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $goldSpent
	 */
	public $goldSpent;

	/**
	 * Both individualPosition and teamPosition are computed by the game
	 * server and are different versions of the most likely position played by
	 * a player. The individualPosition is the best guess for which position
	 * the player actually played in isolation of anything else. The
	 * teamPosition is the best guess for which position the player actually
	 * played if we add the constraint that each team must have one top
	 * player, one jungle, one middle, etc. Generally the recommendation is to
	 * use the teamPosition field over the individualPosition field.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $individualPosition
	 */
	public $individualPosition;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $inhibitorKills
	 */
	public $inhibitorKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $inhibitorTakedowns
	 */
	public $inhibitorTakedowns;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $inhibitorsLost
	 */
	public $inhibitorsLost;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item0
	 */
	public $item0;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item1
	 */
	public $item1;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item2
	 */
	public $item2;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item3
	 */
	public $item3;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item4
	 */
	public $item4;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item5
	 */
	public $item5;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item6
	 */
	public $item6;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $itemsPurchased
	 */
	public $itemsPurchased;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $killingSprees
	 */
	public $killingSprees;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $kills
	 */
	public $kills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $lane
	 */
	public $lane;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $largestCriticalStrike
	 */
	public $largestCriticalStrike;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $largestKillingSpree
	 */
	public $largestKillingSpree;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $largestMultiKill
	 */
	public $largestMultiKill;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $longestTimeSpentLiving
	 */
	public $longestTimeSpentLiving;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $magicDamageDealt
	 */
	public $magicDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $magicDamageDealtToChampions
	 */
	public $magicDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $magicDamageTaken
	 */
	public $magicDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $neutralMinionsKilled
	 */
	public $neutralMinionsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $nexusKills
	 */
	public $nexusKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $nexusTakedowns
	 */
	public $nexusTakedowns;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $nexusLost
	 */
	public $nexusLost;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $objectivesStolen
	 */
	public $objectivesStolen;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $objectivesStolenAssists
	 */
	public $objectivesStolenAssists;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $pentaKills
	 */
	public $pentaKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var PerksDto $perks
	 */
	public $perks;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $physicalDamageDealt
	 */
	public $physicalDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $physicalDamageDealtToChampions
	 */
	public $physicalDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $physicalDamageTaken
	 */
	public $physicalDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $profileIcon
	 */
	public $profileIcon;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $puuid
	 */
	public $puuid;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $quadraKills
	 */
	public $quadraKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $riotIdName
	 */
	public $riotIdName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $riotIdTagline
	 */
	public $riotIdTagline;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $role
	 */
	public $role;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $sightWardsBoughtInGame
	 */
	public $sightWardsBoughtInGame;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell1Casts
	 */
	public $spell1Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell2Casts
	 */
	public $spell2Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell3Casts
	 */
	public $spell3Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell4Casts
	 */
	public $spell4Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner1Casts
	 */
	public $summoner1Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner1Id
	 */
	public $summoner1Id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner2Casts
	 */
	public $summoner2Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner2Id
	 */
	public $summoner2Id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $summonerId
	 */
	public $summonerId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summonerLevel
	 */
	public $summonerLevel;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $summonerName
	 */
	public $summonerName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $teamEarlySurrendered
	 */
	public $teamEarlySurrendered;

	/**
	 * Both individualPosition and teamPosition are computed by the game
	 * server and are different versions of the most likely position played by
	 * a player. The individualPosition is the best guess for which position
	 * the player actually played in isolation of anything else. The
	 * teamPosition is the best guess for which position the player actually
	 * played if we add the constraint that each team must have one top
	 * player, one jungle, one middle, etc. Generally the recommendation is to
	 * use the teamPosition field over the individualPosition field.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $teamPosition
	 */
	public $teamPosition;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $timeCCingOthers
	 */
	public $timeCCingOthers;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $timePlayed
	 */
	public $timePlayed;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageDealt
	 */
	public $totalDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageDealtToChampions
	 */
	public $totalDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageShieldedOnTeammates
	 */
	public $totalDamageShieldedOnTeammates;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageTaken
	 */
	public $totalDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalHeal
	 */
	public $totalHeal;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalHealsOnTeammates
	 */
	public $totalHealsOnTeammates;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalMinionsKilled
	 */
	public $totalMinionsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalTimeCCDealt
	 */
	public $totalTimeCCDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalTimeSpentDead
	 */
	public $totalTimeSpentDead;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalUnitsHealed
	 */
	public $totalUnitsHealed;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $tripleKills
	 */
	public $tripleKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $trueDamageDealt
	 */
	public $trueDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $trueDamageDealtToChampions
	 */
	public $trueDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $trueDamageTaken
	 */
	public $trueDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $turretKills
	 */
	public $turretKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $turretTakedowns
	 */
	public $turretTakedowns;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $turretsLost
	 */
	public $turretsLost;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $unrealKills
	 */
	public $unrealKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $visionScore
	 */
	public $visionScore;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $visionWardsBoughtInGame
	 */
	public $visionWardsBoughtInGame;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $wardsKilled
	 */
	public $wardsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $wardsPlaced
	 */
	public $wardsPlaced;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $win
	 */
	public $win;
}
