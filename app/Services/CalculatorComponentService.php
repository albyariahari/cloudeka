<?php

namespace App\Services;

use Illuminate\Http\Request;
use Str;
use DB;

// models
use App\Models\CalculatorComponent;

class CalculatorComponentService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->all();
            $input['slug'] = Str::slug($input['title']);
            foreach ($input['price'] as $keyPrice => $price) {
                $input['price'][$keyPrice] = intval($price ?? 0);
            }

            $component = CalculatorComponent::create($input);

            return $component;
        });
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $input = $request->all();
            $input['slug'] = Str::slug($input['title']);
            foreach ($input['price'] as $keyPrice => $price) {
                $input['price'][$keyPrice] = intval($price ?? 0);
            }

            $component = CalculatorComponent::findOrFail($id);
            $component->update($input);

            return $component;
        });
    }
}
