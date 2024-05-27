<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Role;

class AdminController extends Controller
{
    //

   public function dashboard ()
   {
    return view('admins.dashboard');
   }

   public function staffList()
   {
    return view('admins.staff');
   }

   public function staffListStore ( Request $request)
   {

   }
   public function staffListShow ()
   {

    // $staffs = Admin::get();
    // dd($staffs);
    // retrieve all
    // $staffs = Admin::with('role')->get();
    // dd($staffs);
    $staff = Role::find(4)-> staff;
    dd($staff);

    // return view('admins.staff', compact(''));
   }

   public function addStaff ()
   {
    return view('admins.staff.add');
   }
   public function staffStore (Request $request)
   {
    $uuid = Str::uuid()->toString();
    $image = $uuid.'.'.$request -> image->extension();

    $staff = new Admin();
    $staff -> name = $request -> name;
    $staff -> email = $request -> email;
    $staff -> password = bcrypt($request->password);
    $staff -> phone = $request -> phone;
    $staff -> address = $request -> address;
    $staff -> role_id = $request -> position;
    $staff -> uuid = $uuid;
    $staff -> image = $image;
    $staff -> status = 'active';

    $staff -> save();

    $request -> image->move(public_path('img/staff/register'),$image);

   }
}
