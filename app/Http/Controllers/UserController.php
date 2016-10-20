<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserInterface;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\contact;

use App\institution;

use App\professional_quals;

use App\relevant_exp;

use App\documents;

use App\referee;

use Crypt;

use Auth;

class UserController extends Controller
{

	protected $user;

	public function __construct(UserInterface $user) {
		$this->middleware('auth');
		$this->user = $user;
	}

	public function index() {
		return view('welcome');
	}

	public function verify(Request $request) {
		if($request->ajax()) {
			$id = $request->id;
			$crypted = Crypt::encrypt($id);
			$url = "/profile/" . $crypted;
			return redirect('/profile/'.$crypted);
		}
	}

	public function viewprofile(Request $request, $id) {
		if($request->ajax()) {
			try {
				$crypted = Crypt::decrypt($id);

				if($this->user->fetchuser($crypted)==null) {
					return response()->json("fake");
				}
				$year = date("Y");
				$num = 100 + $crypted;

				$const = $request->user()->region;

				if($const=="Abuja"){
					$ref_num = "DPR/" . $year .'/'.strtoupper('ABJ').'/'. $num;
				}
				else{
					$ref_num = "DPR/" . $year .'/'.strtoupper(substr($request->user()->region,0,3)).'/'. $num;
				}		
				session(['ref'=>$ref_num]);

				$user = $this->user->fetchuser($crypted);
				$contacts = $this->user->fetchcontact($crypted);
				$institute = $this->user->fetchAllInstitute($crypted);
				$institute2 = $this->user->fetchinstitute($crypted);
				$quals = $this->user->fetchquals($crypted);
				$relexp = $this->user->fetchexperience($crypted);
				$refs = $this->user->fetchrefs($crypted);
				$docs = $this->user->fetchdocs($crypted);
				
				return response()->json([
					'user'=>$user,
					'contacts'=>$contacts,
					'institute'=>$institute,
					'institute2'=>$institute2,
					'quals'=>$quals,
					'relexp'=>$relexp,
					'refs'=>$refs,
					'docs'=>$docs
				]);
			} catch(\Exception $ex) {
				return response()->json("unable to display view");
			}
		}
	}
}
