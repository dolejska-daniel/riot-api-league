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
 *   Class ChallengeConfigInfoDto
 *
 * Used in:
 *   lol-challenges (v1)
 *     - @see LeagueAPI::getAllChallengeConfigs
 *       @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getAllChallengeConfigs
 *     - @see LeagueAPI::getChallengeConfigs
 *       @link https://developer.riotgames.com/apis#lol-challenges-v1/GET_getChallengeConfigs
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class ChallengeConfigInfoDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var int $id
	 */
	public int $id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var string[] $localizedNames
	 */
	public array $localizedNames;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var string $state
	 */
	public string $state;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var string|null $tracking
	 */
	public ?string $tracking = null;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var int|null $startTimestamp
	 */
	public ?int $startTimestamp = null;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var int|null $endTimestamp
	 */
	public ?int $endTimestamp = null;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var bool $leaderboard
	 */
	public bool $leaderboard;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getAllChallengeConfigs
	 *   - @see LeagueAPI::getChallengeConfigs
	 *
	 * @var double[] $thresholds
	 */
	public array $thresholds;
}
