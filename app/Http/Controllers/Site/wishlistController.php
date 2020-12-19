<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class wishlistController extends Controller
{
    public function store(Request $request){
        if(! auth()->user()->wishlistHas($request->productId)){
            auth()->user()->wishlists()->attach($request->productId);
            return response()->json([
                'msg'   => 'Success Msg',
                'status'    => true,
            ]);
        }
        return response()->json([
            'error'   => 'Error Msg',
            'status'    => false,
        ]);
    }
}
