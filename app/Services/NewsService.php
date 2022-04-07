<?php

namespace App\Services;

use Illuminate\Http\Request;
use Str;
use DB;
use Auth;

// Models
use App\Models\News;
use App\Models\Tag;

class NewsService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $params = $request->all();

            if ($request->hasFile('outer_thumbnail')) {
                $file = $request->file('outer_thumbnail');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('news/' . $newFilename, file_get_contents($request->file('outer_thumbnail')), $file->getClientMimeType()))
                    $params['outer_thumbnail'] = 'news/' . $newFilename;
            }

            if ($request->hasFile('inner_thumbnail')) {
                $file = $request->file('inner_thumbnail');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('news/' . $newFilename, file_get_contents($request->file('inner_thumbnail')), $file->getClientMimeType()))
                    $params['inner_thumbnail'] = 'news/' . $newFilename;
            }

            if ($request->has('tags')) {
                $params['tags'] = json_decode($request->get('tags'));
            }

            $params['author_id'] = Auth::id();
            foreach (languages() as $value) {
                $params[$value] = $params;
                $params[$value]['slug'] = Str::slug($params['title']);
            }

            $news = News::create($params);
            if (isset($params['tags'])) {
                $tags = [];

                foreach ($params['tags'] as $key => $tag)
                    $tags[] = Tag::firstOrCreate(["id" => $tag->id ?? 0], ["title" => $tag->value])->id;

                $news->Tags()->attach($tags);
            }

            return $news;
        });
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $params = $request->all();
            $lang = $params['language'];
            $params['slug'] = Str::slug($params['title']);

            if ($request->hasFile('outer_thumbnail')) {
                $file = $request->file('outer_thumbnail');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('news/' . $newFilename, file_get_contents($request->file('outer_thumbnail')), $file->getClientMimeType()))
                    $params['outer_thumbnail'] = 'news/' . $newFilename;
            }

            if ($request->hasFile('inner_thumbnail')) {
                $file = $request->file('inner_thumbnail');
                $hashedName = hash_file('md5', $file->path());
                $rand = random_int(100000, 999999);

                $newFilename = $hashedName . $rand . '.' . $file->getClientOriginalExtension();

                if (cloudekaStore('news/' . $newFilename, file_get_contents($request->file('inner_thumbnail')), $file->getClientMimeType()))
                    $params['inner_thumbnail'] = 'news/' . $newFilename;
            }

            if ($request->has('tags')) {
                $params['tags'] = json_decode($request->get('tags'));
            }

            $news = News::findOrFail($id);
            $news->news_category_id = $params['news_category_id'];
            $news->start_date = $params['start_date'] ?? null;
            $news->end_date = $params['end_date'] ?? null;
            $news->type = $params['type'];
            $news->save();
            $news->translate($lang)->update($params);

            $tags = [];
            if (isset($params['tags'])) {
                foreach ($params['tags'] as $key => $tag) {
                    $tags[] = Tag::firstOrCreate([
                        "id" => $tag->id ?? 0,
                    ], [
                        "title" => $tag->value
                    ])->id;
                }
            }
            $news->Tags()->sync($tags);
            return $news;
        });
    }
}
