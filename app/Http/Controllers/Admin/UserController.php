<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    protected $UserRepository;

    /**
     * UserManagementController constructor.
     * @param UserRepository $UserRepository
     */

    public function __construct(UserContract $UserRepository)
    {
        $this->userRepository = $UserRepository;
    }

    /**
     * List all the users
     */
    public function index()
    {
        $users = $this->userRepository->listUsers();
        $this->setPageTitle('Users', 'List of all users');
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('User', 'Create User');
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' =>  'required',
            'last_name' =>  'required',
            'email' =>  'required',
            'pin_code' =>  'required',
            'phone' =>  'required|integer|digits:10',
            'password' =>  'required',
            'address' =>  'required',
            'city' =>  'required',
            'pin' =>  'required',
            // 'video' =>  'max:50000',
        ]);
        // $this->Validate($request,[
        //     'file'=>'max:50000', //50MB
        //     'syllabus'=>'max:50000'
        // ]);
        $params = $request->except('_token');

        $data = $this->userRepository->createUser($params);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.user.index', 'User has been added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->userRepository->findUserById($id);

        $this->setPageTitle('User', 'Edit User : ' . $user->title);
        return view('admin.user.edit', compact('user'));
    }
   
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
           'first_name' =>  'required',
            'last_name' =>  'required',
            'email' =>  'required',
            'phone' =>  'required|integer|digits:10',
            'pin_code' =>  'required',
            'address' =>  'required',
            'city' =>  'required',
            'pin' =>  'required',
        ]);

        $params = $request->except('_token');

        //dd($params);

        $data = $this->userRepository->updateUser($params);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating user.', 'error', true, true);
        }
        return $this->responseRedirectBack('User updated successfully', 'success', false, false);
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request)
    {

        $params = $request->except('_token');

        $user = $this->userRepository->updateUserStatus($params);

        if ($user) {
            return response()->json(array('message' => 'User status successfully updated'));
        }
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = $this->userRepository->deleteUser($id);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while deleting user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.user.index', 'user deleted successfully', 'success', false, false);
    }
}