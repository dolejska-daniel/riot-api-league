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
 *   Class ParticipantTimelineDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatchByTournamentCode
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchByTournamentCode
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatch
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ParticipantTimelineDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var int $participantId
	 */
	public $participantId;

	/**
	 * Creep score difference versus the calculated lane opponent(s) for a
	 * specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $csDiffPerMinDeltas
	 */
	public $csDiffPerMinDeltas;

	/**
	 * Damage taken for a specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $damageTakenPerMinDeltas
	 */
	public $damageTakenPerMinDeltas;

	/**
	 * Participant's calculated role. (Legal values: DUO, NONE, SOLO,
	 * DUO_CARRY, DUO_SUPPORT).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $role
	 */
	public $role;

	/**
	 * Damage taken difference versus the calculated lane opponent(s) for a
	 * specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $damageTakenDiffPerMinDeltas
	 */
	public $damageTakenDiffPerMinDeltas;

	/**
	 * Experience change for a specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $xpPerMinDeltas
	 */
	public $xpPerMinDeltas;

	/**
	 * Experience difference versus the calculated lane opponent(s) for a
	 * specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $xpDiffPerMinDeltas
	 */
	public $xpDiffPerMinDeltas;

	/**
	 * Participant's calculated lane. MID and BOT are legacy values. (Legal
	 * values: MID, MIDDLE, TOP, JUNGLE, BOT, BOTTOM).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var string $lane
	 */
	public $lane;

	/**
	 * Creeps for a specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $creepsPerMinDeltas
	 */
	public $creepsPerMinDeltas;

	/**
	 * Gold for a specified period.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *   - @see LeagueAPI::getMatch
	 *
	 * @var String, double[] $goldPerMinDeltas
	 */
	public $goldPerMinDeltas;
}
