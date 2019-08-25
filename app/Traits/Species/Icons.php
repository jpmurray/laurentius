<?php

namespace App\Traits\Species;

trait Icons
{
    public function getSunIconAttribute()
    {
        $result = "";
        collect($this->sun)->each(function ($item) use (&$result) {
            if ($item == "unknown") {
                $result .= ' <i class="far fa-question-circle"></i>';
            }

            if ($item == "full") {
                $result .= ' <i class="fas fa-sun"></i>';
            }

            if ($item == "partial") {
                $result .= ' <i class="fas fa-cloud-sun"></i>';
            }

            if ($item == "shade") {
                $result .= ' <i class="fas fa-cloud"></i>';
            }
        });

        return $result;
    }

    public function getSoilIconAttribute()
    {
        $result = "";
        collect($this->soil)->each(function ($item) use (&$result) {
            if ($item == "unknown") {
                $result .= ' <i class="far fa-question-circle"></i>';
            }
            
            if ($item == "light") {
                $result .= ' <i class="fas fa-battery-empty"></i>';
            }

            if ($item == "mid") {
                $result .= ' <i class="fas fa-battery-half"></i>';
            }

            if ($item == "heavy") {
                $result .= ' <i class="fas fa-battery-full"></i>';
            }
        });

        return $result;
    }

    public function getWaterIconAttribute()
    {
        if ($this->water == "unknown") {
            return '<i class="far fa-question-circle"></i>';
        }

        $icons="";

        for ($i=0; $i < $this->water; $i++) {
            $icons .= "💧";
        }

        return $icons;
    }
}
