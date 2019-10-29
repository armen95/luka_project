<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Freelancers;


class AdminController extends Controller
{
	/*********** Admin Page View ************/ 
    public function index() {
    	return view('admin/admin');
    }


    public function showFreelancers()
    {
		$freelancers = Freelancers::all();

		return view('admin/freelancers')->with('freelancers', $freelancers);
    }

    public function addFreelancer()
    {
		return view('admin/addFreelancer');
    }

    public function deleteFreelancer(Request $request){
		$id = $request->id;
		if(isset($id) && !empty($id)){
			$row = Freelancers::find($id);
			$row->delete();
			if($row){
				echo json_encode(array('success' => true));die;
			}
			else{
				echo json_encode(array('success' => false));die;
			}
		}
		else{
			echo json_encode(array('success' => false));die;
		}
	}

    public function saveFreelancer(Request $request)
    {

		$rules = [
            'name' => 'required',
            'email' => 'required|email|unique:contractors,email',
            'contact' =>"required",
            'source_lang'=> "required",
            'target_lang'=> "required",
            'hourly_payment'=> "required|numeric",
            'word_payment'=> "required|numeric",
            'speciality' =>'required',
            'availability' => "required",
            'tracking_system'=>'required',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors())->withInput();
        }
        else{
            Freelancers::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' =>$request->contact,
                'source_lang'=> $request->source_lang,
                'target_lang' =>$request->target_lang,
                'hourly_payment' => $request->hourly_payment,
                'word_payment' => $request->word_payment,
                'speciality' => $request->speciality,
                'availability' => $request->availability,
                'tracking_system' => $request->tracking_system
            ]);

            return redirect()->back();
        }
	}

	public function getFreelancer(Request $request)
	{
		$id = $request->id;
        if(isset($id) && !empty($id)){
            $result = Freelancers::find($id);
            echo json_encode(array(
                'success' => true,
                'result' => $result
            ));
            die;
        }
        else{
            echo json_encode(array(
                'success' => false,
                'result'  => ''
            ));
            die;
        }
	}

	public function editFreelancer(Request $request)
	{
		$freelancer_id = $request->freelancer_id;
        $name = $request->name;
        $email = $request->email;
        $contact = $request->contact;
        $source_lang = $request->source_lang;
        $target_lang = $request->target_lang;
        $hourly_payment = $request->hourly_payment;
        $word_payment = $request->word_payment;
        $speciality = $request->speciality;
        $availability = $request->availability;
        $tracking_system = $request->tracking_system;
        if(isset($freelancer_id) && !empty($freelancer_id)){
            $freelancer = Freelancers::find($freelancer_id);
            $freelancer->name = $name;
            $freelancer->email = $email;
            $freelancer->contact = $contact;
            $freelancer->source_lang = $source_lang;
            $freelancer->target_lang = $target_lang;
            $freelancer->hourly_payment = $hourly_payment;
            $freelancer->word_payment = $word_payment;
            $freelancer->speciality = $speciality;
            $freelancer->availability = $availability;
            $freelancer->tracking_system = $tracking_system;
            $freelancer->save();
            if($freelancer){
				return redirect()->back();
            }
            else{
				return redirect()->back()->with('not_setup', "Failed to update freelancer");
            }
        }
        else{
			return redirect()->back()->with('not_setup', "Freelancer ID parameter is missing");
        }

	}


}
