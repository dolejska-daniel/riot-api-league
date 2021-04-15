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
 *   Class UpdateDto
 *
 * Used in:
 *   lol-status (v4)
 *     - @see LeagueAPI::getPlatformData
 *       @link https://developer.riotgames.com/apis#lol-status-v4/GET_getPlatformData
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class UpdateDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var int $id
	 */
	public $id;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string $author
	 */
	public $author;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var bool $publish
	 */
	public $publish;

	/**
	 * (Legal values: riotclient, riotstatus, game).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string[] $publish_locations
	 */
	public $publish_locations;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var ContentDto[] $translations
	 */
	public $translations;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string $created_at
	 */
	public $created_at;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string $updated_at
	 */
	public $updated_at;
}
