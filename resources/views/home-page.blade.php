@extends('layouts.bootstrap')
<div class="container mt-5">
    <a href="{{url('add-data')}}" class="btn btn-primary mb-3">Add Data</a>
    @if (Session::has('msg'))
    <p class="alert alert-success mb-2">{{Session::get('msg')}}</p>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">serial</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ShowData as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->contact}}</td>
                <td>
                    <a href="{{url('/edit-data/'.$data->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{url('/del-data/'.$data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$ShowData->links()}}
</div>