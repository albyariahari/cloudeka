<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\PackageType;

class PackageTypeService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->all();

            $package = PackageType::create($input);

            return $package;
        });
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $input = $request->all();

            $package = PackageType::findOrFail($id);
            $package->update($input);

            return $package;
        });
    }
}
