<?php

namespace App\Http\Controllers;

use App\Models\LoginDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
use Illuminate\Auth\Events\Login;
use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    public function Index()
    {


        return view('index');
    }

    public function ShowRegistration()
    {


        return view('register');
    }


    public function Register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',

        ]);

        // Hash the password before saving it to the database
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Save the user to the database
        LoginDetail::insert([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'role' => 1
        ]);
        return redirect()->route('index')->with('success', 'Item created successfully!');
    }

    public function Login(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');


        $user = LoginDetail::where('username', $username)->first();

        $userexists = LoginDetail::where('username', $username)
            ->exists();

        if ($userexists == 1) {
            $check_password = LoginDetail::where('username', $username)->pluck('password')->first();
            $check_user = LoginDetail::where('username', $username)->first();


            if (Hash::check($password, $check_password)) {
                $request->session()->put('user', $check_user);

                // Password is correct, check user role
                $role = $user->role;
                if ($role == 0) {
                    return redirect()->route('listshow')->with('success', 'Login Successful');
                } elseif ($role == 1) {
                    return redirect()->route('user.profile')->with('success', 'Login Successful');
                } else {
                    return response()->json(['message' => 'Invalid role']);
                }
            } else {
                return response()->json(['message' => 'Invalid credentials']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }





        // $username = $request->input('username');
        // $password = $request->input('password');

        // $userexists = LoginDetail::where('username', $username)
        //     ->exists();

        // if ($userexists == 1) {
        //     $check_password = LoginDetail::where('username', $username)->pluck('password')->first();
        //     $check_user = LoginDetail::where('username', $username)->first();

        //     if (Hash::check($password, $check_password)) {
        //         $request->session()->put('user', $check_user);

        //         return redirect()->route('user.profile')->with('success', 'Login Successfull');
        //     } else {
        //         return response()->json(['message' => 'Invalid credentials']);
        //     }
        // } else {
        //     return response()->json(['message' => 'User not found']);
        // }
    }

    public function ShowProfile(Request $request)
    {
        if (Session::has('user')) {
            $user = session()->get('user');
            $id = $user->id;
            $user_details = LoginDetail::where('id', $id)->get();

            return view('userprofile', compact('user_details'));
        } else {
            Session::put('error', 'This is an error message.');


            return redirect('/')->with('error', 'You need to log in first');
        }
    }

    public function ProfileUpdate(Request $request)
    {
        $user = session()->get('user');
        $id = $user->id;

        $validatedData = $request->validate([
            'name'     => 'required', 'string',
            'username' => 'required', 'string',
            'address'  => 'required', 'string',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            // Delete the old image if it exists
            if ($user->image && file_exists(public_path('uploads') . '/' . $user->image)) {
                unlink(public_path('uploads') . '/' . $user->image);
            }
            $user->image = $filename;
            LoginDetail::findOrFail($id)->update([
                'name'      => $request->name,
                'username'  => $request->username,
                'address'   => $request->address,
                'image'     => $filename,

            ]);
        }

        $user = LoginDetail::findOrFail($id);
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }


    public function Logout(Request $request)
    {
        request()->session()->flush();
        return redirect()->route('index');
    }

    // section 2

    public function UsersList()
    {

        $users = LoginDetail::where('role', 1)->get();


        return view('userlist', compact('users'));
    }


    public function UserSingleView(Request $request)
    {

        // $users = LoginDetail::where('role', 1)->get();

        // $users = LoginDetail::all();
        $id = $request->id;
        // dd($id);

        $users = LoginDetail::findOrFail($id);

        return view('user-single-view', compact('users'));
    }


    public function AddProject(Request $request)
    {


        return view('addproject');
    }

    public function InsertProject(Request $request)
    {
        $user = session()->get('user');
        $id = $user->id;


        $validatedData = $request->validate([
            'project_name' => 'required', 'string',
        ]);
        Project::insert([
            'project_name' => $request->project_name,
            'user_id' => $id,

        ]);
        return redirect()->route('join.list')->with('success', 'Item created successfully!');
    }
    public function Jointable()

    {
        // $user = session()->get('user');
        // $id = $user->id;

        $users = Project::join('callmasters', 'projects.user_id', '=', 'logindetails.id')
            ->select('projects.*', 'logindetails.*')
            ->get();



        // return view('list-join-table', ['users' => $users]);
        return view('list-join-table', compact('users'));
    }
}
