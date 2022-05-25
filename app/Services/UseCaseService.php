<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\UseCase;
use App\Models\UseCaseTranslation;

class UseCaseService
{
    public function create(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $params = $request->all();
            $params['client_id'] = $params['client'];

            foreach (languages() as $val) {
                $params[$val] = $request->all();
                $params[$val]['author_id'] = Auth::id();
            }

            return UseCase::create($params);
        });
    }

    public function update($input, $id)
    {
        return DB::transaction(function () use ($input, $id) {
            $input['client_id'] = $input['client'];
            $input['update_id'] = Auth::id();
            $input['lang'] = $input['language'];

            if (!$uc = UseCase::find($id))
                return false;

            return $uc->update(['client_id' => $input['client']]) && $uc->translate($input['language'])->update(Arr::only($input, ['description']));
        });
    }

    public function status($id, $action)
    {
        return DB::transaction(function () use ($id, $action) {
            $input['status'] = (int) $action === 1 ? 1 : 0;
            $input['update_id'] = Auth::id();

            if (!$uc = UseCase::find($id))
                return false;

            return $uc->update($input);
        });
    }
}
