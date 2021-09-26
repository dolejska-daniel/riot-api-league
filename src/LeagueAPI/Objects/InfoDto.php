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
 *   Class InfoDto
 *
 * Used in:
 *   match (v5)
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getMatch
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class InfoDto extends ApiObject
{
	/**
	 * Unix timestamp for when the game is created (i.e., the loading screen).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameCreation
	 */
	public $gameCreation;

	/**
	 * Game length in milliseconds.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameDuration
	 */
	public $gameDuration;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameId
	 */
	public $gameId;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameMode
	 */
	public $gameMode;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameName
	 */
	public $gameName;

	/**
	 * Unix timestamp for when match actually starts.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameStartTimestamp
	 */
	public $gameStartTimestamp;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameType
	 */
	public $gameType;

	/**
	 * The first two parts can be used to determine the patch a game was
	 * played on.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameVersion
	 */
	public $gameVersion;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $mapId
	 */
	public $mapId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ParticipantDto[] $participants
	 */
	public $participants;

	/**
	 * Platform where the match was played.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $platformId
	 */
	public $platformId;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $queueId
	 */
	public $queueId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var TeamDto[] $teams
	 */
	public $teams;

	/**
	 * Tournament code used to generate the match.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $tournamentCode
	 */
	public $tournamentCode;
}
