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
	 * Unix timestamp for when the game is created on the game server (i.e.,
	 * the loading screen).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameCreation
	 */
	public int $gameCreation;

	/**
	 * Prior to patch 11.20, this field returns the game length in
	 * milliseconds calculated from gameEndTimestamp - gameStartTimestamp.
	 * Post patch 11.20, this field returns the max timePlayed of any
	 * participant in the game in seconds, which makes the behavior of this
	 * field consistent with that of match-v4. The best way to handling the
	 * change in this field is to treat the value as milliseconds if the
	 * gameEndTimestamp field isn't in the response and to treat the value as
	 * seconds if gameEndTimestamp is in the response.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameDuration
	 */
	public int $gameDuration;

	/**
	 * Unix timestamp for when match ends on the game server. This timestamp
	 * can occasionally be significantly longer than when the match "ends".
	 * The most reliable way of determining the timestamp for the end of the
	 * match would be to add the max time played of any participant to the
	 * gameStartTimestamp. This field was added to match-v5 in patch 11.20 on
	 * Oct 5th, 2021.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameEndTimestamp
	 */
	public int $gameEndTimestamp;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameId
	 */
	public int $gameId;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameMode
	 */
	public string $gameMode;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameName
	 */
	public string $gameName;

	/**
	 * Unix timestamp for when match starts on the game server.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameStartTimestamp
	 */
	public int $gameStartTimestamp;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameType
	 */
	public string $gameType;

	/**
	 * The first two parts can be used to determine the patch a game was
	 * played on.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameVersion
	 */
	public string $gameVersion;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $mapId
	 */
	public int $mapId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ParticipantDto[] $participants
	 */
	public array $participants;

	/**
	 * Platform where the match was played.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $platformId
	 */
	public string $platformId;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $queueId
	 */
	public int $queueId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var TeamDto[] $teams
	 */
	public array $teams;

	/**
	 * Tournament code used to generate the match. This field was added to
	 * match-v5 in patch 11.13 on June 23rd, 2021.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $tournamentCode
	 */
	public string $tournamentCode;
}
