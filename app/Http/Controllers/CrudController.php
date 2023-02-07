<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    public function showData()
    {
        // get all data
        // $ShowData = Crud::all();
        //using paginator get data
        $ShowData = Crud::paginate(5);
        //it will show only next previous button
        //$ShowData = Crud::simplePaginate(5);
        return view('home-page', compact('ShowData'));
    }
    public function addData()
    {
        return view('add-data');
    }

    //post data from input fieled
    public function StoreData(Request $request)
    {
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
            'number' => 'required|max:11',

        ];
        $cm = [
            'name.required' => 'Enter Your Name',
            'email.required' => 'Enter Your Email',
            'number.required' => 'Enter Your Number',
            'name.max' => 'Name can not be more than 10 character',
            'email.email' => 'email must be valid',
            'number.max' => 'number can not be more than 11 character',
        ];
        $this->validate($request, $rules, $cm);
        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->contact = $request->number;
        $crud->save();

        Session()->flash('msg', 'Data inserted Successfully!');
        return redirect('/');
    }

    //get data for update
    public function EditData($id = null)
    {
        $editData = Crud::find($id);
        return view('edit-data', compact('editData'));
    }
    //update data
    public function UpdateData(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
            'number' => 'required|max:11',

        ];
        $cm = [
            'name.required' => 'Enter Your Name',
            'email.required' => 'Enter Your Email',
            'number.required' => 'Enter Your Number',
            'name.max' => 'Name can not be more than 10 character',
            'email.email' => 'email must be valid',
            'number.max' => 'number can not be more than 11 character',
        ];
        $this->validate($request, $rules, $cm);
        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->contact = $request->number;
        $crud->save();

        Session()->flash('msg', 'Data updated Successfully!');
        return redirect('/');
    }
    // delete Data
    public function DeleteData($id = null)
    {
        $deleteData = Crud::find($id);
        $deleteData->delete();
        Session()->flash('msg', 'Data Deleted Successfully!');
        return redirect('/');
    }
}
