<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

if (!function_exists('languages')) {
    function languages()
    {
        return app(\Astrotomic\Translatable\Locales::class)->toArray();
    }
}

if (!function_exists('locale_lang')) {
    function locale_lang()
    {
        return app(\Astrotomic\Translatable\Locales::class)->current();
    }
}

if (!function_exists('convertToMetadata')) {
    function convertToMetadata($from, $data)
    {
        $metadata = new stdClass;

        switch ($from) {
            case 'section':
                $metadata->meta_title = $data->title;
                $metadata->meta_keyword = $data->subtitle;
                $metadata->meta_description = $data->description;
                break;

            case 'content':
                $metadata->meta_title = empty($data->meta_title) ? $data->title : $data->meta_title;
                $metadata->meta_keyword = $data->meta_keyword;
                $metadata->meta_description = $data->meta_description;
                break;

            default:
                $metadata->meta_title = 'Sprei dan Bedcover';
                $metadata->meta_keyword = 'sprei, bedcover';
                $metadata->meta_description = 'Sprei dan Bedcover California dari BIG COLLECTION yang mengutamakan kelembutan, motif menarik, warna tahan lama dan kualitas jahitan terbaik dikelasnya';
                break;
        }

        return $metadata;
    }
}

if (!function_exists('getLastOrder')) {
    function getLastOrder($table, $filter_by = Null, $filter = Null)
    {
        if (!is_null($filter_by) && !is_null($filter))
            $data = DB::table($table)->where($filter_by, $filter)->latest()->first();
        else
            $data = DB::table($table)->latest()->first();

        return ($data->order ?? 0) + 1;
    }
}

if (!function_exists('sortOrder')) {
    function sortOrder($table, $desired_order, $current_order, $filter_by = '', $filter = '')
    {
        // Cek pindahnya ke atas atau bawah
        $move = $desired_order > $current_order ? 0 : 1;

        // Set order item yang akan dipindahkan ke 0
        if ($filter_by !== '' && $filter !== '')
            $data = DB::table($table)->where($filter_by, $filter);
        else
            $data = DB::table($table);

        $data->where('order', $current_order)->update(['order' => 0]);

        if ($filter_by != '' && $filter != '')
            $data = DB::table($table)->where($filter_by, $filter);
        else
            $data = DB::table($table);

        if ($move === 0)
            $data->where('order', '>', $current_order)->where('order', '<=', $desired_order)->update(['order' => $current_order]);
        else
            $data->where('order', '<', $current_order)->where('order', '>=', $desired_order)->update(['order' => $current_order]);

        // Update data yang dipindahkan
        // Set order item yang akan dipindahkan ke 0
        if ($filter_by !== '' && $filter !== '')
            $data = DB::table($table)->where($filter_by, $filter);
        else
            $data = DB::table($table);

        $data->where('order', 0)->update(['order' => $desired_order]);

        return true;
    }
}

if (!function_exists('cloudekaUrl')) {
    function cloudekaUrl($path)
    {
        $bucketURL = env('CLOUDEKA_BUCKET_ENDPOINT', 'https://bucket.cloud.lintasarta.co.id:8082');
        $bucketName = env('CLOUDEKA_BUCKET_NAME', 'cloudeka-production');
        return "{$bucketURL}/{$bucketName}/{$path}";
    }
}

if (!function_exists('cloudekaBucketLocalUrl')) {
    function cloudekaBucketLocalUrl($path)
    {
        $exploded = explode('/', $path);
        if(count($exploded) > 1){
            $filename = $exploded[count($exploded)-1];
            unset($exploded[count($exploded)-1]);

            return route('media',[$filename, "path" => implode("-", $exploded) ]);
        }else{
            return route('media',[$path]);
        }
        
    }
}

if (!function_exists('cloudekaStore')) {
    function cloudekaStore($path, $file, $contentType)
    {
        $bucketURL = env('CLOUDEKA_BUCKET_ENDPOINT', 'https://bucket.cloud.lintasarta.co.id:8082');
        $bucketName = env('CLOUDEKA_BUCKET_NAME', 'cloudeka-production');

        $curl = curl_init();

        $curlOpt[CURLOPT_URL] = "{$bucketURL}/{$bucketName}/{$path}";
        $curlOpt[CURLOPT_HTTPHEADER][0] = 'Accept: application/json';
        $curlOpt[CURLOPT_HTTPHEADER][1] = "Content-Type: {$contentType}";
        $curlOpt[CURLOPT_RETURNTRANSFER] = 1;
        //$curlOpt[CURLOPT_CAINFO] = '/data/cacert.pem';
        $curlOpt[CURLOPT_ENCODING] = '';
        $curlOpt[CURLOPT_MAXREDIRS] = 10;
        $curlOpt[CURLOPT_TIMEOUT] = 0;
        $curlOpt[CURLOPT_FOLLOWLOCATION] = false;
        $curlOpt[CURLOPT_HTTP_VERSION] = CURL_HTTP_VERSION_1_1;
        $curlOpt[CURLOPT_CUSTOMREQUEST] = 'PUT';
        $curlOpt[CURLOPT_POSTFIELDS] = $file;

        curl_setopt_array($curl, $curlOpt);

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);

        if ($result === FALSE) {
            throw new \Exception('CURL Error: ' . curl_error($curl), curl_errno($curl));
        } else if ($info['http_code'] === '401') {
            $decoded_result = json_decode($result, true);

            if (isset($result['status_message']))
                throw new \Exception("API Error: {$decoded_result['status_message']}", curl_errno($curl));
            else if ($_SERVER['REQUEST_URI'] !== '/login')
                throw new \Exception("API Error: {$decoded_result['status_message']}", curl_errno($curl));
        } else if ($info['http_code'] === '500' || $info['http_code'] === '404') {
            throw new \Exception('CURL Error: ' . json_encode($result), curl_errno($curl));
        }

        return true;
    }
}

if (!function_exists('cloudekaDelete')) {
    function cloudekaDelete($path)
    {
        $bucketURL = env('CLOUDEKA_BUCKET_ENDPOINT', 'https://bucket.cloud.lintasarta.co.id:8082');
        $bucketName = env('CLOUDEKA_BUCKET_NAME', 'cloudeka-production');

        $curl = curl_init();

        $curlOpt[CURLOPT_URL] = "{$bucketURL}/{$bucketName}/{$path}";
        $curlOpt[CURLOPT_RETURNTRANSFER] = 1;
        //$curlOpt[CURLOPT_CAINFO] = '/data/cacert.pem';
        $curlOpt[CURLOPT_ENCODING] = '';
        $curlOpt[CURLOPT_MAXREDIRS] = 10;
        $curlOpt[CURLOPT_TIMEOUT] = 0;
        $curlOpt[CURLOPT_FOLLOWLOCATION] = false;
        $curlOpt[CURLOPT_HTTP_VERSION] = CURL_HTTP_VERSION_1_1;
        $curlOpt[CURLOPT_CUSTOMREQUEST] = 'DELETE';

        curl_setopt_array($curl, $curlOpt);

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);

        if ($result === FALSE) {
            throw new \Exception('CURL Error: ' . curl_error($curl), curl_errno($curl));
        } else if ($info['http_code'] === '401') {
            $decoded_result = json_decode($result, true);

            if (isset($result['status_message']))
                throw new \Exception("API Error: {$decoded_result['status_message']}", curl_errno($curl));
            else if ($_SERVER['REQUEST_URI'] !== '/login')
                throw new \Exception("API Error: {$decoded_result['status_message']}", curl_errno($curl));
        } else if ($info['http_code'] === '500' || $info['http_code'] === '404') {
            throw new \Exception('CURL Error: ' . json_encode($result), curl_errno($curl));
        }

        return true;
    }
}

if (!function_exists('cloudekaGet')) {
    function cloudekaGet($path)
    {
        $bucketURL = env('CLOUDEKA_BUCKET_ENDPOINT', 'https://bucket.cloud.lintasarta.co.id:8082');
        $bucketName = env('CLOUDEKA_BUCKET_NAME', 'cloudeka-production');

        $curl = curl_init();

        $curlOpt[CURLOPT_URL] = "{$bucketURL}/{$bucketName}/{$path}";
        $curlOpt[CURLOPT_RETURNTRANSFER] = 1;
        //$curlOpt[CURLOPT_CAINFO] = '/data/cacert.pem';
        $curlOpt[CURLOPT_ENCODING] = '';
        $curlOpt[CURLOPT_MAXREDIRS] = 10;
        $curlOpt[CURLOPT_TIMEOUT] = 0;
        $curlOpt[CURLOPT_FOLLOWLOCATION] = false;
        $curlOpt[CURLOPT_HTTP_VERSION] = CURL_HTTP_VERSION_1_1;
        $curlOpt[CURLOPT_CUSTOMREQUEST] = 'GET';

        curl_setopt_array($curl, $curlOpt);

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);

        if ($result === FALSE) {
            throw new \Exception('CURL Error: ' . curl_error($curl), curl_errno($curl));
        } else if ($info['http_code'] === '401') {
            $decoded_result = json_decode($result, true);

            if (isset($result['status_message']))
                throw new \Exception("API Error: {$decoded_result['status_message']}", curl_errno($curl));
            else if ($_SERVER['REQUEST_URI'] !== '/login')
                throw new \Exception("API Error: {$decoded_result['status_message']}", curl_errno($curl));
        } else if ($info['http_code'] === '500' || $info['http_code'] === '404') {
            throw new \Exception('CURL Error: ' . json_encode($result), curl_errno($curl));
        }

        return $info;
    }
}

if (!function_exists('Order')) {
    function Order($table, $id, $move = 0, $conditions = [])
    {
        return DB::transaction(function () use ($table, $id, $move, $conditions) {
            $move = (int) $move === 0 ? 0 : 1;
            $conditions = is_array($conditions) ? $conditions : [];
            $max = DB::table($table)->where($conditions)->get()->count();
            $oldRecord = DB::table($table)->where($conditions)->where('id', $id);
            $oldOrder = $oldRecord->first()->order;
            $newOrder = $move === 0 ? $oldOrder - 1 : $oldOrder + 1;
            $newRecord = DB::table($table)->where($conditions)->where('id', '<>', $id)->where('order', $newOrder);
            //dd($oldRecord->toArray());
            if ($move === 0 && $oldOrder <= 1) {
                if ($newRecord->count() && $newRecord->update(['order' => 2]) === 0)
                    return false;

                return $oldRecord->update(['order' => 1]) !== 0;
            } else if ($move === 1 && $oldOrder >= $max) {
                if ($newRecord->count() && $newRecord->update(['order' => $max - 1]) === 0)
                    return false;

                return $oldRecord->update(['order' => $max]) !== 0;
            } else {
                if ($newRecord->count() && $newRecord->update(['order' => $oldOrder]) === 0)
                    return false;

                return $oldRecord->update(['order' => $newOrder]) !== 0;
            }
        });
    }
}

if (!function_exists('ManualSortByTranslation')) {
   
}


if (!function_exists('convertToSLug')) {
    function convertToSLug($str) {
        return Str::slug($str, '-');
    }
}

if (!function_exists('documentationUrl')) {
    function documentationUrl($parent, $child = null, $grandchild = null) {
        return URL::to('/documentation')."/".( $parent ? $parent[0].'/'.convertToSLug($parent[1]) : "")."/".( $child ?  $child[0].'/'.convertToSLug($child[1]) : "")."/".( $grandchild ? $grandchild[0].'/'.convertToSLug($grandchild[1]) : "");
    }
}

if (!function_exists('documentationPreviewUrl')) {
    function documentationPreviewUrl($parent, $child = null, $grandchild = null) {
        return URL::to('/documentation/preview')."/".( $parent ? $parent[0].'/'.convertToSLug($parent[1]) : "")."/".( $child ?  $child[0].'/'.convertToSLug($child[1]) : "")."/".( $grandchild ? $grandchild[0].'/'.convertToSLug($grandchild[1]) : "");
    }
}
