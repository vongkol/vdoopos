<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class DiscountController extends Controller
{
    // index
    public function index()
    {
        $data['discounts'] = DB::table('discounts')
            ->where('active',1)
            ->paginate(18);
        return view('discounts.index', $data);
    }
    // load create form
    public function create()
    {
        return view('discounts.create');
    }
    // save new category
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'manager' => $r->manager,
            'phone' => $r->phone,
            'address' => $r->address
        );
        $sms = "The new discount has been created successfully.";
        $sms1 = "Fail to create the new discount, please check again!";
        $i = DB::table('discounts')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/discount/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/discount/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('discounts')->where('id', $id)->update(['active'=>0]);
        return redirect('/discount');
    }
    public function edit($id)
    {   
        $data['discount'] = DB::table('discounts')
            ->where('id',$id)->first();
        return view('discounts.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'manager' => $r->manager,
            'phone' => $r->phone,
            'address' => $r->address
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('discounts')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/discount/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/discount/edit/'.$r->id);
        }
    }
}
