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
 *   Class ChampionMasteryDto
 *
 * Used in:
 *   champion-mastery (v4)
 *     - @see LeagueAPI::getAllChampionMasteries
 *       @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getAllChampionMasteries
 *     - @see LeagueAPI::getChampionMastery
 *       @link https://developer.riotgames.com/apis#champion-mastery-v4/GET_getChampionMastery
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
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $championPointsUntilNextLevel
	 */
	public $championPointsUntilNextLevel;

	/**
	 * Is chest granted for this champion or not in current season.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var bool $chestGranted
	 */
	public $chestGranted;

	/**
	 * Champion ID for this entry.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $championId
	 */
	public $championId;

	/**
	 * Last time this champion was played by this player - in Unix
	 * milliseconds time format.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $lastPlayTime
	 */
	public $lastPlayTime;

	/**
	 * Champion level for specified player and champion combination.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $championLevel
	 */
	public $championLevel;

	/**
	 * Summoner ID for this entry. (Encrypted).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var string $summonerId
	 */
	public $summonerId;

	/**
	 * Total number of champion points for this player and champion
	 * combination - they are used to determine championLevel.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $championPoints
	 */
	public $championPoints;

	/**
	 * Number of points earned since current level has been achieved.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $championPointsSinceLastLevel
	 */
	public $championPointsSinceLastLevel;

	/**
	 * The token earned for this champion at the current championLevel. When
	 * the championLevel is advanced the tokensEarned resets to 0.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChampionMasteries
	 *   - @see LeagueAPI::getChampionMastery
	 *
	 * @var int $tokensEarned
	 */
	public $tokensEarned;
}
