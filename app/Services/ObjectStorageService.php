<?php

namespace App\Services;

class ObjectStorageService{

    protected $bucketUrl = '';
    protected $bucketName = '';
    
    function __construct()
    {
        $this->bucketUrl = env("CLOUDEKA_BUCKET_ENDPOINT", "https://bucket.cloud.lintasarta.co.id:8082");
        $this->bucketName = env("CLOUDEKA_BUCKET_NAME", "cloudeka-dev");
    }
    
    public function url(string $path)
    {
        return $this->bucketUrl.'/'.$this->bucketName.'/'.$path;
    }
}