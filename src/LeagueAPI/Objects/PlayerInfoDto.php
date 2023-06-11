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
 *   Class PlayerInfoDto
 *
 * Used in:
 *   lol-challenges (v1)
 *     - @see LeagueAPI::getPlayerData
 *       @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getPlayerData
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class PlayerInfoDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlayerData
	 *
	 * @var ChallengeInfoDto[] $challenges
	 */
	public array $challenges;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlayerData
	 *
	 * @var PlayerClientPreferencesDto $preferences
	 */
	public PlayerClientPreferencesDto $preferences;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlayerData
	 *
	 * @var ChallengePointsDto $totalPoints
	 */
	public ChallengePointsDto $totalPoints;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlayerData
	 *
	 * @var ChallengePointsDto[] $categoryPoints
	 */
	public array $categoryPoints;
}
