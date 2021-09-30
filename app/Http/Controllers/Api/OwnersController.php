<?php

namespace App\Http\Controllers\Api;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OwnersController extends Controller
{
   public function index(){
      return Owner::all();
   }

   public function show($id){

      $id = Owner::find($id);

      if(!$id){
            return response()->json(
            [
               'status_code' => JsonResponse::HTTP_NOT_FOUND,
               'msg' => 'Owner ID not found'
            ]
            );
      } else {
            return $id;
      }

   }

   public function update(Request $request, $id){

      $ownerID = Owner::find($id);

      if(!$ownerID){

         return response()->json(
            [
               'status_code' => JsonResponse::HTTP_NOT_FOUND,
               'msg'=> 'Owner ID not found'
            ]
         );
      } else {
         
         $ownerID->update($request->all());
         return $ownerID;
         
      }

   }

   public function destroy($id) {
      
      $ownerID = Owner::destroy($id);

      if(!$ownerID){

         return response()->json(
            [
               'status_code'=> JsonResponse::HTTP_NOT_FOUND,
               'msg' => 'Owner ID not found'
            ]
         );

      } else {

         return response()->json(
            [
               'status_code' => JsonResponse::HTTP_OK, 
               'msg' =>'Owner has been deleted'
            ]
         );
      }
   }

}
