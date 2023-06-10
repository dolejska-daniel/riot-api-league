<?php

namespace RiotAPI\LeagueAPI\Objects;

class MatchEventDamageDto extends ApiObject
{
	public bool $basic;
	public int $magicDamage;
	public string $name;
	public int $participantId;
	public int $physicalDamage;
	public string $spellName;
	public int $spellSlot;
	public int $trueDamage;
	public string $type;
}