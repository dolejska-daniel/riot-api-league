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
 *   Class PlayerDto
 *
 * Used in:
 *   clash (v1)
 *     - @see LeagueAPI::getTeamById
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getTeamById
 *     - @see LeagueAPI::getPlayersBySummoner
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getPlayersBySummoner
 *     - @see LeagueAPI::getPlayersByPUUID
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getPlayersByPUUID
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class PlayerDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *   - @see LeagueAPI::getPlayersBySummoner
	 *   - @see LeagueAPI::getPlayersByPUUID
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlayersBySummoner
	 *   - @see LeagueAPI::getPlayersByPUUID
	 *
	 * @var string $teamId
	 */
	public string $teamId;

	/**
	 * (Legal values: UNSELECTED, FILL, TOP, JUNGLE, MIDDLE, BOTTOM, UTILITY).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *   - @see LeagueAPI::getPlayersBySummoner
	 *   - @see LeagueAPI::getPlayersByPUUID
	 *
	 * @var string $position
	 */
	public string $position;

	/**
	 * (Legal values: CAPTAIN, MEMBER).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *   - @see LeagueAPI::getPlayersBySummoner
	 *   - @see LeagueAPI::getPlayersByPUUID
	 *
	 * @var string $role
	 */
	public string $role;
}
