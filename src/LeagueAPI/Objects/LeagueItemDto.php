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
 *   Class LeagueItemDto
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
 * @package RiotAPI\LeagueAPI\Objects
 */
class LeagueItemDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var bool $freshBlood
	 */
	public bool $freshBlood;

	/**
	 * Winning team on Summoners Rift.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var int $wins
	 */
	public int $wins;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $summonerName
	 */
	public string $summonerName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var MiniSeriesDTO|null $miniSeries
	 */
	public ?MiniSeriesDTO $miniSeries = null;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var bool $inactive
	 */
	public bool $inactive;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var bool $veteran
	 */
	public bool $veteran;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var bool $hotStreak
	 */
	public bool $hotStreak;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $rank
	 */
	public string $rank;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var int $leaguePoints
	 */
	public int $leaguePoints;

	/**
	 * Losing team on Summoners Rift.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var int $losses
	 */
	public int $losses;

	/**
	 * Player's encrypted summonerId.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getLeagueById
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;
}
