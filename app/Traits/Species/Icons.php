<?php

namespace App\Traits\Species;

trait Icons
{
    public function getSunIconAttribute()
    {
        $result = "";
        collect($this->sun)->each(function ($item) use (&$result) {
            if ($item == "full") {
                $result .= ' <i style="font-size: 2em;" class="fas fa-sun"></i>';
            }

            if ($item == "partial") {
                $result .= ' <i style="font-size: 2em;" class="fas fa-cloud-sun"></i>';
            }

            if ($item == "shade") {
                $result .= ' <i style="font-size: 2em;" class="fas fa-cloud"></i>';
            }
        });

        return $result;
    }

    public function getSoilIconAttribute()
    {
        $result = "";
        collect($this->soil)->each(function ($item) use (&$result) {
            if ($item == "light") {
                $result .= ' <i style="font-size: 2em;" class="fas fa-battery-empty"></i>';
            }

            if ($item == "mid") {
                $result .= ' <i style="font-size: 2em;" class="fas fa-battery-half"></i>';
            }

            if ($item == "heavy") {
                $result .= ' <i style="font-size: 2em;" class="fas fa-battery-full"></i>';
            }
        });

        return $result;
    }
}
