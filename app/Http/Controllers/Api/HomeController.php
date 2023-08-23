<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class HomeController extends BaseController
{


    public function cardInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'uuid' => 'required',
            
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }
        

        $contact = Contact::with('company')->where('uuid',$request->uuid)->first();
        if($contact){
            return $this->sendResponse( $contact, 'User created successfully.');
        }
        else{
            return $this->sendError('Contact not found');
        }

       
    }
}
