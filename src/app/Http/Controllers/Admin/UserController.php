<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   private $status=['1'=>'正常','2'=>'冻结'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $name = $request->input('username');
        $phone = $request->input('phone');

        $users = User::where('id', '>', 0);

        $users = !empty($name) ? $users->where('username', 'like', '%' . $name . '%') : $users;
        $users = !empty($phone) ? $users->where('phone', 'like', '%' . $phone . '%') : $users;

        $page_data = $users->paginate(10);
        return view('admin.user.index', ['users' => $page_data, 'status' => $this->status]);
    }

    /**
     * 添加编辑用户
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser(Request $request)
    {
        $id = $request->input('id');
        if ($id > 0) {
            $users = User::findOrFail($id);
        } else {
            $users = new User();
        }
        return view('admin.user.addUser', ['users' => $users]);
    }

    public function savaUser(Request $request)
    {
        $id = intval($request->input('id'));
        $username = $request->input('username');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $card = $request->input('card');
        $avatar = $request->input('avatar');
        $status = $request->input('status');

        $users = User::findOrFail($id);
        $data=array(
            'id'=>$id>0?$users['id']:$id,
            'username'=>$users['username'],
            'password'=>$users['password'],
            'phone'=>$users['phone'],
            'card'=>$users['card'],
            'avatar'=>$users['avatar'],
            'status'=>$users['status'],
        );
        if ($id>0){
            User::updated($data);
        }else{

        }
    }
}
;
