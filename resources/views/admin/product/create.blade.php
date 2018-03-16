@extends('admin.layout.admin') <!--- This is included in admin.layout.admin.blade.php -->

@section('content') <!--- content after sidenav -->

    <h3 class="text-info">Add Product</h3>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}
            {{csrf_field()}}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('price', 'Price') }}
                {{ Form::text('price', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('brand', 'Brand') }}
                {{ Form::select('brand', [ 'iphone' => 'Iphone', 'samsung' => 'Samsung','lenovo'=>'Lenovo','sony'=>'Sony','nokia'=>'Nokia'], null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group"> <!--- category_id is a column in products table this will insert id of that selected category to products_table/category_id column -->
                {{ Form::label('category_id', 'Categories') }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Select Category']) }} 
            </div>

            <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Create', array('class' => 'btn btn-block btn-info')) }}
            {!! Form::close() !!}

        </div>
    </div>

@endsection