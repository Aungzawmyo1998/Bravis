<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class AdminController extends Controller
{
    //

   public function dashboard ()
   {

    $orderCount = Order::count();

    $orderPending = Order::where('status','=','pending')->count();

    $orderProcessing = Order::where('status','=','processing')->count();

    $orderDeliever = Order::where('status','=','delivered')->count();

    $clientCount = Customer::count();

    $currentYear = Carbon::now()->year;

    // PIE CHART

    $saleStatues = Order::select(
                        DB::raw('MONTH(created_at) as month'),
                        DB::raw('COUNT(*) as count')
                    )
                    ->whereYear('created_at',$currentYear)
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->orderBy('month')
                    ->get();

    $lables = [];
    $data = [];
    $color = ["#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9"];

    for( $i=1; $i<=12; $i++)
    {
        $moth = date('F',mktime(0,0,0,$i,1));
        $count = 0;

        foreach($saleStatues as $saleStatue)
        {
            if($saleStatue->month == $i )
            {
                $count = $saleStatue->count;
                break;
            }
        }

        array_push($lables,$moth);
        array_push($data, $count);
    }

    $datasets = [
        [
            'label' => 'mothly',
            'data' => $data,
            'backgroundColor' => $color,
        ]
    ];


    // dd($counts);

    // DOUGHNUT CHART

    $men = DB::table('products')
                    // ->join('categories','categories.id','=','products.category_id')
                    ->join('order_products','order_products.product_id','=','products.id')
                    ->where('products.gender','Male')
                    ->select(DB::raw("SUM(order_products.small_qty) as smallQty"),
                             DB::raw("SUM(order_products.median_qty) as medianQty"),
                             DB::raw("SUM(order_products.large_qty) as largeQty"),
                    )
                    ->get();

    $menSellCount = $men[0]->smallQty + $men[0]->medianQty + $men[0]->largeQty;


    $women = DB::table('products')
                    // ->join('categories','categories.id','=','products.category_id')
                    ->join('order_products','order_products.product_id','=','products.id')
                    ->where('products.gender','Female')
                    ->select(DB::raw("SUM(order_products.small_qty) as smallQty"),
                             DB::raw("SUM(order_products.median_qty) as medianQty"),
                             DB::raw("SUM(order_products.large_qty) as largeQty"),
                    )
                    ->get();


    $womenSellCount = $women[0]->smallQty + $women[0]->medianQty + $women[0]->largeQty;



    $accessories = DB::table('products')
                    ->join('categories','categories.id','=','products.category_id')
                    ->join('order_products','order_products.product_id','=','products.id')
                    ->where('categories.name','LIKE','accessories')
                    ->select(DB::raw("SUM(order_products.small_qty) as smallQty"),
                             DB::raw("SUM(order_products.median_qty) as medianQty"),
                             DB::raw("SUM(order_products.large_qty) as largeQty"),
                    )
                    ->get();

    $accessoriesCount  = $accessories[0]->smallQty + $accessories[0]->medianQty + $accessories[0]->largeQty;

    $sport = DB::table('products')
                    ->join('categories','categories.id','=','products.category_id')
                    ->join('order_products','order_products.product_id','=','products.id')
                    ->where('categories.name','LIKE','sport')
                    // ->select('order_products.*')
                    // ->count('order_products.product_id');
                    // ->sum('order_products.median_qty');
                    ->select(DB::raw("SUM(order_products.small_qty) as smallQty"),
                             DB::raw("SUM(order_products.median_qty) as medianQty"),
                             DB::raw("SUM(order_products.large_qty) as largeQty"),
                    )
                    ->get();
                    // ->groupBy('order_products.product_id');

    $sportCount = $sport[0]->smallQty + $sport[0]->medianQty + $sport[0]->largeQty;

    // dd($sportCount);

    return view('admins.dashboard.dashboard',compact('orderCount','orderPending','orderProcessing','orderDeliever','clientCount','menSellCount','womenSellCount','accessoriesCount','sportCount','datasets','lables'));
   }


//    SEARCH


   public function search (Request $request)
   {

    $roles = Role::get();
    $role = $request->role;
    $search = $request->search;

        if ($search == null && $role == 'default') {

            // $staffs = Admin::with('role')
            //     ->orderBy('id','desc')
            //     ->where('status','active')
            //     ->paginate(1);
            // return view('admins.staff.staff',compact('staffs','roles'));
            return redirect()->route('staff.list.show');

        } elseif ($request->has('search') && $role == 'default') {
            $staffs = Admin::with('role')
                ->whereAny(['name','email','phone',],'LIKE',"%$search%")
                ->where('status','active')
                ->orderBy('id','desc')
                ->paginate(6);

            return view('admins.staff.staff',compact('staffs','roles'));

        } elseif($search == null && $role != 'default') {

            $staffs = Admin::with('role')
                ->where('role_id','=',"$role")
                ->where('status','active')
                ->orderBy('id','desc')
                ->paginate(6);

            return view('admins.staff.staff',compact('staffs','roles'));

        } elseif($request->has('search') && $role != 'default') {

            $staffs = Admin::with('role')
                ->whereAny(['name','email','phone',],'LIKE',"%$search%")
                ->where('role_id','=',"$role")
                ->where('status','active')
                ->orderBy('id','desc')
                ->paginate(6);

            return view('admins.staff.staff',compact('staffs','roles'));

        }

   }


//    staff list show
   public function staffListShow ()
   {

    $staffs = Admin::with('role')->orderBy('id','desc')
            ->where('status','active')
            ->paginate(6);
    $roles = Role::get();

    return view('admins.staff.staff',compact('staffs','roles'));
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
        'name.required' => 'The name field is required baajsbfk ',
        'name.string' => 'The name must be a string',
        'name.max' => 'The name may not be greater than :max',
        'email.required' => 'The email field is required',
        'email.email' => 'The email is incorect',
        'email.unique' => 'The email is already exists',
        'password.required' => 'The password fild is required',
        'password.min' => 'The password must be at leat 8 length',
        'image.required' => 'The image is required',

    ];

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|min:8',
        'image' => 'required',
        'phone' => 'required',
        'address' => 'required',


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

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        // 'password' => 'required|min:8',
        // 'image' => 'required',
        'phone' => 'required',
        'address' => 'required',


    ]);


    $uuid = Str::uuid()->toString();

    $staff =Admin::find($id);
    $staff -> name = $request -> name;
    $staff -> email = $request -> email;
    if(!empty($request->password)) {
        $staff -> password = bcrypt($request->password);
    }
    $staff -> phone = $request -> phone;
    $staff -> address = $request -> address;
    $staff -> role_id = $request -> position;
    $staff -> uuid = $uuid;
    if($request->hasFile('image')) {

        $image = $uuid.'.'.$request -> image->extension();

        $staff -> image = $image;
        $request->image->move(public_path('img/staff/register'),$image);

    }
    $staff -> status = 'active';

    $staff->update();
    // $request->image->move(public_path('img/staff/register'),$image);
    return redirect()->route('staff.list.show');

    print_r($request);

   }

   public function destroy ($id)
   {
        // dd(Admin::find($id));
        $staff = Admin::find($id);
        $staff->status = 'inactive';
        $staff-> update();
        return redirect()->back();
   }

   public function logout (Request $request)
   {

    Auth::logout();
    session()->flush();

    return redirect()->route('admin.login.show');

   }
}
