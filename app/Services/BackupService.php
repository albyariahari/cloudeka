<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class BackupService
{
    public function backup()
    {
        Artisan::call('backup:clean');
        Artisan::call('backup:run --only-db');
        $path = storage_path('app/Laravel/*');
        $latest_ctime = 0;
        $latest_filename = '';
        $files = glob($path);
        foreach ($files as $file) {
            if (is_file($file) && filectime($file) > $latest_ctime) {
                $latest_ctime = filectime($file);
                $latest_filename = $file;
            }
        }
        echo "done backup \n";
        $filename = Carbon::now()->toDateString() . '.zip';
        $filenameDelete = Carbon::now()->subDays(env('ROUND_ROBIN_BACKUP', 61))->toDateString() . '.zip';
        $exist = cloudekaGet('uploads/database/' . $filenameDelete);
        echo "done exist \n";
        if ($exist["http_code"] === 200) {
            $exist = cloudekaDelete('uploads/database/' . $filenameDelete);
            echo "done delete \n";
        }
        $store = cloudekaStore('uploads/database/' . $filename, file_get_contents($latest_filename), 'application/zip');
        echo "done upload";
    }
}
