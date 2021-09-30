<?php

namespace App\Http\Controllers\Api;

use App\Models\Vaccinate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){
        return Vaccinate::when(request('vacOwnerID'), function($query){
            $query->where('vacOwnerID', request('vacOwnerID'));
        })->paginate(4);
    }

    public function srchOwnerID($vacOwnerID){
        $vacOwnerID = Vaccinate::where('vacOwnerID', $vacOwnerID)->doesntExist();
            
        if($vacOwnerID) {
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg'=>'OwnerID ID  No. not found'
                ]
            );
        } else {
            return Vaccinate::query()
            ->when(request()->url('vacOwnerID'), function($query){
                return $query->where('vacOwnerID',  request('vacOwnerID') );   
            })->get();
        }
    }
}
