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
 *   Class LeagueListDto
 *
 * Used in:
 *   league (v4)
 *     - @see LeagueAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
 *     - @see LeagueAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueById
 *     - @see LeagueAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getChallengerLeague
 *     - @see LeagueAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getGrandmasterLeague
 *
 * @iterable $entries
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class LeagueListDto extends ApiObjectIterable
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $leagueId
	 */
	public string $leagueId;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var LeagueItemDTO[] $entries
	 */
	public array $entries;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $tier
	 */
	public string $tier;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $queue
	 */
	public string $queue;
}
