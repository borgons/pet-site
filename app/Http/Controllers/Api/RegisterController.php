<?php

namespace App\Http\Controllers\Api;

use App\Models\Pet;
use App\Models\Owner;
use App\Models\Vaccinate;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request){

        ## OWNERS & PETS ##
        $this->validate($request, [
            'ownID' => 'required',
            'ownFirst' => 'required',
            'ownLast' => 'required',
            'ownAddress' => 'required',
            'ownEmail' => 'required',
            'ownContact' => 'required',
            'petID' => 'required',
            'petName' => 'required',
            'petAge' => 'required',
            'petImage' => 'required|image|mimes:jpg,jpeg,png|max:10000',
        ]);

            //SAVING 
            $owner = new Owner;
            $pets = new Pet;

            $owner->ownID = $request->input('ownID');
            $owner->ownFirst = $request->input('ownFirst');
            $owner->ownLast = $request->input('ownLast');
            $owner->ownAddress = $request->input('ownAddress');
            $owner->ownEmail = $request->input('ownEmail');
            $owner->ownContact = $request->input('ownContact');

            $pets->petID = $request->input('petID');
            $pets->petOwnID = $request->input('ownID');
            $pets->petName = $request->input('petName');
            $pets->petAge = $request->input('petAge');

            //IMAGE
            if($request->hasFile('petImage')){
                $file = $request->file('petImage');
                $filename = $file->getClientOriginalName();
                $finalName = time() .'.'. $filename;

                $request->file('petImage')->storeAs('uploads/petsName/', $finalName, 'public');
                $pets->petImage = $filename;
            } else {
                return $request;
                $pets->petImage = '';
            }

            //SAVE
            $owner->save();
            $pets->save();

            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_OK,
                    'msg' => 'You are now registered'
                ]
            );
        
    }
}
