<?php

namespace App\Services;

use App\Models\DynamicContent;
use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\SliderItem;

class DynamicContentService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $params = $request->all();

            if ($request->hasFile('image_1')) {
                $file = $request->file('image_1');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('uploads/' . $newFilename, file_get_contents($request->file('image_1')), $file->getClientMimeType()))
                    $params['image_1'] = 'uploads/' . $newFilename;
            }

            if ($request->hasFile('image_2')) {
                $file = $request->file('image_2');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('uploads/' . $newFilename, file_get_contents($request->file('image_2')), $file->getClientMimeType()))
                    $params['image_2'] = 'uploads/' . $newFilename;
            }

            $params['order'] = getLastOrder('dynamic_contents', 'contentable_id', $request->get('contentable_id'));
            $params['author_id'] = Auth::id();

            foreach (languages() as $value) {
                $params[$value] = $params;
                $params[$value]['author_id'] = $params['author_id'];
            }

            $dynamicContent = DynamicContent::create($params);

            return $dynamicContent;
        });
    }

    public function update(Request $request, $content_id, $id)
    {
        DB::transaction(function () use ($request, $content_id, $id) {
            $params = $request->all();
            $lang = $params['lang'];

            if ($request->hasFile('image_1')) {
                $file = $request->file('image_1');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('uploads/' . $newFilename, file_get_contents($request->file('image_1')), $file->getClientMimeType()))
                    $params['image_1'] = 'uploads/' . $newFilename;
            }

            if ($request->hasFile('image_2')) {
                $file = $request->file('image_2');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('uploads/' . $newFilename, file_get_contents($request->file('image_2')), $file->getClientMimeType()))
                    $params['image_2'] = 'uploads/' . $newFilename;
            }

            $dynamicContent = DynamicContent::where('contentable_id', $content_id)->findOrFail($id);

            $dynamicContent->translate($lang)->update($params);

            return $dynamicContent;
        });
    }
}
