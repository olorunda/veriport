<?php

namespace App\Repositories\Interfaces;

interface UserInterface {

	public function index();

	public function store(array $data);

	public function update(array $data);

	public function verify($ref_num);

	public function destroy($id);
}