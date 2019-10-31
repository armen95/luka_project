<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Freelancers;
use App\Clients;
use App\User;
use Auth;

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

    public function showClients()
    {
		$clients = Clients::all();

		return view('admin/clients')->with('clients', $clients);
	}

    public function addFreelancer()
    {
		return view('admin/addFreelancer');
    }

    public function addClient()
    {
		return view('admin/addClient');
    }

    public function settings()
	{
		$user = Auth::user();

		return view('admin/settings')->with('user', $user);
	}

	public function editAccount(Request $request)
	{
		$user_id = Auth::user()->id;
		$firstname = $request->firstname;
		$lastname = $request->lastname;
		$password = $request->password;
		$confirmpass = $request->confirmpass;

		$user = User::find($user_id);
		$user->firstname = $firstname;
		$user->lastname = $lastname;
		$user->password = Hash::make($password);
		$user->save();
		return redirect()->back();

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
            'email' => 'email|unique:contractors,email'

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
