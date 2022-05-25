<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class GeneralService {
	protected static function _MultilanguagesInput($input) {
		$arr = $input;
		
		foreach (languages() as $lang)
			$arr[$lang] = $input;
		
		return $arr;
	}
	
	protected static function _ReformatDate($date, $oldFormat, $newFormat = 'Y-m-d H:i:s') {
		return date_format(date_create_from_format($oldFormat, $date), $newFormat);
	}
	
	public static function StoreDesktopAndMobile($file, $folder = 'uploads') {
		/*--- Variables ---*/
		$path = $file->path();
		$ext = $file->getClientOriginalExtension();
		$mime = $file->getClientMimeType();
		$rand = random_int(100000, 999999);
		$hash = hash_file('md5', $path);
		$width = getimagesize($file)[0] / 2;
		$height = getimagesize($file)[1] / 2;
		
		/*--- Desktop ---*/
		$nameD = "{$folder}/{$hash}{$rand}.{$ext}";
        $imgD = \Image::make($path)->save(storage_path("app/public/{$nameD}"));
		
		/*--- Mobile ---*/
		$nameM = "{$folder}/mobile/{$hash}{$rand}.{$ext}";
        $imgM = \Image::make($path)->resize($width, $height)->save(storage_path("app/public/{$nameM}"));
		
		if (cloudekaStore($nameD, file_get_contents(storage_path("app/public/{$nameD}")), $mime) !== true) {
			return false;
		} else if (cloudekaStore($nameM, file_get_contents(storage_path("app/public/{$nameM}")), $mime) !== true) {
			return false;
		} else {
			\File::delete(storage_path("app/public/{$nameD}"));
			\File::delete(storage_path("app/public/{$nameM}"));
			
			return $nameD;
		}
	}
	
	public static function StoreAndGetFileName($file, $folder = 'uploads') {
		$path = $file->path();
		$ext = $file->getClientOriginalExtension();
		$mime = $file->getClientMimeType();
		$rand = random_int(100000, 999999);
		$hash = hash_file('md5', $path);
		$name = "{$folder}/{$hash}{$rand}.{$ext}";
		
		if (cloudekaStore($name, file_get_contents($file), $mime) !== true)
			return false;
		
		return $name;
	}
}