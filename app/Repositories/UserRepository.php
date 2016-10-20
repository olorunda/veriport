<?php

namespace App\Repositories;

use Auth;

use App\User;

use App\available_job;

use App\professional_quals;

use App\relevant_exp;

use App\referee;

use App\contact;

use App\institution;

use App\documents;

use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface {

	public function index() {

	}

	public function store(array $data) {

	}

	public function update(array $data) {

	}

	public function verify($ref_num) {

	}

	public function destroy($id) {

	}


	public function fetchquals($id) {
		return professional_quals::where('user_ref',$id)
		->orderBy('created_at', 'asc')
		->get();
	}

	public function fetchexperience($id) {
		return relevant_exp::where('user_ref', $id)
		->orderBy('created_at', 'asc')
		->get();
	}

	public function fetchrefs($id) {
		return referee::where('user_ref',$id)
		->orderBy('created_at', 'asc')
		->get();
	}

	public function fetchcontact($id) {
		return contact::where('user_ref', $id)->first();
	}

	public function fetchinstitute($id) {
		return institution::where('user_ref', $id)->first();
	}

	public function fetchuser($id) {
		return User::where('id', $id)->first();
	}
	public function fetchdocs($id) {
		return documents::where('user_ref', $id)
		->orderBy('created_at', 'asc')
		->get();
	}

	public function fetchAllInstitute($id) {
		return institution::where('user_ref', $id)
		->where('iname','!=','')
		->orderBy('created_at', 'asc')
		->get();
	}
}