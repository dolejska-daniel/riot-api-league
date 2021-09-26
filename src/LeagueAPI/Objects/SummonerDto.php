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
 *   Class SummonerDto
 *
 * Used in:
 *   summoner (v4)
 *     - @see LeagueAPI::getByAccountId
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getByAccountId
 *     - @see LeagueAPI::getBySummonerName
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getBySummonerName
 *     - @see LeagueAPI::getByAccessToken
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getByAccessToken
 *     - @see LeagueAPI::getBySummonerId
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getBySummonerId
 *     - @see LeagueAPI::getByPUUID
 *       @link https://developer.riotgames.com/apis#summoner-v4/GET_getByPUUID
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class SummonerDto extends ApiObject
{
	/**
	 * Encrypted account ID. Max length 56 characters.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var string $accountId
	 */
	public $accountId;

	/**
	 * ID of the summoner icon associated with the summoner.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var int $profileIconId
	 */
	public $profileIconId;

	/**
	 * Date summoner was last modified specified as epoch milliseconds. The
	 * following events will update this timestamp: summoner name change,
	 * summoner level change, or profile icon change.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var int $revisionDate
	 */
	public $revisionDate;

	/**
	 * Summoner name.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var string $name
	 */
	public $name;

	/**
	 * Encrypted summoner ID. Max length 63 characters.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var string $id
	 */
	public $id;

	/**
	 * Encrypted PUUID. Exact length of 78 characters.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var string $puuid
	 */
	public $puuid;

	/**
	 * Summoner level associated with the summoner.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getByAccountId
	 *   - @see LeagueAPI::getBySummonerName
	 *   - @see LeagueAPI::getByAccessToken
	 *   - @see LeagueAPI::getBySummonerId
	 *   - @see LeagueAPI::getByPUUID
	 *
	 * @var int $summonerLevel
	 */
	public $summonerLevel;
}
