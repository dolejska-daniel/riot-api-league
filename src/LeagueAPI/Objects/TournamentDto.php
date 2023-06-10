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
 *   Class TournamentDto
 *
 * Used in:
 *   clash (v1)
 *     - @see LeagueAPI::getTournamentById
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getTournamentById
 *     - @see LeagueAPI::getTournaments
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getTournaments
 *     - @see LeagueAPI::getTournamentByTeam
 *       @link https://developer.riotgames.com/apis#clash-v1/GET_getTournamentByTeam
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class TournamentDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentById
	 *   - @see LeagueAPI::getTournaments
	 *   - @see LeagueAPI::getTournamentByTeam
	 *
	 * @var int $id
	 */
	public int $id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentById
	 *   - @see LeagueAPI::getTournaments
	 *   - @see LeagueAPI::getTournamentByTeam
	 *
	 * @var int $themeId
	 */
	public int $themeId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentById
	 *   - @see LeagueAPI::getTournaments
	 *   - @see LeagueAPI::getTournamentByTeam
	 *
	 * @var string $nameKey
	 */
	public string $nameKey;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentById
	 *   - @see LeagueAPI::getTournaments
	 *   - @see LeagueAPI::getTournamentByTeam
	 *
	 * @var string $nameKeySecondary
	 */
	public string $nameKeySecondary;

	/**
	 * Tournament phase.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentById
	 *   - @see LeagueAPI::getTournaments
	 *   - @see LeagueAPI::getTournamentByTeam
	 *
	 * @var TournamentPhaseDto[] $schedule
	 */
	public array $schedule;
}
