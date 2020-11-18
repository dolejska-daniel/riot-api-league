<?php

/**
 * Copyright (C) 2016-2020  Daniel Dolejška
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
 *     @link https://developer.riotgames.com/apis#lol-status-v4/GET_getPlatformData
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
class UpdateDto extends ApiObject
{
	/** @var int $id */
	public $id;

	/** @var string $author */
	public $author;

	/** @var bool $publish */
	public $publish;

	/**
	 *   (Legal values: riotclient, riotstatus, game).
	 *
	 * @var string[] $publish_locations
	 */
	public $publish_locations;

	/** @var ContentDto[] $translations */
	public $translations;

	/** @var string $created_at */
	public $created_at;

	/** @var string $updated_at */
	public $updated_at;
}
