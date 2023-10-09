<?php

declare(strict_types=1);

namespace Config;

trait Timezone
{
    protected function getTimezone() : string
    {
        $now = new \DateTime();
        $mins = $now->getOffset() / 60;
        $sgn = ($mins < 0 ? -1 : 1);
        $mins = abs($mins);
        $hrs = floor($mins / 60);
        $mins -= $hrs * 60;

        //return sprintf('%+d:%02d', $hrs*$sgn, $mins);
        return "-03:00";
    }
}
