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
 *   Class LobbyEventDto
 *
 * Used in:
 *   tournament-stub (v4)
 *     - @see LeagueAPI::getLobbyEventsByCode
 *       @link https://developer.riotgames.com/apis#tournament-stub-v4/GET_getLobbyEventsByCode
 *   tournament (v4)
 *     - @see LeagueAPI::getLobbyEventsByCode
 *       @link https://developer.riotgames.com/apis#tournament-v4/GET_getLobbyEventsByCode
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class LobbyEventDto extends ApiObject
{
	/**
	 * The summonerId that triggered the event (Encrypted).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLobbyEventsByCode
	 *   - @see LeagueAPI::getLobbyEventsByCode
	 *
	 * @var string $summonerId
	 */
	public $summonerId;

	/**
	 * The type of event that was triggered.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLobbyEventsByCode
	 *   - @see LeagueAPI::getLobbyEventsByCode
	 *
	 * @var string $eventType
	 */
	public $eventType;

	/**
	 * Timestamp from the event.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getLobbyEventsByCode
	 *   - @see LeagueAPI::getLobbyEventsByCode
	 *
	 * @var string $timestamp
	 */
	public $timestamp;
}
