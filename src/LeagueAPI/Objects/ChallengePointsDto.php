<?php

namespace RiotAPI\LeagueAPI\Objects;

class ChallengePointsDto extends ApiObject
{
    public string $level;
    public int $current;
    public int $max;
    public float $percentile;
    public ?int $position = null;
}