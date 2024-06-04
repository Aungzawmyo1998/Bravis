<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Role;
use Carbon\Carbon;

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



//    staff list show
   public function staffListShow ()
   {

    $staffs = Admin::with('role')->get();

    return view('admins.staff.staff',compact('staffs'));
   }

//    add staff
   public function addStaff ()
   {
    return view('admins.staff.add');
   }
//   store staff
   public function staffStore (Request $request)
   {

    $errorMessage = [
        'name.required' => 'The name field is required',
        'name.string' => 'The name must be a string',
        'name.max' => 'The name may not be greater than :max',
        'email.required' => 'The email field is required',
        'email.email' => 'The email is incorect',
        'password.required' => 'The password fild is required',
        'password.min' => 'The password must be at leat 8 length',
        'image.required' => 'The image is required',

    ];

    $validator = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'image' => 'required',

    ],$errorMessage);

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

    // return view('admins.staff.staff');
    return redirect()->route('staff.list.show');

   }

//    edit staff
   public function edit($id)
   {

    $staff = Admin::with('role')->find($id);

    return view('admins.staff.edit',compact('staff'));
   }
//  update staff
   public function update(Request $request,$id)
   {
    $uuid = Str::uuid()->toString();
    $image = $uuid.'.'.$request -> image->extension();
    // Admin::find($id)->update([
    //     "name" => $request->name,
    //     "email" => $request->email,
    //     "address" => $request->address,
    //     "role_id" => $request->position,
    //     "phone" => $request->phone,
    //     "password" => bcrypt($request->password),
    //     "image" => $image,
    //     "uuid" => $uuid,
    //     "status" => "active",
    //     "created_at" => Carbon::now(),
    //     "updated_at" => Carbon::now(),
    // ]);

    $staff =Admin::find($id);
    $staff -> name = $request -> name;
    $staff -> email = $request -> email;
    $staff -> password = bcrypt($request->password);
    $staff -> phone = $request -> phone;
    $staff -> address = $request -> address;
    $staff -> role_id = $request -> position;
    $staff -> uuid = $uuid;
    $staff -> image = $image;
    $staff -> status = 'active';

    $staff->update();
    $request->image->move(public_path('img/staff/register'),$image);
    return redirect()->route('staff.list.show');

    print_r($request);

   }

   public function destroy ($id)
   {
        Admin::find($id)->delete();
        return redirect()->back();
   }
}
