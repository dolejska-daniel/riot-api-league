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
 *   Class TournamentCodeDto
 *
 * Used in:
 *   tournament (v4)
 *     - @see LeagueAPI::getTournamentCode
 *       @link https://developer.riotgames.com/apis#tournament-v4/GET_getTournamentCode
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class TournamentCodeDto extends ApiObject
{
	/**
	 * The tournament code.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $code
	 */
	public $code;

	/**
	 * The spectator mode for the tournament code game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $spectators
	 */
	public $spectators;

	/**
	 * The lobby name for the tournament code game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $lobbyName
	 */
	public $lobbyName;

	/**
	 * The metadata for tournament code.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $metaData
	 */
	public $metaData;

	/**
	 * The password for the tournament code game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $password
	 */
	public $password;

	/**
	 * The team size for the tournament code game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var int $teamSize
	 */
	public $teamSize;

	/**
	 * The provider's ID.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var int $providerId
	 */
	public $providerId;

	/**
	 * The pick mode for tournament code game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $pickType
	 */
	public $pickType;

	/**
	 * The tournament's ID.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var int $tournamentId
	 */
	public $tournamentId;

	/**
	 * The tournament code's ID.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var int $id
	 */
	public $id;

	/**
	 * The tournament code's region. (Legal values: BR, EUNE, EUW, JP, LAN,
	 * LAS, NA, OCE, PBE, RU, TR).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $region
	 */
	public $region;

	/**
	 * The game map for the tournament code game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string $map
	 */
	public $map;

	/**
	 * The summonerIds of the participants (Encrypted).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getTournamentCode
	 *
	 * @var string[] $participants
	 */
	public $participants;
}
