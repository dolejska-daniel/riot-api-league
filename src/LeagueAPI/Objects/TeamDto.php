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
 *   Class TeamDto
 *
 * Used in:
 *   clash (v1)
 *     - @see LeagueAPI::getTeamById
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getTeamById
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class TeamDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var string $id
	 */
	public $id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var int $tournamentId
	 */
	public $tournamentId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var string $name
	 */
	public $name;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var int $iconId
	 */
	public $iconId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var int $tier
	 */
	public $tier;

	/**
	 * Summoner ID of the team captain.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var string $captain
	 */
	public $captain;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var string $abbreviation
	 */
	public $abbreviation;

	/**
	 * Team members.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTeamById
	 *
	 * @var PlayerDto[] $players
	 */
	public $players;
}
