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
 *   Class MatchDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatchByTournamentCode
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchByTournamentCode
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatch
 *   match (v5)
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getMatch
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchDto extends ApiObject
{
	/**
	 * Match metadata.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var MetadataDto $metadata
	 */
	public $metadata;

	/**
	 * Match info.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var InfoDto $info
	 */
	public $info;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameId
	 */
	public $gameId;

	/**
	 * Participant identity information. Participant identity information is
	 * purposefully excluded for custom games.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ParticipantIdentityDto[] $participantIdentities
	 */
	public $participantIdentities;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $queueId
	 */
	public $queueId;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameType
	 */
	public $gameType;

	/**
	 * Match duration in seconds.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameDuration
	 */
	public $gameDuration;

	/**
	 * Team information.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var TeamStatsDto[] $teams
	 */
	public $teams;

	/**
	 * Platform where the match was played.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $platformId
	 */
	public $platformId;

	/**
	 * Designates the timestamp when champion select ended and the loading
	 * screen appeared, NOT when the game timer was at 0:00.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $gameCreation
	 */
	public $gameCreation;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $seasonId
	 */
	public $seasonId;

	/**
	 * The major.minor version typically indicates the patch the match was
	 * played on.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameVersion
	 */
	public $gameVersion;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $mapId
	 */
	public $mapId;

	/**
	 * Refer to the Game Constants documentation.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $gameMode
	 */
	public $gameMode;

	/**
	 * Participant information.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var ParticipantDto[] $participants
	 */
	public $participants;
}
