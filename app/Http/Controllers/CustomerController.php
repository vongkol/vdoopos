<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class CustomerController extends Controller
{
    // index
    public function index()
    {
        $data['customers'] = DB::table('customers')
            ->where('active',1)
            ->paginate(18);
        return view('customers.index', $data);
    }
    // load create form
    public function create()
    {
        return view('customers.create');
    }
    // save new customer
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'address' => $r->address,
            'phone' => $r->phone,
            'card_number' => $r->card_number,
            'discount' => $r->discount
        );
        $sms = "The new customer has been created successfully.";
        $sms1 = "Fail to create the new customer, please check again!";
        $i = DB::table('customers')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/customer/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/customer/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('customers')->where('id', $id)->update(['active'=>0]);
        return redirect('/customer');
    }

    public function edit($id)
    {   
        $data['customers'] = DB::table('customers')
            ->where('id',$id)->first();
        return view('customers.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'address' => $r->address,
            'phone' => $r->phone,
            'card_number' => $r->card_number,
            'discount' => $r->discount
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('customers')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/customer/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/customer/edit/'.$r->id);
        }
    }
}
