<?php

namespace RiotAPI\LeagueAPI\Objects;

class DamageStatsDto extends ApiObject
{
	public int $magicDamageDone;
	public int $magicDamageDoneToChampions;
	public int $magicDamageTaken;
	public int $physicalDamageDone;
	public int $physicalDamageDoneToChampions;
	public int $physicalDamageTaken;
	public int $totalDamageDone;
	public int $totalDamageDoneToChampions;
	public int $totalDamageTaken;
	public int $trueDamageDone;
	public int $trueDamageDoneToChampions;
	public int $trueDamageTaken;
}