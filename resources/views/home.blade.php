@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Products</h3>
            <div class="row">
                @foreach ($products as $item)
                <div style="border: 1px solid #eee ;border-radius: 25px;background: #73AD21; padding:5px; margin:5px;" class="col-2 text-center">{{$item->name}}</br> {{$item->price}}</br>
                    <a href="detail/{{$item->id}}" class="btn btn-primary btn-sm">Buy Now</a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection