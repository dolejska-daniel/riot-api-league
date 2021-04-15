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
 *   Class CurrentGameInfo
 *
 * Used in:
 *   spectator (v4)
 *     - @see LeagueAPI::getCurrentGameInfoBySummoner
 *       @link https://developer.riotgames.com/apis#spectator-v4/GET_getCurrentGameInfoBySummoner
 *
 * @iterable $participants
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class CurrentGameInfo extends ApiObjectIterable
{
	/**
	 * The ID of the game.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var int $gameId
	 */
	public $gameId;

	/**
	 * The game type.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var string $gameType
	 */
	public $gameType;

	/**
	 * The game start time represented in epoch milliseconds.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var int $gameStartTime
	 */
	public $gameStartTime;

	/**
	 * The ID of the map.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var int $mapId
	 */
	public $mapId;

	/**
	 * The amount of time in seconds that has passed since the game started.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var int $gameLength
	 */
	public $gameLength;

	/**
	 * The ID of the platform on which the game is being played.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var string $platformId
	 */
	public $platformId;

	/**
	 * The game mode.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var string $gameMode
	 */
	public $gameMode;

	/**
	 * Banned champion information.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var BannedChampion[] $bannedChampions
	 */
	public $bannedChampions;

	/**
	 * The queue type (queue types are documented on the Game Constants page).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var int $gameQueueConfigId
	 */
	public $gameQueueConfigId;

	/**
	 * The observer information.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var Observer $observers
	 */
	public $observers;

	/**
	 * The participant information.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getCurrentGameInfoBySummoner
	 *
	 * @var CurrentGameParticipant[] $participants
	 */
	public $participants;
}
