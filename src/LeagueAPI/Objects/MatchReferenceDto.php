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
 *   Class MatchReferenceDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatchlist
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchlist
 *
 * @linkable getStaticChampion($champion)
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchReferenceDto extends ApiObjectLinkable
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var int $gameId
	 */
	public $gameId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var string $role
	 */
	public $role;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var int $season
	 */
	public $season;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var string $platformId
	 */
	public $platformId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var int $champion
	 */
	public $champion;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var int $queue
	 */
	public $queue;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var string $lane
	 */
	public $lane;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchlist
	 *
	 * @var int $timestamp
	 */
	public $timestamp;
}
