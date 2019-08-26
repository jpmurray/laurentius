<?php

namespace App\Http\Requests;

use App\Rules\ComestibleUse;
use App\Rules\Disadvantages;
use App\Rules\EcologicalUse;
use App\Rules\FloweringColor;
use App\Rules\FloweringPeriod;
use App\Rules\FoliageColor;
use App\Rules\Growth;
use App\Rules\HardinessCa;
use App\Rules\Multiplication;
use App\Rules\PollinatingType;
use App\Rules\PostSummerAppeal;
use App\Rules\PruningPeriod;
use App\Rules\Root;
use App\Rules\Shape;
use App\Rules\Soil;
use App\Rules\Sun;
use App\Rules\WildlifeUse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecies extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'name_fr' => 'required',
            'name_en' => 'required',
            'genus' => 'required|integer',
            'hardiness_ca' => ['nullable', new HardinessCa],
            'sun' => ['nullable', new Sun],
            'soil' => ['nullable', new Soil],
            'water' => 'nullable',
            'ph_min' => 'numeric|nullable',
            'ph_max' => 'numeric|nullable',
            'shape' => ['nullable', new Shape],
            'root' => ['nullable', new Root],
            'maturity_width_meters' => 'numeric|nullable',
            'maturity_height_meters' => 'numeric|nullable',
            'nitrogen_fixer' => 'nullable|boolean',
            'nutrient_accumulator' => 'nullable|boolean',
            'hedge' => 'nullable|boolean',
            'ground_cover' => 'nullable|boolean',
            'wildlife_use' => ['nullable', new WildlifeUse],
            'ecological_use' => ['nullable', new EcologicalUse],
            'pollinating_type' => ['nullable', new PollinatingType],
            'medicinal_use' => 'nullable|boolean',
            'comestible_use' => ['nullable', new ComestibleUse],
            'flowering_period' => ['nullable', new FloweringPeriod],
            'flowering_color' => ['nullable', new FloweringColor],
            'foliage_color' => ['nullable', new FoliageColor],
            'post_summer_appeal' => ['nullable', new PostSummerAppeal],
            'growth' => ['nullable', new Growth],
            'pruning_period' => ['nullable', new PruningPeriod],
            'multiplication' => ['nullable', new Multiplication],
            'disadvantages' => ['nullable', new Disadvantages],
            'interesting_cultivar' => 'nullable',
            'maintainers_note' => 'nullable',
            'suppliers' => 'nullable',
        ];
    }

    public function passedValidation()
    {
        // à voir.
    }
}
