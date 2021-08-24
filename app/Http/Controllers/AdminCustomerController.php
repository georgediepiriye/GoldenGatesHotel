<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer',[
            'customers'=>$customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create-customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'full_name' => 'required',
            'email' =>'required|email',
            'password'=>'required',
            'mobile'=> 'required|numeric',
            'address'=>'required',
            'photo' => 'required|mimes:jpeg,png,jpg|max:5048'

        ]);
        $customer = new Customer();
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->password =sha1($request->password) ;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $uploadedFileUrl1 = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
        $customer->photo = $uploadedFileUrl1;
        $customer->save();
        session()->flash('message','Your new item added Successfully!');
        return redirect()->route('admin.customer.create');
   
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $customer = Customer::where('id',$id)->first();
        return view('show-customer',['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = Customer::find($id);
        return \view('edit-customer',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('customers')->with('message','Customer Deleted Successfully');
    }
}
