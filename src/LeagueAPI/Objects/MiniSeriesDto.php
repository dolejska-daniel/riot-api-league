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
 *   Class MiniSeriesDto
 *
 * Used in:
 *   league-exp (v4)
 *     - @see LeagueAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#league-exp-v4/GET_getLeagueEntries
 *   league (v4)
 *     - @see LeagueAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getGrandmasterLeague
 *     - @see LeagueAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getChallengerLeague
 *     - @see LeagueAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
 *     - @see LeagueAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntries
 *     - @see LeagueAPI::getLeagueEntriesForSummoner
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueEntriesForSummoner
 *     - @see LeagueAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueById
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class MiniSeriesDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var int $losses
	 */
	public $losses;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var string $progress
	 */
	public $progress;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var int $target
	 */
	public $target;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueEntries
	 *   - @see LeagueAPI::getLeagueEntriesForSummoner
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var int $wins
	 */
	public $wins;
}
