@extends('layouts.admin')
@section('title','product create')
@section('content')
<h1> Create Products</h1>
<div class="container">
    <div class="row mb-6">
        <div class="col-md-12 offset-md-0">
            <div class="card">
                <div class="card-header">
                    <h5>Create Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('adminpanel.product.store')}}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title"> Title</label>
                            <input type="text" name="title" id="title" class="form-control
                            @error('title') is-invalid @enderror"
                                value="{{old('title')}}">
                            @error('title')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id"> Category</label>
                            <select name="category_id" name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">--Pilih Category--</option>

                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old($category->id) == $category->id ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name"> Image</label>
                            <input type="file" name="image" id="image" class="form-control
                            @error('image') is-invalid @enderror">

                            @error('image')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="colors"> Colors </label> </br>
                            @foreach ($colors as $color)
                                <div class="form-check form-check-inline">
                                <input type="checkbox" name="colors[]" id="{{$color->name}}"
                                    class="form-check-input" value="{{$color->id}}">
                                    <label for="{{$color->name}}" class="form-check-label"> {{$color->name}}</label>
                                </div>
                            @endforeach

                            @error('colors')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="price"> Price</label>
                            <input type="number" name="price" id="price" class="form-control
                            @error('price') is-invalid @enderror"
                                value="{{old('price')}}">
                            @error('price')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description"> Description</label>
                            <textarea name="description" id="description" rows="10" cols="30" class="form-control
                            @error('description') is-invalid @enderror"
                                placeholder="Masukkan Description">
                            </textarea>

                            @error('description')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group text-end mt-3">
                            <button type="submit" class="btn btn-primary"> Create </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
