<?php

/**
 * Copyright (C) 2016-2023  Daniel Dolejška
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
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $assists
	 */
	public int $assists;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $baronKills
	 */
	public int $baronKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $bountyLevel
	 */
    public int $bountyLevel;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var array $challenges
     */
	public array $challenges = [];

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $champExperience
	 */
	public int $champExperience;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $champLevel
	 */
	public int $champLevel;

	/**
	 * Prior to patch 11.4, on Feb 18th, 2021, this field returned invalid
	 * championIds. We recommend determining the champion based on the
	 * championName field for matches played prior to patch 11.4.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $championId
	 */
	public int $championId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $championName
	 */
	public string $championName;

	/**
	 * This field is currently only utilized for Kayn's transformations.
	 * (Legal values: 0 - None, 1 - Slayer, 2 - Assassin).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $championTransform
	 */
	public int $championTransform;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $consumablesPurchased
	 */
	public int $consumablesPurchased;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageDealtToBuildings
	 */
	public int $damageDealtToBuildings;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageDealtToObjectives
	 */
	public int $damageDealtToObjectives;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageDealtToTurrets
	 */
	public int $damageDealtToTurrets;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $damageSelfMitigated
	 */
	public int $damageSelfMitigated;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $deaths
	 */
	public int $deaths;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $detectorWardsPlaced
	 */
	public int $detectorWardsPlaced;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $doubleKills
	 */
	public int $doubleKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $dragonKills
	 */
	public int $dragonKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstBloodAssist
	 */
	public bool $firstBloodAssist;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstBloodKill
	 */
	public bool $firstBloodKill;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstTowerAssist
	 */
	public bool $firstTowerAssist;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $firstTowerKill
	 */
	public bool $firstTowerKill;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $gameEndedInEarlySurrender
	 */
	public bool $gameEndedInEarlySurrender;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $gameEndedInSurrender
	 */
	public bool $gameEndedInSurrender;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $goldEarned
	 */
	public int $goldEarned;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $goldSpent
	 */
	public int $goldSpent;

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
	public string $individualPosition;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $inhibitorKills
	 */
	public int $inhibitorKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $inhibitorTakedowns
	 */
	public int $inhibitorTakedowns;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $inhibitorsLost
	 */
	public int $inhibitorsLost;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item0
	 */
	public int $item0;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item1
	 */
	public int $item1;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item2
	 */
	public int $item2;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item3
	 */
	public int $item3;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item4
	 */
	public int $item4;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item5
	 */
	public int $item5;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $item6
	 */
	public int $item6;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $itemsPurchased
	 */
	public int $itemsPurchased;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $killingSprees
	 */
	public int $killingSprees;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $kills
	 */
	public int $kills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $lane
	 */
	public string $lane;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $largestCriticalStrike
	 */
	public int $largestCriticalStrike;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $largestKillingSpree
	 */
	public int $largestKillingSpree;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $largestMultiKill
	 */
	public int $largestMultiKill;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $longestTimeSpentLiving
	 */
	public int $longestTimeSpentLiving;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $magicDamageDealt
	 */
	public int $magicDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $magicDamageDealtToChampions
	 */
	public int $magicDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $magicDamageTaken
	 */
	public int $magicDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $neutralMinionsKilled
	 */
	public int $neutralMinionsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $nexusKills
	 */
	public int $nexusKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $nexusTakedowns
	 */
	public int $nexusTakedowns;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $nexusLost
	 */
	public int $nexusLost;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $objectivesStolen
	 */
	public int $objectivesStolen;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $objectivesStolenAssists
	 */
	public int $objectivesStolenAssists;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $participantId
	 */
	public int $participantId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $pentaKills
	 */
	public int $pentaKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var PerksDto $perks
	 */
	public PerksDto $perks;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $physicalDamageDealt
	 */
	public int $physicalDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $physicalDamageDealtToChampions
	 */
	public int $physicalDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $physicalDamageTaken
	 */
	public int $physicalDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $profileIcon
	 */
	public int $profileIcon;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $puuid
	 */
	public string $puuid;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $quadraKills
	 */
	public int $quadraKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $riotIdName
	 */
	public string $riotIdName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $riotIdTagline
	 */
	public string $riotIdTagline;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $role
	 */
	public string $role;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $sightWardsBoughtInGame
	 */
	public int $sightWardsBoughtInGame;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell1Casts
	 */
	public int $spell1Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell2Casts
	 */
	public int $spell2Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell3Casts
	 */
	public int $spell3Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $spell4Casts
	 */
	public int $spell4Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner1Casts
	 */
	public int $summoner1Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner1Id
	 */
	public int $summoner1Id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner2Casts
	 */
	public int $summoner2Casts;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summoner2Id
	 */
	public int $summoner2Id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $summonerLevel
	 */
	public int $summonerLevel;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $summonerName
	 */
	public string $summonerName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $teamEarlySurrendered
	 */
	public bool $teamEarlySurrendered;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $teamId
	 */
	public int $teamId;

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
	public string $teamPosition;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $timeCCingOthers
	 */
	public int $timeCCingOthers;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $timePlayed
	 */
	public int $timePlayed;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageDealt
	 */
	public int $totalDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageDealtToChampions
	 */
	public int $totalDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageShieldedOnTeammates
	 */
	public int $totalDamageShieldedOnTeammates;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalDamageTaken
	 */
	public int $totalDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalHeal
	 */
	public int $totalHeal;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalHealsOnTeammates
	 */
	public int $totalHealsOnTeammates;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalMinionsKilled
	 */
	public int $totalMinionsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalTimeCCDealt
	 */
	public int $totalTimeCCDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalTimeSpentDead
	 */
	public int $totalTimeSpentDead;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $totalUnitsHealed
	 */
	public int $totalUnitsHealed;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $tripleKills
	 */
	public int $tripleKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $trueDamageDealt
	 */
	public int $trueDamageDealt;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $trueDamageDealtToChampions
	 */
	public int $trueDamageDealtToChampions;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $trueDamageTaken
	 */
	public int $trueDamageTaken;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $turretKills
	 */
	public int $turretKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $turretTakedowns
	 */
	public int $turretTakedowns;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $turretsLost
	 */
	public int $turretsLost;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $unrealKills
	 */
	public int $unrealKills;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $visionScore
	 */
	public int $visionScore;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $visionWardsBoughtInGame
	 */
	public int $visionWardsBoughtInGame;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $wardsKilled
	 */
	public int $wardsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $wardsPlaced
	 */
	public int $wardsPlaced;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $win
	 */
	public bool $win;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $allInPings
     */
    public ?int $allInPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $assistMePings
     */
    public ?int $assistMePings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $assistMePings
     */
    public ?int $baitPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $basicPings
     */
    public ?int $basicPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $assistMePings
     */
    public ?int $commandPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $dangerPings
     */
    public ?int $dangerPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $enemyMissingPings
     */
    public ?int $enemyMissingPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $enemyVisionPings
     */
    public ?int $enemyVisionPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $getBackPings
     */
    public ?int $getBackPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $holdPings
     */
    public ?int $holdPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $needVisionPings
     */
    public ?int $needVisionPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $onMyWayPings
     */
    public ?int $onMyWayPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $pushPings
     */
    public ?int $pushPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $visionClearedPings
     */
    public ?int $visionClearedPings = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var bool|null $eligibleForProgression
     */
    public ?bool $eligibleForProgression = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $playerAugment1
     */
    public ?int $playerAugment1 = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $playerAugment2
     */
    public ?int $playerAugment2 = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $playerAugment3
     */
    public ?int $playerAugment3 = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $playerAugment4
     */
    public ?int $playerAugment4 = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $playerSubteamId
     */
    public ?int $playerSubteamId = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $subteamPlacement
     */
    public ?int $subteamPlacement = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $totalAllyJungleMinionsKilled
     */
    public ?int $totalAllyJungleMinionsKilled = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $totalEnemyJungleMinionsKilled
     */
    public ?int $totalEnemyJungleMinionsKilled = null;

    /**
     * Available when received from:
     *   - @see LeagueAPI::getMatch
     *
     * @var int|null $placement
     */
    public ?int $placement = null;
}
