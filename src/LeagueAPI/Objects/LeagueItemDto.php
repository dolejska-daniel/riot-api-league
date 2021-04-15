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
 *   Class LeagueItemDto
 *
 * Used in:
 *   league (v4)
 *     - @see LeagueAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getGrandmasterLeague
 *     - @see LeagueAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getMasterLeague
 *     - @see LeagueAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getChallengerLeague
 *     - @see LeagueAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#league-v4/GET_getLeagueById
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class LeagueItemDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var bool $freshBlood
	 */
	public $freshBlood;

	/**
	 * Winning team on Summoners Rift.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var int $wins
	 */
	public $wins;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var string $summonerName
	 */
	public $summonerName;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var MiniSeriesDTO $miniSeries
	 */
	public $miniSeries;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var bool $inactive
	 */
	public $inactive;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var bool $veteran
	 */
	public $veteran;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var bool $hotStreak
	 */
	public $hotStreak;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var string $rank
	 */
	public $rank;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var int $leaguePoints
	 */
	public $leaguePoints;

	/**
	 * Losing team on Summoners Rift.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var int $losses
	 */
	public $losses;

	/**
	 * Player's encrypted summonerId.
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getGrandmasterLeague
	 *   - @see LeagueAPI::getMasterLeague
	 *   - @see LeagueAPI::getChallengerLeague
	 *   - @see LeagueAPI::getLeagueById
	 *
	 * @var string $summonerId
	 */
	public $summonerId;
}
