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
 *   Class SummonerDto
 *
 * Used in:
 *   summoner (v4)
 *     - @see LeagueAPI::getByPUUID
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getByPUUID
 *     - @see LeagueAPI::getBySummonerName
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getBySummonerName
 *     - @see LeagueAPI::getByAccessToken
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getByAccessToken
 *     - @see LeagueAPI::getBySummonerId
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getBySummonerId
 *     - @see LeagueAPI::getByAccountId
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getByAccountId
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class SummonerDto extends ApiObject
{
	/**
	 * Encrypted account ID. Max length 56 characters.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var string $accountId
	 */
	public string $accountId;

	/**
	 * ID of the summoner icon associated with the summoner.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var int $profileIconId
	 */
	public int $profileIconId;

	/**
	 * Date summoner was last modified specified as epoch milliseconds. The
	 * following events will update this timestamp: summoner name change,
	 * summoner level change, or profile icon change.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var int $revisionDate
	 */
	public int $revisionDate;

	/**
	 * Summoner name.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * Encrypted summoner ID. Max length 63 characters.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var string $id
	 */
	public string $id;

	/**
	 * Encrypted PUUID. Exact length of 78 characters.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var string $puuid
	 */
	public string $puuid;

	/**
	 * Summoner level associated with the summoner.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByPUUID
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByAccountId
	 *
	 * @var int $summonerLevel
	 */
	public int $summonerLevel;
}
