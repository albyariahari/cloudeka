<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Promotion;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promotion::where('start_date', '<=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'))
                ->where('end_date', '>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'))
                ->with(['Product'])
                ->get();

        return parent::response('success', 'Success', $promos);
    }
}
