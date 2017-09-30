<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class TableController extends Controller
{
    // index
    public function index()
    {
        $data['tables'] = DB::table('tables')
            ->join('branches','tables.branch_id','=','branches.id')
            ->select('branches.*','tables.*','branches.name as brn_name')
            ->where('tables.active',1)
            ->paginate(18);
        return view('tables.index', $data);
    }
    // load create form
    public function create()
    {
        $data['branches'] = DB::table('branches')->get();
        return view('tables.create', $data);
    }
    // save new table
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'section' => $r->section,
            'branch_id' => $r->branch
        );
        $sms = "The new table has been created successfully.";
        $sms1 = "Fail to create the new table, please check again!";
        $i = DB::table('tables')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/table/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/table/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('tables')->where('id', $id)->update(['active'=>0]);
        return redirect('/table');
    }
    //edit table
    public function edit($id)
    {   
        $data['branches'] = DB::table('branches')->get();
        $data['table'] = DB::table('tables')
            ->where('id',$id)->first();
        return view('tables.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'section' => $r->section,
            'branch_id' => $r->branch
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('tables')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/table/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/table/edit/'.$r->id);
        }
    }
}
