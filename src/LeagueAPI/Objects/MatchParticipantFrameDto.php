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
 *   match (v5)
 *     - @see LeagueAPI::getTimeline
 *       @link https://developer.riotgames.com/apis#match-v5/GET_getTimeline
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MatchParticipantFrameDto extends ApiObject
{
	public MatchChampionStatsDto $championStats;
	public int $currentGold;
	public DamageStatsDto $damageStats;
	public int $goldPerSecond;
	public int $jungleMinionsKilled;
	public int $level;
	public int $minionsKilled;
	public int $participantId;
	public MatchPositionDto $position;
	public int $timeEnemySpentControlled;
	public int $totalGold;
	public int $xp;
}
