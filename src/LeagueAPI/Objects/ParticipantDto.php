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
 *   Class ParticipantDto
 *
 * Used in:
 *   match (v4)
 *     - @see LeagueAPI::getMatch
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatch
 *     - @see LeagueAPI::getMatchByTournamentCode
 *       @link https://developer.riotgames.com/apis#match-v4/GET_getMatchByTournamentCode
 *
 * @linkable getStaticChampion($championId)
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ParticipantDto extends ApiObjectLinkable
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var int $participantId
	 */
	public $participantId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var int $championId
	 */
	public $championId;

	/**
	 * List of legacy Rune information. Not included for matches played with
	 * Runes Reforged.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var RuneDto[] $runes
	 */
	public $runes;

	/**
	 * Participant statistics.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var ParticipantStatsDto $stats
	 */
	public $stats;

	/**
	 * 100 for blue side. 200 for red side.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var int $teamId
	 */
	public $teamId;

	/**
	 * Participant timeline data.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var ParticipantTimelineDto $timeline
	 */
	public $timeline;

	/**
	 * First Summoner Spell id.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var int $spell1Id
	 */
	public $spell1Id;

	/**
	 * Second Summoner Spell id.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var int $spell2Id
	 */
	public $spell2Id;

	/**
	 * Highest ranked tier achieved for the previous season in a specific
	 * subset of queueIds, if any, otherwise null. Used to display border in
	 * game loading screen. Please refer to the Ranked Info documentation.
	 * (Legal values: CHALLENGER, MASTER, DIAMOND, PLATINUM, GOLD, SILVER,
	 * BRONZE, UNRANKED).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var string $highestAchievedSeasonTier
	 */
	public $highestAchievedSeasonTier;

	/**
	 * List of legacy Mastery information. Not included for matches played
	 * with Runes Reforged.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMatch
	 *   - @see LeagueAPI::getMatchByTournamentCode
	 *
	 * @var MasteryDto[] $masteries
	 */
	public $masteries;
}
