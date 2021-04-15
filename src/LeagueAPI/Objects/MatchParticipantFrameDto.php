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
 *   Class MatchParticipantFrameDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatchTimeline
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchTimeline
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchParticipantFrameDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $participantId
	 */
	public $participantId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $minionsKilled
	 */
	public $minionsKilled;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $teamScore
	 */
	public $teamScore;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $dominionScore
	 */
	public $dominionScore;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $totalGold
	 */
	public $totalGold;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $level
	 */
	public $level;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $xp
	 */
	public $xp;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $currentGold
	 */
	public $currentGold;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var MatchPositionDto $position
	 */
	public $position;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $jungleMinionsKilled
	 */
	public $jungleMinionsKilled;
}
