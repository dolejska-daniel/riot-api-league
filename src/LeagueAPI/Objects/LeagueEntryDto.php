<?php

/**
 * Copyright (C) 2016-2022  Daniel Dolejška
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
 *   Class LeagueEntryDto
 *
 * Used in:
 *   league-exp (v4)
 *     - @see LeagueAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#league-exp-v4/GET_getLeagueEntries
 *   league (v4)
 *     - @see LeagueAPI::getLeagueEntriesForSummoner
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntriesForSummoner
 *     - @see LeagueAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntries
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class LeagueEntryDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $leagueId
	 */
	public string $leagueId;

	/**
	 * Player's summonerId (Encrypted).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $summonerName
	 */
	public string $summonerName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $queueType
	 */
	public string $queueType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $tier
	 */
	public string $tier;

	/**
	 * The player's division within a tier.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $rank
	 */
	public string $rank;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var int $leaguePoints
	 */
	public int $leaguePoints;

	/**
	 * Winning team on Summoners Rift. First placement in Teamfight Tactics.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var int $wins
	 */
	public int $wins;

	/**
	 * Losing team on Summoners Rift. Second through eighth placement in
	 * Teamfight Tactics.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var int $losses
	 */
	public int $losses;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var bool $hotStreak
	 */
	public bool $hotStreak;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var bool $veteran
	 */
	public bool $veteran;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var bool $freshBlood
	 */
	public bool $freshBlood;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var bool $inactive
	 */
	public bool $inactive;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var MiniSeriesDTO|null $miniSeries
	 */
	public ?MiniSeriesDTO $miniSeries = null;
}
