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
 *   Class MiniSeriesDto
 *
 * Used in:
 *   league-exp (v4)
 *     - @see LeagueAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#league-exp-v4/GET_getLeagueEntries
 *   league (v4)
 *     - @see LeagueAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getChallengerLeague
 *     - @see LeagueAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueById
 *     - @see LeagueAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getGrandmasterLeague
 *     - @see LeagueAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
 *     - @see LeagueAPI::getLeagueEntriesForSummoner
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntriesForSummoner
 *     - @see LeagueAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntries
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MiniSeriesDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var int $losses
	 */
	public int $losses;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var string $progress
	 */
	public string $progress;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var int $target
	 */
	public int $target;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueEntries
	 *
	 * @var int $wins
	 */
	public int $wins;
}
