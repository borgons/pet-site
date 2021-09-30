<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    public function index(){

        return Appointment::when(request('appPetID'), function($query){
            $query->where('appPetID', request('appPetID'));
        })->paginate(4);
    }

    public function store(Request $request){

        $this->validate($request, [
            'appNumber' => 'required',
            'appPetID' => 'required',
            'appPetName' => 'required',
            'appPurpose' => 'required',
            'appDate' => 'required',
        ]);

        // SAVING
        $appointment = new Appointment;

        $appointment->appNumber = $request->input('appNumber');
        $appointment->appPetID = $request->input('appPetID');
        $appointment->appPetName = $request->input('appPetName');
        $appointment->appPurpose = $request->input('appPurpose');
        $appointment->appDate = $request->input('appDate');

        // SAVE
        $appointment->save();

        return response()->json(
            [
                'status_code' => JsonResponse::HTTP_OK,
                'msg' => 'Your appointment has been scheduled!!!'
            ],
            JsonResponse::HTTP_OK

        );
    }

    public function show($id){

        $id = Appointment::find($id);

        if(!$id){

            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND, 
                    'msg' => 'Appointment Number not found'
                ]
            );

        } else {
            return $id;
        }
    }

    public function search($appPetID){
        $appPetID = Appointment::where('appPetID', $appPetID )->doesntExist();
            
        if($appPetID) {
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg'=>'Pet ID  No. not found'
                ]
            );
        } else {
            return Appointment::query()
            ->when(request()->url('appPetID'), function($query){
                return $query->where('appPetID',  request('appPetID') );   
            })->get();
        }
    }


    public function update(Request $request, $id){

        $appointID = Appointment::find($id);

        if(!$appointID){
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Appointment Number Not Found'
                ]
            );
        } else {
            $appointID->update($request->all());
            return $appointID;
        }
    }

    

    public function destroy($id) {
        
        $appointID = Appointment::destroy($id);

        if(!$appointID){
            return response()->json(
                [
                    'status_code' => JsonResponse::HTTP_NOT_FOUND,
                    'msg' => 'Appointment has been deleted'
                ]
            );
        }
    }

    
}
