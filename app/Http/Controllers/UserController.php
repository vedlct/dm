<?php

namespace App\Http\Controllers;
use App\User;
use App\Category;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
    }

    public function index()
    {
        return view('admin.user.userList');
    }
    public function userTable(Request $data)
    {
        $user_data = User::where('fkuserTypeId',2);

        $datatables = DataTables::of($user_data);
        return $datatables->make(true);
    }
}
