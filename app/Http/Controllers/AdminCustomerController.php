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
        return view('customers',[
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
        session()->flash('message','New customer created Successfully!');
        return redirect()->route('admin.customer.create');
   
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id)
    {
       
        $customer = Customer::where('id',$customer_id)->first();
        return view('show-customer',['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('edit-customer',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer_id)
    {
        
        $customer =  Customer::find($customer_id);
       
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        
        if($request->hasFile('photo')){
            $uploadedFileUrl1 = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
        }else{
            $uploadedFileUrl1 = $request->prev_photo;
        }
        
      
        $customer->photo = $uploadedFileUrl1;
        $customer->save();
        session()->flash('message','Customer details updated Successfully!');
        return redirect()->route('admin.customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id)
    {
        $customer = Customer::find($customer_id);
        $customer->delete();
        return redirect()->route('admin.customers')->with('message','Customer Deleted Successfully');
    }
}
