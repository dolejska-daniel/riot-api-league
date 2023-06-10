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
 *   Class MatchTeamDto
 *
 * Used in:
 *   match (v5)
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getMatch
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchTeamDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var BanDto[] $bans
	 */
	public array $bans;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectivesDto $objectives
	 */
	public ObjectivesDto $objectives;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $teamId
	 */
	public int $teamId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var bool $win
	 */
	public bool $win;
}