<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class UnitController extends Controller
{
    // index
    public function index()
    {
        $data['units'] = DB::table('units')
            ->where('active',1)
            ->orderBy('name')
            ->paginate(18);
        return view('units.index', $data);
    }
    // load create form
    public function create()
    {
        return view('units.create');
    }
    // save new category
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'quantity' => $r->quantity,
            'english_name' => $r->english_name,
            'khmer_name' => $r->khmer_name
        );
        $sms = "The new unit has been created successfully.";
        $sms1 = "Fail to create the new unit, please check again!";
        $i = DB::table('units')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/unit/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/unit/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('units')->where('id', $id)->update(['active'=>0]);
        return redirect('/unit');
    }

    public function edit($id)
    {   
        $data['unit'] = DB::table('units')
            ->where('id',$id)->first();
        return view('units.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'quantity' => $r->quantity,
            'english_name' => $r->english_name,
            'khmer_name' => $r->khmer_name
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('units')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/unit/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/unit/edit/'.$r->id);
        }
    }
}
