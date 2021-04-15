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
 *   Class MatchEventDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatchTimeline
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchTimeline
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchEventDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $laneType
	 */
	public $laneType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $skillSlot
	 */
	public $skillSlot;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $ascendedType
	 */
	public $ascendedType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $creatorId
	 */
	public $creatorId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $afterId
	 */
	public $afterId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $eventType
	 */
	public $eventType;

	/**
	 * (Legal values: CHAMPION_KILL, WARD_PLACED, WARD_KILL, BUILDING_KILL,
	 * ELITE_MONSTER_KILL, ITEM_PURCHASED, ITEM_SOLD, ITEM_DESTROYED,
	 * ITEM_UNDO, SKILL_LEVEL_UP, ASCENDED_EVENT, CAPTURE_POINT,
	 * PORO_KING_SUMMON).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $type
	 */
	public $type;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $levelUpType
	 */
	public $levelUpType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $wardType
	 */
	public $wardType;

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
	 * @var string $towerType
	 */
	public $towerType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $itemId
	 */
	public $itemId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $beforeId
	 */
	public $beforeId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $pointCaptured
	 */
	public $pointCaptured;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $monsterType
	 */
	public $monsterType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $monsterSubType
	 */
	public $monsterSubType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $teamId
	 */
	public $teamId;

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
	 * @var int $killerId
	 */
	public $killerId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $timestamp
	 */
	public $timestamp;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int[] $assistingParticipantIds
	 */
	public $assistingParticipantIds;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var string $buildingType
	 */
	public $buildingType;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatchTimeline
	 *
	 * @var int $victimId
	 */
	public $victimId;
}
