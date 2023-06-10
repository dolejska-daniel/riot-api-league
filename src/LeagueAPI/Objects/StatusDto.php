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
 *   Class StatusDto
 *
 * Used in:
 *   lol-status (v4)
 *     - @see LeagueAPI::getPlatformData
 *       @link https://developer.riotgames.com/apis#lol-status-v4/GET_getPlatformData
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class StatusDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var int $id
	 */
	public int $id;

	/**
	 * (Legal values: scheduled, in_progress, complete).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string|null $maintenance_status
	 */
	public string|null $maintenance_status = null;

	/**
	 * (Legal values: info, warning, critical).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string $incident_severity
	 */
	public string $incident_severity;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var ContentDto[] $titles
	 */
	public array $titles;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var UpdateDto[] $updates
	 */
	public array $updates;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string $created_at
	 */
	public string $created_at;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string|null $archive_at
	 */
	public string|null $archive_at = null;

	/**
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string|null $updated_at
	 */
	public string|null $updated_at = null;

	/**
	 * (Legal values: windows, macos, android, ios, ps4, xbone, switch).
	 *
	 * Available when received from:
	 *   - @see LeagueAPI::getPlatformData
	 *
	 * @var string[] $platforms
	 */
	public array $platforms;
}
