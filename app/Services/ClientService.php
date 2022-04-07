<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\Client;

class ClientService {
    public function create(Request $request) {
        return DB::transaction(function () use ($request) {
            $params = $request->all();
            
            $file = $request->file('logo');
            $hashedName = hash_file('md5', $file->path());
            $rand = random_int(100000, 999999);

            $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

            if(cloudekaStore('uploads/clients/'.$newFilename, file_get_contents($request->file('logo')), $file->getClientMimeType()))
			    $params['logo'] = 'uploads/clients/'.$newFilename;
			
            return Client::create($params);
        });
    }

    public function update(Request $request, $id) {
        return DB::transaction(function () use ($request, $id) {
            $params = $request->all();

            if ($request->hasFile('logo')){
                $file = $request->file('logo');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('uploads/clients/'.$newFilename, file_get_contents($request->file('logo')), $file->getClientMimeType()))
                    $params['logo'] = 'uploads/clients/'.$newFilename;
            }

            return Client::findOrFail($id)->update($params);
        });
    }
	
	public function status($id, $action) {
		return DB::transaction(function () use ($id, $action) {
            $input['is_shown'] = (int) $action === 1 ? 1 : 0;
            
            return Client::findOrFail($id)->update($input);
        });
    }
}
