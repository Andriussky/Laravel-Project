@extends('layouts.admin.main')

<div class="row">
    <div class="col s12">
        <h1>Products</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{__('products.name')}}</th>
                <th>{{__('products.price')}}</th>
                <th>{{__('messages.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>  <img src="{{$product->image}}" alt=""></td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
