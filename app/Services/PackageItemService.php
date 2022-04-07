<?php

namespace App\Services;

use Illuminate\Http\Request;
use Str;
use DB;

// Models
use App\Models\PackageItem;

class PackageItemService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->all();
            $input['slug'] = Str::slug($input['name']);
            $input['hourly_price'] = isset($input['hourly_price']) ? $input['hourly_price'] : 0;
            $input['monthly_price'] = isset($input['monthly_price']) ? $input['monthly_price'] : 0;
            $item = PackageItem::create($input);

            $item->CalculatorComponents()->attach($input['component']);

            return $item;
        });
    }

    public function update(Request $request, $package_id, $id)
    {
        DB::transaction(function () use ($request, $package_id, $id) {
            $input = $request->all();
            $input['slug'] = Str::slug($input['name']);
            $input['hourly_price'] = isset($input['hourly_price']) ? $input['hourly_price'] : 0;
            $input['monthly_price'] = isset($input['monthly_price']) ? $input['monthly_price'] : 0;
            $item = PackageItem::where('package_id', $package_id)->findOrFail($id);
            $item->update($input);

            $item->CalculatorComponents()->detach();
            $item->CalculatorComponents()->attach($input['component']);

            return $item;
        });
    }
}
