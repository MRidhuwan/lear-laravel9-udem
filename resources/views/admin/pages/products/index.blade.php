@extends('layouts.admin')
@section('title','product')
@section('content')
    <h1>Products</h1>
    <div class="container">
        <div class="text-end mb-4">
            <a href="{{route('adminpanel.product.create')}}"
            class="btn btn-primary">Create Product</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Product All</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Colors</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td> {{$product->id}}</td>
                                    <td> {{$product->title}}</td>
                                    <td> {{$product->category->name}}</td>
                                    <td>
                                        @foreach ($product->colors as $color)
                                            <span class="badge"
                                                style="background: {{$color->code}}">
                                                {{$color->name}}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{asset('storage/' . $product->image)}}"
                                        style= height:35px; alt="">
                                    </td>
                                    <td> {{$product->price}}</td>
                                    {{-- <td> {{$product->description}}</td> --}}
                                    {{-- <td> {{\Carbon\Carbon::parse($product->created_at)->format('d-m-Y')}}</td> --}}

                                    <td>
                                        {{-- <form action="{{route('adminpanel.products.destroy',$product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Delete</button>
                                        </form> --}}
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
