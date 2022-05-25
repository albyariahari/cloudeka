<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\Package;

class PackageService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->all();

            $package = Package::create($input);

            return $package;
        });
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $input = $request->all();

            $package = Package::findOrFail($id);
            $package->update($input);

            return $package;
        });
    }
}
