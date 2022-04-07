<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\Documentation;

class DocumentationService {
	private function __MultilanguagesInput($input, $lang = null) {
		$arr = $input;
		
		foreach (languages() as $lang)
			$arr[$lang] = $input;
		
		return $arr;
	}
	
	private function __RecursiveCreate($parent, $childs) {
		foreach ($childs as $key => $val) {
			$val['product_id'] = $parent->product_id;
			$val['level'] = $parent->level + 1;
			$val['order'] = $key + 1;
			
			if (!$doc = $parent->childs()->create($this->__MultilanguagesInput($val)))
				return false;
		
			if (isset($val['subs']) && is_array($val['subs']) && count($val['subs'])) {
				if (!$this->__RecursiveCreate($doc, $val['subs']))
					return false;
			}
		}
		
		return true;
	}
	
	private function __RecursiveUpdate($parent, $childs) {
		foreach ($childs as $key => $val) {
			$val2['product_id'] = $parent->product_id;
			$val2['order'] = $key + 1;
			
			if ($doc = $parent->childs->find($val['id'])) {
				$val2['updated_at'] = date('Y-m-d H:i:s');
				
				if (!$doc->update($val2) || !$doc->translate($val['lang'])->update($val))
					return false;
			} else {
				$val['level'] = $parent->level + 1;
				$val['created_at'] = date('Y-m-d H:i:s');
				
				if (!$doc = $parent->childs()->create($this->__MultilanguagesInput($val)))
					return false;
			}
		
			if (isset($val['subs']) && is_array($val['subs']) && count($val['subs'])) {
				if (!$this->__RecursiveUpdate($doc, $val['subs']))
					return false;
			}
		}
		
		return true;
	}
	
	public function StoreAndGetFileName($file) {
		$hash = hash_file('md5', $file->path());
		$rand = random_int(100000, 999999);
		$ext = $file->getClientOriginalExtension();
		$mime = $file->getClientMimeType();
		$name = "uploads/{$hash}{$rand}.{$ext}";
		
		if (cloudekaStore($name, file_get_contents($file), $mime) !== true)
			return false;
		
		return cloudekaURL($name);
	}
	
    public function CreateAll($input) {
        return DB::transaction(function () use ($input) {
			$input['product_id'] = $input['product'];
			$input['level'] = 0;
			$input['order'] = (Documentation::where('product_id', $input['product_id'])->get()->last()->order ?? 0) + 1;
			
			if(empty($input['publish_at'])){
				$input['status'] = 'publish';
			}else{
				$publish_at = \Carbon\Carbon::parse($input['publish_at'], "Asia/Jakarta");
				if($publish_at->lessThan(\Carbon\Carbon::now('Asia/Jakarta'))){
					$input['status'] = 'publish';
				}else{
					$input['status'] = 'draft';
				}
			}

			if ($input['file'] !== 'undefined') {
				if (!$input['file'] = $this->StoreAndGetFileName($input['file']))
					return false;
			} else {
				unset($input['file']);
			}
			
            if (!$doc = Documentation::create($this->__MultilanguagesInput($input)))
				return false;
			
			if (isset($input['subs']) && is_array($input['subs']) && count($input['subs'])) {
				if (!$this->__RecursiveCreate($doc, $input['subs']))
					return false;
			}
			
			return $doc;
        });
    }

    public function UpdateAll($input, $id) {
        return DB::transaction(function () use ($input, $id) {
			$doc = Documentation::find($id);
			
			$input2['product_id'] = $input['product'];
			$input2['updated_at'] = date('Y-m-d H:i:s');
			
			if(empty($input['publish_at'])){
				// Status tidak berubah
			}else{
				$publish_at = \Carbon\Carbon::parse($input['publish_at']);
				if($publish_at->lessThan(\Carbon\Carbon::now('Asia/Jakarta'))){
					// Status tidak berubah
				}else{
					$input['status'] = 'draft';
				}
			}

			if ($input['file'] !== 'undefined') {
				if (!$input['file'] = $this->StoreAndGetFileName($input['file']))
					return false;
			} else {
				unset($input['file']);
			}
			
			if (isset($input['subs']) && is_array($input['subs']) && count($input['subs'])) {
				if (!$this->__RecursiveUpdate($doc, $input['subs']))
					return false;
			}
			
			return $doc->update($input2) && $doc->touch() && $doc->translate($input['lang'])->update($input);
		});
    }
}