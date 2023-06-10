<?php

/**
 * Copyright (C) 2016-2022  Daniel Dolejška
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
 *   match (v5)
 *     - @see LeagueAPI::getTimeline
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getTimeline
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchEventDto extends ApiObject
{
	public int $timestamp;
    public int|null $actualStartTime = null;
	public string $type;

	public int|null $realTimestamp = null;
	public int|null $itemId = null;
	public int|null $level = null;
	public string|null $levelUpType = null;
	public int|null $skillSlot = null;
	public int|null $participantId = null;
	public int|null $afterId = null;
	public int|null $beforeId = null;
	public int|null $goldGain = null;
	public int|null $creatorId = null;
	public string|null $wardType = null;
	public array|null $assistingParticipantIds = null;
	public int|null $bounty = null;
	public int|null $killerId = null;
	public int|null $killerTeamId = null;
	public string|null $monsterType = null;
	public string|null $monsterSubType = null;
	public ?MatchPositionDto $position = null;


	public int|null $gameId = null;
	public int|null $winningTeam = null;

	public string|null $killType = null;
	public int|null $multiKillLength = null;


	public int|null $killStreakLength = null;
	public int|null $shutdownBounty = null;
	public array|null $victimDamageDealt = null; // MatchEventDamageDto
	public array|null $victimDamageReceived = null; // MatchEventDamageDto
	public int|null $victimId = null;

	public string|null $buildingType = null;
	public string|null $laneType = null;
	public int|null $teamId = null;
	public string|null $towerType = null;
}
