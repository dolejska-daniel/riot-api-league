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
 *   Class ChampionMasteryDto
 *
 * Used in:
 *   champion-mastery (v4)
 *     - @see LeagueAPI::getAllChampionMasteries
 *       @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getAllChampionMasteries
 *     - @see LeagueAPI::getAllChampionMasteriesByPUUID
 *       @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getAllChampionMasteriesByPUUID
 *     - @see LeagueAPI::getChampionMastery
 *       @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getChampionMastery
 *     - @see LeagueAPI::getTopChampionMasteries
 *       @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getTopChampionMasteries
 *
 * @linkable getStaticChampion($championId)
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ChampionMasteryDto extends ApiObjectLinkable
{
	/**
	 * Number of points needed to achieve next level. Zero if player reached
	 * maximum champion level for this champion.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $championPointsUntilNextLevel
	 */
	public int $championPointsUntilNextLevel;

	/**
	 * Is chest granted for this champion or not in current season.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var bool $chestGranted
	 */
	public bool $chestGranted;

	/**
	 * Champion ID for this entry.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $championId
	 */
	public int $championId;

	/**
	 * Last time this champion was played by this player - in Unix
	 * milliseconds time format.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $lastPlayTime
	 */
	public int $lastPlayTime;

	/**
	 * Champion level for specified player and champion combination.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $championLevel
	 */
	public int $championLevel;

	/**
	 * Summoner ID for this entry. (Encrypted).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;

	/**
	 * Total number of champion points for this player and champion
	 * combination - they are used to determine championLevel.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $championPoints
	 */
	public int $championPoints;

	/**
	 * Number of points earned since current level has been achieved.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $championPointsSinceLastLevel
	 */
	public int $championPointsSinceLastLevel;

	/**
	 * The token earned for this champion at the current championLevel. When
	 * the championLevel is advanced the tokensEarned resets to 0.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getAllChampionMasteriesByPUUID
	 *   - @see LeagueAPI::getChampionMastery
	 *   - @see LeagueAPI::getTopChampionMasteries
	 *
	 * @var int $tokensEarned
	 */
	public int $tokensEarned;
}
