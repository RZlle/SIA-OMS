<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Account;

class UserController extends Controller
{
    public function __construct(
        public Account $account,
    ) {
    }

    /**
     * Create User
     * @param Request $request
     * @return User
     */

    public function index ()
    {
        $user = Account::all();
        // $user = $this->account->all();

        $data = [
            'status' => 200,
            'user' => $user
        ];

        return response()->json($data, 200);
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'UserName' => 'required|unique:account',
            'Password' => 'required',
            'Usertype' => 'required',

        ]);

        if($validator->fails())
        {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data, 422);
        }
        else
        {

            $account = new Account;
            // $this->account->create([
                // 'userName' =>
            // ]);

            // $currentDateTime = now()->format('Y-m-d H:i:s');

            $account->UserName = $request->UserName;
            $account->Password = Hash::make($request->Password);
            $account->Usertype = $request->Usertype;
            // $account->DataCreated = $currentDateTime;

            $account->save();


            $data = [
                'status' => 200,
                'message' => 'Account creation successfull',
                'user' => $account->UserName
            ];

            return response()->json($data, 200);

        }

    }
    public function loginUser(Request $request)
{
    try {
        $validateUser = Validator::make($request->all(),
    [
        'UserName' => 'required',
        'Password' => 'required'
    ]);

    if($validateUser->fails()){
        return response()->json([
            'status' => false,
            'message' => 'Username and password is required!',
            'erros' => $validateUser->errors()
        ], 401);
    }

    $user = Account::where('UserName', $request->UserName)->first();

    if($user && Hash::check($request->Password, $user->Password))
    {

        return response()->json([
            'status' => true,
            'Usertype' => $user->Usertype
        ], 200);

    }
    else
    {
        return response()->json([
            'status' => false,
            'message' => 'Username and Password do not match.'
        ], 422);
    }

    } catch (\Throwable $th)
    {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }

}
}
