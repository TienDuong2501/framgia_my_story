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
        $users = User::GetActiveUser();

        return view('admin.user.index', compact('users'));
    }

    public function deactiveUser(Request $request)
    {
        if ($request->ajax()) {
            $deActiveUser = new User();
            $deActiveUser->UpdateUser(config('userConst.checkStatusFalse'), $request->id);
            $user = $deActiveUser->find($request->id);

            return response()->json($user);
        } else {
            return response('faile', 'somethings went wrong!');
        }
    }

    public function activeUser(Request $request)
    {
        if ($request->ajax()) {
            $active = new User();
            $active->UpdateUser(config('userConst.checkStatusTrue'), $request->id);
            $user = $active->find($request->id);

            return response()->json($user);
        } else {
            return response('faile', 'somethings went wrong!');
        }
    }

    public function getDeactiveUser()
    {
        $users = User::GetDeactiveUser();

        return view('admin.user.disableUser', compact('users'));
    }

    public function deleteUser(Request $request)
    {
        if ($request->ajax()) {
            User::DeleteUser($request->id);

            return response(['notificattion' => 'the User is deleted successfully']);
        } else {
            return response('faile', 'somethings went wrong!');
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
            $edit = new User();
            $edit->UpdateRole($request->role, $request->id);
            $user = $edit->find($request->id);

            return response()->json($user);
        } else {
            return response('faile', 'somethings went wrong!');
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
