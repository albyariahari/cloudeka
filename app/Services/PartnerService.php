<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\Partner;

class PartnerService {
    public function create(Request $request) {
        return DB::transaction(function () use ($request) {
            $params = $request->all();

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('uploads/partners/'.$newFilename, file_get_contents($request->file('logo')), $file->getClientMimeType()))
                    $params['logo'] = 'uploads/partners/'.$newFilename;
            }
			
            return Partner::create($params);
        });
    }

    public function update(Request $request, $id) {
        return DB::transaction(function () use ($request, $id) {
            $params = $request->all();

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('uploads/partners/'.$newFilename, file_get_contents($request->file('logo')), $file->getClientMimeType()))
                    $params['logo'] = 'uploads/partners/'.$newFilename;
            }
			
            return Partner::findOrFail($id)->update($params);
        });
    }
}
