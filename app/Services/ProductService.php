<?php

namespace App\Services;

use Illuminate\Http\Request;
use Str;
use DB;

// Models
use App\Models\Benefit;
use App\Models\Product;
use App\Models\UseCase;

class ProductService
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

                if(cloudekaStore('product/'.$newFilename, file_get_contents($request->file('images')), $file->getClientMimeType()))
                    $params['images'] = 'product/'.$newFilename;
            }

            if ($request->hasFile('logo_1')) {
                $file = $request->file('logo_1');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('product/'.$newFilename, file_get_contents($request->file('logo_1')), $file->getClientMimeType()))
                    $params['logo_1'] = 'product/'.$newFilename;
            }

            if ($request->hasFile('logo_2')) {
                $file = $request->file('logo_2');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('product/'.$newFilename, file_get_contents($request->file('logo_2')), $file->getClientMimeType()))
                    $params['logo_2'] = 'product/'.$newFilename;
            }

            if ($request->hasFile('benefit.*.icon')) {
                foreach ($request->get('benefit') as $key => $value) {
                    $file = $request->file('benefit.'.$key.'.icon');
                    $hashedName = hash_file('md5', $file->path());
                    $rand = random_int(100000, 999999);
    
                    $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                    if(cloudekaStore('benefit/'.$newFilename, file_get_contents($request->file('benefit.'.$key.'.icon')), $file->getClientMimeType()))
                    $params['image_2'] = 'benefit/'.$newFilename;

                    $params['benefit'][$key]['icon'] = 'benefit/'.$newFilename;
                }
            }

            $datas = null;
            $datas['product']['category_id'] = $params['category_id'];
            foreach (languages() as $value) {
                $datas['product'][$value] = $params;
                $datas['product'][$value]['slug'] = Str::slug($params['title']);
                if ($request->has('case')) {
                    foreach ($params['case'] as $key => $case) {
                        $datas['useCase'][$key][$value] = $case;
                        $datas['useCase'][$key]['case_id'] = $case['case_id'];
                        $datas['useCase'][$key]['client_id'] = $case['client_id'];
                    }
                }
                foreach ($params['benefit'] as $key => $benefit) {
                    $datas['benefit'][$key][$value] = $benefit;
                }
            }

            $product = Product::create($datas['product']);
            $partner = [];
            foreach ($params['partner'] as $key => $value) {
                $partner[$value] = [
                    'order' => $key + 1
                ];
            }

            $product->Partners()->attach($partner);

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

            $product->UseCases()->attach($use_case_id);

            foreach ($datas['benefit'] as $key => $value) {
                $value['product_id'] = $product->id;
                $product->Benefits()->save(Benefit::create($value));
            }

            return $product;
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

                if(cloudekaStore('product/'.$newFilename, file_get_contents($request->file('images')), $file->getClientMimeType()))
                    $params['images'] = 'product/'.$newFilename;
            }

            if ($request->hasFile('logo_1')) {
                $file = $request->file('logo_1');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('product/'.$newFilename, file_get_contents($request->file('logo_1')), $file->getClientMimeType()))
                    $params['logo_1'] = 'product/'.$newFilename;
            }

            if ($request->hasFile('logo_2')) {
                $file = $request->file('logo_2');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if(cloudekaStore('product/'.$newFilename, file_get_contents($request->file('logo_2')), $file->getClientMimeType()))
                    $params['logo_2'] = 'product/'.$newFilename;
            }

            $product = Product::findOrFail($id);
            $product->category_id = $input['category_id'];
            $product->save();
            $product->translate($lang)->update($input);

            $partner = [];
            foreach ($input['partner'] as $key => $value) {
                $partner[$value] = [
                    'order' => $key + 1
                ];
            }

            $product->Partners()->detach();
            $product->Partners()->sync($partner);

            $use_case_id = [];
            if ($request->has('case')) {
                foreach ($input['case'] as $key => $value) {
                    if ($value['case_id'] > 0) {
                        $useCase = UseCase::find($value['case_id']);
                    } else {
                        $data = [];
                        foreach (languages() as $key => $lang) {
                            $data[$lang]['description'] = $value['description'];
                            $data['client_id'] = $value['client_id'];
                        }
                        $useCase = UseCase::create($data);
                    }
                    $use_case_id[] = $useCase->id;
                }
            }

            $product->UseCases()->detach();
            $product->UseCases()->attach($use_case_id);

            foreach ($input['benefit'] as $key => $value) {
                if ($value['benefit_id'] > 0) {
                    $benefit = Benefit::find($value['benefit_id']);
                    $benefit->translate($lang)->description = $value['description'];
                    $benefit->translate($lang)->title = $value['title'];

                    if ($request->hasFile('benefit.' . $key . '.icon')) {
                        $file = $request->file('benefit.'.$key.'.icon');
                        $hashedName = hash_file('md5', $file->path());
                        $rand = random_int(100000, 999999);
        
                        $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();
    
                        if(cloudekaStore('benefit/'.$newFilename, file_get_contents($request->file('benefit.'.$key.'.icon')), $file->getClientMimeType()))
                        $params['image_2'] = 'benefit/'.$newFilename;

                        $benefit->translate($lang)->icon = 'benefit/'.$newFilename;
                    }

                    $benefit->save();
                } else {
                    $data = [];
                    foreach (languages() as $lang) {
                        $data[$lang] = $value;
                        if ($request->hasFile('benefit.' . $key . '.icon')) {
                            $file = $request->file('benefit.'.$key.'.icon');
                            $hashedName = hash_file('md5', $file->path());
                            $rand = random_int(100000, 999999);
            
                            $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();
        
                            if(cloudekaStore('benefit/'.$newFilename, file_get_contents($request->file('benefit.'.$key.'.icon')), $file->getClientMimeType()))
                            $params['image_2'] = 'benefit/'.$newFilename;
                            
                            $data[$lang]['icon'] = 'benefit/'.$newFilename;
                        }
                    }
                    $data['product_id'] = $product->id;
                    $product->Benefits()->save(Benefit::create($data));
                }
            }

            return $product;
        });
    }
}
