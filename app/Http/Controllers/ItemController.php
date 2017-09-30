<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class ItemController extends Controller
{
    // index
    public function index()
    {
        $data['items'] = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->select('categories.*','items.*', 'categories.name as cat_name')
            ->where('items.active',1)
            ->paginate(18);
        return view('items.index', $data);
    }
    // load create form
    public function create()
    {
        $data['categories'] = DB::table('categories')->get();
        return view('items.create', $data);
    }
    // save new item
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'category_id' => $r->category,
            'code' => $r->code
        );
        if($r->image) {
            $file = $r->file('image');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
            $data["image"] = $file_name;
        }
        $sms = "The new item has been created successfully.";
        $sms1 = "Fail to create the new item, please check again!";
        $i = DB::table('items')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/item/view/'.$i);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/item/create')->withInput();
        }
    }
    // delete item
    public function delete($id)
    {
        DB::table('items')->where('id', $id)->update(['active'=>0]);
        return redirect('/item');
    }
    //edit item
    public function edit($id)
    {   
        $data['categories'] = DB::table('categories')->get();
        $data['item'] = DB::table('items')
            ->where('id',$id)->first();
        return view('items.edit', $data);
    }
    // edit item detail
    public function editItemDetail($id)
    {   
        $data['itemdetails'] = DB::table('item_details')
            ->where('id',$id)->first();
        return view('items.edit', $data);
    }
    // get all sizes
    public function getSize()
    {
        $result = DB::table('sizes')->where('active',1)->get();
        return $result;
    }
    // delete item detail
    public function deleteItemDetail($id)
    {
        $i=DB::table('item_details')->where('id', $id)->update(['active'=>0]);
        return $i; 
    }
    //view item with item detail
    public function view($id)
    {   
        $data['item'] = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->select('categories.*','items.*', 'categories.name as cat_name')
            ->where('items.active',1)
            ->where('items.id',$id)->first();
        $data['item_details'] = DB::table('item_details')
            ->join('items', 'items.id', '=', 'item_details.item_id')
            ->join('sizes', 'sizes.id', '=', 'item_details.size_id')
            ->select('items.*','item_details.*','sizes.*', 
                'item_details.id as i_d_id',
                'items.name as i_name', 
                'sizes.name as name')
            ->where('item_details.active',1)
            ->where('item_id',$id)
            ->get();
        return view('items.view', $data);
    }
    //  save new item detail
     public function saveItem(Request $r)
     {
        $data = array(
            'item_id' => $r->item,
            'size_id' => $r->size,
            'price' => $r->price,
            'cost' => (float)$r->cost,
            'discount' => (float)$r->discount,
            'point' => (int)$r->point,
            'free_able' => (int)$r->free_able
        );
        $i = DB::table('item_details')->insertGetId($data);
        if($i>0) {
            $item = DB::table('item_details')
                ->join('sizes', 'sizes.id', '=', 'item_details.size_id')
                ->select('item_details.*','sizes.name as size')
                ->where('item_details.id', $i)
                ->where('sizes.active',1)
                ->first();    
            return json_encode($item);        
        }
    }   

    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'description' => $r->description,
            'category_id' => $r->category,
            'code' => $r->code
        );
        if($r->image) {
            $file = $r->file('image');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
            $data["image"] = $file_name;
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('items')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/item/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/item/edit/'.$r->id);
        }
    }
}
