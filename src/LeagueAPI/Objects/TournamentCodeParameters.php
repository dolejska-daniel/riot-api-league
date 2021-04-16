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
 *   Class TournamentCodeParameters
 *
 * Used in:
 *   tournament-stub (v4)
 *     - @see LeagueAPI::createTournamentCode
 *       @link https://developer.riotgames.com/apis#tournament-stub-v4/POST_createTournamentCode
 *   tournament (v4)
 *     - @see LeagueAPI::createTournamentCode
 *       @link https://developer.riotgames.com/apis#tournament-v4/POST_createTournamentCode
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class TournamentCodeParameters extends ApiObject
{
	/**
	 * Optional list of encrypted summonerIds in order to validate the players
	 * eligible to join the lobby. NOTE: We currently do not enforce
	 * participants at the team level, but rather the aggregate of teamOne and
	 * teamTwo. We may add the ability to enforce at the team level in the
	 * future.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::createTournamentCode
	 *   - @see LeagueAPI::createTournamentCode
	 *
	 * @var string[] $allowedSummonerIds
	 */
	public $allowedSummonerIds;

	/**
	 * Optional string that may contain any data in any format, if specified
	 * at all. Used to denote any custom information about the game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::createTournamentCode
	 *   - @see LeagueAPI::createTournamentCode
	 *
	 * @var string $metadata
	 */
	public $metadata;

	/**
	 * The team size of the game. Valid values are 1-5.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::createTournamentCode
	 *   - @see LeagueAPI::createTournamentCode
	 *
	 * @var int $teamSize
	 */
	public $teamSize;

	/**
	 * The pick type of the game. (Legal values: BLIND_PICK, DRAFT_MODE,
	 * ALL_RANDOM, TOURNAMENT_DRAFT).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::createTournamentCode
	 *   - @see LeagueAPI::createTournamentCode
	 *
	 * @var string $pickType
	 */
	public $pickType;

	/**
	 * The map type of the game. (Legal values: SUMMONERS_RIFT,
	 * TWISTED_TREELINE, HOWLING_ABYSS).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::createTournamentCode
	 *   - @see LeagueAPI::createTournamentCode
	 *
	 * @var string $mapType
	 */
	public $mapType;

	/**
	 * The spectator type of the game. (Legal values: NONE, LOBBYONLY, ALL).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::createTournamentCode
	 *   - @see LeagueAPI::createTournamentCode
	 *
	 * @var string $spectatorType
	 */
	public $spectatorType;
}
