<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class SizeController extends Controller
{
    // index
    public function index()
    {
        $data['sizes'] = DB::table('sizes')
            ->where('active',1)
            ->orderBy('name')
            ->paginate(18);
        return view('sizes.index', $data);
    }
    // load create form
    public function create()
    {
        return view('sizes.create');
    }
    // save new category
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'khmer_name' => $r->khmer_name,
            'abbreviation' => $r->abbreviation
        );
        $sms = "The new size has been created successfully.";
        $sms1 = "Fail to create the new size, please check again!";
        $i = DB::table('sizes')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/size/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/size/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('sizes')->where('id', $id)->update(['active'=>0]);
        return redirect('/size');
    }

    public function edit($id)
    {   
        $data['size'] = DB::table('sizes')
            ->where('id',$id)->first();
        return view('sizes.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'khmer_name' => $r->khmer_name,
            'abbreviation' => $r->abbreviation
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('sizes')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/size/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/size/edit/'.$r->id);
        }
    }
}
