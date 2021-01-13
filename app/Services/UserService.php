<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Yajra\Datatables\Datatables;

class UserService {

    public $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getDatatables(): Object
    {
        $datatables = Datatables::of($this->repo->get())
                    ->addIndexColumn()->addColumn('action', function($user){
                        return '
							<a href="'.route('user.edit', $user->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
							<button class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></button>
						';
                    })->rawColumns(['action'])->make();

        return $datatables;
    }

}