<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('components.list-table', compact('users'));
  }
  
  
  public function addAuth(Request $req)
  {
    $validator = Validator::make($req->all(), [
      'firstname' => [
        'required',
        'regex:/^[A-Za-z]+$/u',
        'min:3',
        ],
      'Middlename' => [
        'nullable',
        'regex:/^[A-Za-z]+$/u',
        'min:3',
        ],
      'lastname' => [
        'required',
        'regex:/^[A-Za-z]+$/u',
        'min:3',
        ],
      'email' => 'required | email',
      'password' => 'required | confirmed | min:6',
    ]);
    
    if($validator->fails())
    {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }
    
    User::create([
      'name' => $req->firstname . " " . $req->middlename . " " . $req->lastname,
      'firstname' => $req->firstname,
      'middlename' => $req->middlename,
      'lastname' => $req->lastname,
      'email' => $req->input('email'),
      'password' => Hash::make($req->input('password')),
      'role' => $req->input('role'),
      ]);
      
    $req->session()->flash('success', 'User added successfully');
    
    return redirect()->back();
  }
  
  
  public function edit(string $userId)
  {
    $user = User::find($userId);
    return view('components.edit-form', compact('user'));
  }
  
  
  public function editAuth(Request $req)
  {
    $validator = Validator::make($req->all(), [
      'firstname' => [
        'required',
        'regex:/^[A-Za-z]+$/u',
        'min:3',
        ],
      'Middlename' => [
        'nullable',
        'regex:/^[A-Za-z]+$/u',
        'min:3',
        ],
      'lastname' => [
        'required',
        'regex:/^[A-Za-z]+$/u',
        'min:3',
        ],
      'email' => 'required | email',
      'password' => 'nullable | confirmed | min:6',
      ]);
    
    if($validator->fails())
    {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }
    
    User::updateOrCreate([
      'name' => $req->name . " " . $req->middlename . " " . $req->lastname,
      'firstname' => $req->firstname,
      'middlename' => $req->middlename,
      'lastname' => $req->lastname,
      'email' => $req->input('email'),
      'password' => Hash::make($req->input('password')),
      'role' => $req->input('role'),
      ]);
    
    $req->session()->flash('success', 'User updated successfully');
    
    return redirect()->back();
  }
  
  
  public function delete(Request $req, string $userId)
  {
    $data = User::find($userId);
    $data = User::destroy($userId);
    
    $req->session()->flash('success', 'User deleted successfully');
    
    return redirect()->back();
  }
}
