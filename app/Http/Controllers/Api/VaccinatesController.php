<?php

namespace App\Http\Controllers\Api;

use App\Models\Vaccinate;
use Illuminate\Http\Request;
use App\Models\Pet_Vaccinated;
//use App\Rules\RulePetIDNotFound;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class VaccinatesController extends Controller
{
    public function index(){
        return Vaccinate::all();
    }

    public function store(Request $request){

        $this->validate($request, [
            'vacID' => 'required',
            'vacOwnerID' => 'required',
            'vacPetID' => 'required',
            'vacName' => 'required',
            'vacType' => 'required',
        ]);

        //SAVING
        $vaccinate = new Vaccinate;
    
        $vaccinate->vacID = $request->input('vacID');
        $vaccinate->vacOwnerID = $request->input('vacOwnerID');
        $vaccinate->vacPetID = $request->input('vacPetID');
        $vaccinate->vacName = $request->input('vacName');
        $vaccinate->vacType = $request->input('vacType');


        // SAVE
        $vaccinate->save();

        return response()->json(

            [
                'status_code' => JsonResponse::HTTP_OK,
                'msg' => 'Data has been added'
            ], 

            JsonResponse::HTTP_OK
        );
        
    }

    public function show($id){

        $id = Vaccinate::find($id);

        if(!$id){
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Vaccinate No. not found'
                ]
            );
        } else {
            return $id;
        }

    }

    public function update(Request $request, $petID){

        $vaccinateNum = Vaccinate::find($petID);

        $petVaccinated = new Pet_Vaccinated;

        if(!$vaccinateNum){
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Data has been updated'
                ]
            ); 
        } else {
            $vaccinateNum->update($request->all());
            
            return $vaccinateNum;
        }
    }

    public function destroy($id) {
        
        $vaccinateNum = Vaccinate::destroy($id);

        if(!$vaccinateNum){

            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg'=>'Vaccine Number not found'
                ]
            );

        } else {

            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_OK,
                    'msg'=>'Data has been deleted'
                ]
            );
        }
    }
}
