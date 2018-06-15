<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $status = ['1' => '正常', '2' => '冻结'];

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
        $status = $request->input('status');
        $status=empty($status)?2:$status;
        if (empty($card)) {
            return redirect('/admin/addUser?id=' . $id)->withErrors(['身份证为空']);
        }
        if ($id==0) {
            $phonelist = User::where('phone', '=', $phone)->count();
            if ($phonelist > 0) {
                return redirect('/admin/addUser?id=' . $id)->withErrors(['手机号重复']);
            }
        }
        if ($id > 0) {
            $users = User::find($id);
        } else {
            $users = new User();

        }
        //头像上传
        if($request->hasFile('avatar')){

            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/upload'),$imageName);
            $users->avatar = $imageName;
        }
        $users->username = $username;
        $users->password = $password;
        $users->phone = $phone;
        $users->card = $card;
        $users->status = $status;
        $users->save();

        return redirect('/admin/user');
    }

    /**
     * 删除用户
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delUser(Request $request)
    {
        $id = intval($request->input('id'));
        if ($id>0){
            $user = User::find($id);
            $user->delete();
        }
        return redirect('/admin/user')->withErrors(['删除成功']);
    }

    /**
     * 更改用户状态
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function statusUser(Request $request)
    {
        $id = intval($request->input('id'));
        $user = User::find($id);
        $status=$user['status']==1?2:1;
        $user->status = $status;
        $user->save();
        return redirect('/admin/user')->withErrors(['更改成功']);
    }

}
