<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }

    public static function showUser()
    {
        $users = User::Order('name')->getDeactiveUser()->PagePagiante();

        return view('admin.user.index', compact('users'));
    }

    public function deactiveUser(Request $request)
    {
        if ($request->ajax()) {
            User::Find($request->id)
                ->UpdateUser(config('userConst.checkStatusFalse'));
            $deActiveUser = User::Find($request->id);

            return response()->json($deActiveUser);
        }
    }

    public function activeUser(Request $request)
    {
        if ($request->ajax()) {
            User::Find($request->id)
                ->UpdateUser(config('userConst.checkStatusTrue'));
            $activeUser = User::Find($request->id);

            return response()->json($activeUser);
        }
    }

    public function getDeactiveUser()
    {
        $users = User::GetActiveUser();

        return view('admin.user.disableUser', compact('users'));
    }

    public function deleteUser(Request $request)
    {
        if ($request->ajax()) {
            User::DeleteUser($request->id);

            return response(['notificattion' => 'the User is deleted successfully']);
        }
    }

    public function showEditForm(Request $request)
    {
        if ($request->ajax()) {
            $userEdit = User::find($request->id);

            return response($userEdit);
        }

        return response(['message' => 'an error is occur']);
    }

    public function editUser(Request $request)
    {
        if ($request->ajax()) {
            User::Find($request->id)
                ->UpdateRole($request->role);
            $user = User::Find($request->id);

            return response()->json($user);
        }
    }

    public function search(Request $request)
    {
        $term = $request->term;
        $users = User::AutoCompleteSearch($term);
        if (count($users) == 0) {
            $searchResults[] = 'No User Found';
        } else {
            foreach ($users as $key => $value) {
                $searchResults[] = $value->name;
            }
        }

        return response($searchResults);
    }

    public function searchUser(Request $request)
    {
        $keyword = $request->keyword;
        $results = User::SearchUser($keyword);

        return view('admin.user.search_result', compact('results'));
    }
}
