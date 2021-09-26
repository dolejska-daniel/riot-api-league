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
 *   Class LeagueListDto
 *
 * Used in:
 *   league (v4)
 *     - @see LeagueAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueById
 *     - @see LeagueAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getGrandmasterLeague
 *     - @see LeagueAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getChallengerLeague
 *     - @see LeagueAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class LeagueListDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *
	 * @var string $leagueId
	 */
	public $leagueId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *
	 * @var LeagueItemDTO[] $entries
	 */
	public $entries;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *
	 * @var string $tier
	 */
	public $tier;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *
	 * @var string $name
	 */
	public $name;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *
	 * @var string $queue
	 */
	public $queue;
}
