<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\OrderFreelancers;
use App\Freelancers;
use App\Clients;
use App\Orders;
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
		foreach ($freelancers as $key => $value) {
			$word_count = OrderFreelancers::where('freelancer_id', $value->id)->sum('word_count');
			$value->word_count = $word_count;
		}

		return view('admin/freelancers')->with('freelancers', $freelancers);
    }

    public function showClients()
    {
		$clients = Clients::all();

		foreach ($clients as $key => $value) {
			$word_count = Orders::where('client_id', $value->id)->sum('word_count');
			$value->word_count = $word_count;
		}

		return view('admin/clients')->with('clients', $clients);
	}
    public function showOrders()
    {
		$orders = Orders::all();
		$clients = Clients::all();
		$freelancers = Freelancers::all();

		if(count($orders) > 0){
			foreach ($orders as $key => $value) {
				$freelancer = Freelancers::find($value->freelancer_id);
				$client = Clients::find($value->client_id);
				$value->freelancer = $freelancer;
				$value->client = $client;
			}
		}

		return view('admin/orders')->with('orders', $orders)->with('clients', $clients)->with('freelancers', $freelancers);
	}

	public function viewOrder($order_id)
	{
		$order = Orders::find($order_id);
		$order->client = Clients::find($order->client_id);
		$order_freelancers = OrderFreelancers::where('order_id', $order_id)->with('freelancers')->get();

		return view('admin/viewOrder')->with('order', $order)->with('order_freelancers', $order_freelancers);
	}
	public function viewFreelancer($freelancer_id)
	{
		$freelancer = Freelancers::find($freelancer_id);
		$freelancer_orders = OrderFreelancers::where('freelancer_id', $freelancer_id)->with('orders')->get();

		return view('admin/viewFreelancer')->with('freelancer', $freelancer)->with('freelancer_orders', $freelancer_orders);
	}
	public function viewClient($client_id)
	{
		$client = Clients::find($client_id);
		$client_orders = Orders::where('client_id', $client_id)->get();

		return view('admin/viewClient')->with('client', $client)->with('client_orders', $client_orders);
	}

    public function addOrder()
    {
		$clients = Clients::all();

		$freelancers = Freelancers::all();

		return view('admin/addOrder')->with('clients', $clients)->with('freelancers', $freelancers);
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
    public function deleteOrder(Request $request){
		$id = $request->id;
		if(isset($id) && !empty($id)){
			$row = Orders::find($id);
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

	public function getOrder(Request $request)
	{
		$id = $request->id;
        if(isset($id) && !empty($id)){
            $result = Orders::find($id);
            $date = date('Y-m-d\TH:i:s', strtotime($result->deadline));
            echo json_encode(array(
                'success' => true,
                'result' => $result,
                'date' => $date
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

	public function editOrder(Request $request)
	{
		$order_id = $request->order_id;
        $name = $request->name;
        $client_id = $request->client_id;
        $freelancer_id = $request->freelancer_id;
        $deadline = $request->deadline;
        $status = $request->status;
        $type = $request->type;
        $other_type = $request->other_type;
        $word_count = $request->word_count;
        $comments = $request->comments;
        if(isset($order_id) && !empty($order_id)){
            $order = Orders::find($order_id);
            $order->name = $name;
            $order->client_id = $client_id;
            $order->freelancer_id = $freelancer_id;
            $order->deadline = $deadline;
            $order->status = $status;
            $order->type = (!empty($other_type)) ? $other_type : $type;
            $order->word_count = $word_count;
            $order->comments = $comments;
            $order->save();
            if($order){
				return redirect()->back();
            }
            else{
				return redirect()->back()->with('not_setup', "Failed to update order");
            }
        }
        else{
			return redirect()->back()->with('not_setup', "Order ID parameter is missing");
        }

	}

	public function getClient(Request $request)
	{
		$id = $request->id;
        if(isset($id) && !empty($id)){
            $result = Clients::find($id);
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

	public function editClient(Request $request)
	{
		$client_id = $request->client_id;
        $name = $request->name;
        $email = $request->email;
        $legal_name = $request->legal_name;
        $address = $request->address;
        $post_index = $request->post_index;
        $city = $request->city;
        $country = $request->country;
        $vat_number = $request->vat_number;
        $contact_person = $request->contact_person;
        $requirements = $request->requirements;
        if(isset($client_id) && !empty($client_id)){
            $client = Clients::find($client_id);
            $client->name = $name;
            $client->email = $email;
            $client->legal_name = $legal_name;
            $client->address = $address;
            $client->post_index = $post_index;
            $client->city = $city;
            $client->country = $country;
            $client->vat_number = $vat_number;
            $client->contact_person = $contact_person;
            $client->requirements = $requirements;
            $client->save();
            if($client){
				return redirect()->back();
            }
            else{
				return redirect()->back()->with('not_setup', "Failed to update client");
            }
        }
        else{
			return redirect()->back()->with('not_setup', "Client ID parameter is missing");
        }

	}



    public function deleteClient(Request $request){
		$id = $request->id;
		if(isset($id) && !empty($id)){
			$row = Clients::find($id);
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


	public function saveClient(Request $request)
    {

		$rules = [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'post_index' => 'numeric'

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors())->withInput();
        }
        else{
            Clients::create([
                'name' => $request->name,
                'legal_name' => $request->legal_name,
                'address' =>$request->address,
                'post_index'=> $request->post_index,
                'city' =>$request->city,
                'country' => $request->country,
                'vat_number' => $request->vat_number,
                'contact_person' => $request->contact_person,
                'email' => $request->email,
                'requirements' => $request->requirements
            ]);

            return redirect()->back();
        }
	}
	public function saveOrder(Request $request)
    {

		$rules = [
            'name' => 'required',
            // 'client_id' => 'required',
            'freelancer_id' => 'required',
            'deadline' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors())->withInput();
        }
        else{
			$model = new Orders;
			$model->name = $request->name;
			$model->client_id = $request->client_id;
			// $model->freelancer_id = $request->freelancer_id;
			$model->deadline = $request->deadline;
			$model->status = $request->status;
			$model->type =  (!empty($request->other_type)) ? $request->other_type : $request->type;
			$model->word_count = $request->count;
			$model->comments = $request->comments;
			$model->save();

			$word_count = $request->word_count;
			if(isset($request->freelancer_id) && count($request->freelancer_id) > 0 ){
				foreach ($request->freelancer_id as $key => $value) {
					if($value !== null){
						var_dump($model->id,$value, $word_count[$key]);
						$row = new OrderFreelancers;
						$row->order_id = $model->id;
						$row->freelancer_id = $value;
						$row->word_count = $word_count[$key];
						$row->save();
					}
				}
			}

            return redirect()->back();
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
