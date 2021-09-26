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
 *   Class ObjectivesDto
 *
 * Used in:
 *   match (v5)
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getMatch
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ObjectivesDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectiveDto $baron
	 */
	public $baron;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectiveDto $champion
	 */
	public $champion;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectiveDto $dragon
	 */
	public $dragon;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectiveDto $inhibitor
	 */
	public $inhibitor;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectiveDto $riftHerald
	 */
	public $riftHerald;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ObjectiveDto $tower
	 */
	public $tower;
}
