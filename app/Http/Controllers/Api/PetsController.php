<?php

namespace App\Http\Controllers\Api;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PetsController extends Controller
{
    public function index(){

        return Pet::all();
    }

    public function show($id){

        $id = Pet::find($id);

        if(!$id){
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Pet ID not found'
                ]
            );
        }

    }

    public function update(Request $request, $id){

        $petID = Pet::find($id);

        if(!$petID){

            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Pet ID not found'
                ]
            );

        } else {
            $petID->update($request->all());
            return $petID;
        }
    }

    public function destroy($id) {
        
        $petID = Pet::destroy($id);

        if(!$petID){

            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Pet ID not found'
                ]
            );

        } else {

            return response()->json(
                [
                    'status_code'=> JsonResponse::HTTP_OK,
                    'msg' => 'Pet has been deleted'
                ]
            );
        }
    }
}
