@extends('layouts.admin')
@section('title','category')
@section('content')
<h1 class="page-title">
{{-- {{dd($categories)}} --}}
</h1>
<div class="container">
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Create Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('adminpanel.category.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name"> Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                            @error('name') is-invalid @enderror
                            value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary"> Create </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>category</h5>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>name</th>
                                <th>total</th>
                                <th>publish</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>--</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <form action="{{route('adminpanel.category.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
