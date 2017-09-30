<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class BranchController extends Controller
{
    // index
    public function index()
    {
        $data['branches'] = DB::table('branches')
            ->where('active',1)
            ->orderBy('name')
            ->paginate(18);
        return view('branches.index', $data);
    }
    // load create form
    public function create()
    {
        return view('branches.create');
    }
    // save new branch
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'manager' => $r->manager,
            'phone' => $r->phone,
            'address' => $r->address
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('branches')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/branch/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/branch/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('branches')->where('id', $id)->update(['active'=>0]);
        return redirect('/branch');
    }

    public function edit($id)
    {   
        $data['branch'] = DB::table('branches')
            ->where('id',$id)->first();
        return view('branches.edit', $data);
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
        $i = DB::table('branches')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/branch/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/branch/edit/'.$r->id);
        }
    }
}
