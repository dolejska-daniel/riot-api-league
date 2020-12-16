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

use RiotAPI\Base\Exceptions\GeneralException;

/**
 *   Class ApiObjectLinkable
 *
 * @package RiotAPI\LeagueAPI\Objects
 */
abstract class ApiObjectLinkable extends ApiObject
{
	/**
	 * @var null|array|object
	 */
	public $staticData = null;

	public function __get($prop)
	{
		if (!$this->staticData || !property_exists($this->staticData, $prop)) {
			$classname = get_class($this);
			throw new GeneralException("Trying to access undefined property '$prop' on object '$classname'.");
		}

		return $this->staticData->$prop;
	}
}