<?php

namespace App;

use App\Traits\Species\Icons;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use Icons;
    
    const HARDINESS_CA = ['0', '0a', '0b', '1', '1a', '1b', '2', '2a', '2b', '3', '3a', '3b', '4', '4a', '4b', '5', '5a', '5b', '6', '6a', '6b', '7', '7a', '7b', '8', '8a', '8b', '9', '9a', '9b'];
    const SUN = ['full', 'partial', 'shade'];
    const WATER = [1, 2, 3, 4, 5];
    const SOIL = ['light', 'mid', 'heavy', 'aqua'];
    const SHAPES = ['tree', 'shrub', 'herbaceous', 'vine'];
    const ROOTS = ['bulb', 'fleshy', 'basal', 'fasciculated', 'lateral', 'rotating', 'rhizome', 'superficial', 'tuber'];
    const WILDLIFE_USES = ['food', 'shelter'];
    const POLLINATING_TYPES = ['specialist', 'generalist'];
    const ECOLOGICAL_USES = ['riparian', 'slope', 'flood'];
    const COMESTIBLE_USES = ['flower', 'fruit', 'leave', 'nut', 'seed', 'root'];
    const FLOWERING_PERIODS = ['spring', 'summer', 'fall'];
    const FLOWERING_COLORS = ['red', 'rose', 'white', 'yellow', 'orange', 'purple'];
    const FOLIAGE_COLORS = ['green', 'pale', 'dark', 'purple'];
    const POST_SUMMER_APPEALS = ['fall', 'winter'];
    const GROWTH_SPEEDS = ['fast', 'medium', 'slow'];
    const PRUNING_PERIODS = ['before budding', 'after flowering', 'summer', 'fall', 'anytime', "Don't prune"];
    const MULTIPLICATIONS = ['cuttings', 'cuttings (spring)', 'cuttings (fall)', 'division', 'division (spring)', 'division (fall)', 'seedling', 'seedling (spring)', 'seedling (fall)', 'graft', 'graft (spring)', 'graft (fall)', 'stolon', 'stolon (spring)', 'stolon (fall)'];
    const DISADVANTAGES = ['expansive', 'dispersive', 'allergen', 'poison', 'thorny'];

    protected $fillable = ['name', 'name_en', 'name_fr', 'hardiness_ca', 'sun', 'soil', 'water', 'ph_min', 'ph_max', 'shape', 'root', 'maturity_height_meters', 'maturity_width_meters', 'nitrogen_fixer', 'nutrient_accumulator', 'ground_cover', 'hedge', 'wildlife_use', 'ecological_use', 'pollinating_type', 'comestible_use', 'medicinal_use', 'flowering_period', 'flowering_color', 'foliage_color', 'post_summer_appeal', 'growth', 'pruning_period', 'multiplication', 'disadvantages'];

    protected $casts = [
        'sun' => 'json',
        'soil' => 'json',
        'shape' => 'json',
        'root' => 'json',
        'wildlife_use' => 'json',
        'ecological_use' => 'json',
        'pollinating_type' => 'json',
        'comestible_use' => 'json',
        'flowering_period' => 'json',
        'flowering_color' => 'json',
        'foliage_color' => 'json',
        'post_summer_appeal' => 'json',
        'growth' => 'json',
        'pruning_period' => 'json',
        'multiplication' => 'json',
        'disadvantages' => 'json',
        'medicinal_use' => 'boolean',
        'nitrogen_fixer' => 'boolean',
        'nutrient_accumulator' => 'boolean',
        'ground_cover' => 'boolean',
        'hedge' => 'boolean',
    ];

    public function genus()
    {
        return $this->belongsTo(Genus::class);
    }

    public function getBinominalNameAttribute()
    {
        return $this->genus->name . " " . strtolower($this->name);
    }
}
