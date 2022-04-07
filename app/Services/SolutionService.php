<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use Str;

// Models
use App\Models\UseCase;
use App\Models\Solution;

class SolutionService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $params = $request->all();

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('images')), $file->getClientMimeType()))
                    $params['images'] = 'solution/'.$newFilename;
            }

            if ($request->hasFile('logo_1')) {
                $file = $request->file('logo_1');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('logo_1')), $file->getClientMimeType()))
                    $params['logo_1'] = 'solution/'.$newFilename;
            }

            if ($request->hasFile('logo_2')) {
                $file = $request->file('logo_2');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('logo_2')), $file->getClientMimeType()))
                    $params['logo_2'] = 'solution/'.$newFilename;
            }

            if ($request->hasFile('bottom_image')) {
                $file = $request->file('bottom_image');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('bottom_image')), $file->getClientMimeType()))
                    $input['bottom_image'] = 'solution/'.$newFilename;
            }
            
            $datas = null;
            foreach (languages() as $value) {
                $datas['solution'][$value] = $params;
                $datas['solution'][$value]['slug'] = Str::slug($params['title']);
                if ($request->has('case')) {
                    foreach ($params['case'] as $key => $case) {
                        $datas['useCase'][$key][$value] = $case;
                        $datas['useCase'][$key]['case_id'] = $case['case_id'] ?? 0;
                        $datas['useCase'][$key]['client_id'] = $case['client_id'] ?? 0;
                    }
                }
            }

            $solution = Solution::create($datas['solution']);

            $solution->Products()->attach($params['product']);

            $use_case_id = [];
            if ($request->has('case')) {
                foreach ($datas['useCase'] as $key => $value) {
                    if ($value['case_id'] > 0)
                        $useCase = UseCase::find($value['case_id']);
                    else
                        $useCase = UseCase::create($value);

                    $use_case_id[] = $useCase->id;
                }
            }

            $solution->UseCases()->attach($use_case_id);

            return $solution;
        });
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $input = $request->all();
            $lang = $input['language'];
            $input['slug'] = Str::slug($input['title']);
            
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('images')), $file->getClientMimeType()))
                    $input['images'] = 'solution/'.$newFilename;
            }

            if ($request->hasFile('logo_1')) {
                $file = $request->file('logo_1');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('logo_1')), $file->getClientMimeType()))
                    $input['logo_1'] = 'solution/'.$newFilename;
            }

            if ($request->hasFile('logo_2')) {
                $file = $request->file('logo_2');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('logo_2')), $file->getClientMimeType()))
                    $input['logo_2'] = 'solution/'.$newFilename;
            }

            if ($request->hasFile('bottom_image')) {
                $file = $request->file('bottom_image');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('solution/'.$newFilename, file_get_contents($request->file('bottom_image')), $file->getClientMimeType()))
                    $input['bottom_image'] = 'solution/'.$newFilename;
            }


            $solution = Solution::findOrFail($id);
            $solution->translate($lang)->update($input);

            $solution->Products()->detach();
            $solution->Products()->attach($input['product']);

            $use_case_id = [];
            if ($request->has('case')) {
                foreach ($input['case'] as $key => $value) {
                    if ($value['case_id'] > 0) {
                        $useCase = UseCase::find($value['case_id']);
                    } else {
                        $data = [];
                        foreach (languages() as $key => $lang) {
                            $data[$lang]['description'] = $value['description'];
                            $data['client_id'] = $value['client'];
                        }
                        $useCase = UseCase::create($data);
                    }
                    $use_case_id[] = $useCase->id;
                }
            }

            $solution->UseCases()->detach();
            $solution->UseCases()->attach($use_case_id);

            return $solution;
        });
    }
}
