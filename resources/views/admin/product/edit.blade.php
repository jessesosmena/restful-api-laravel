@extends('admin.layout.admin')

@section('content')

    <h3>Edit Product</h3>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::model($product,['route' => ['product.update',$product->id], 'method' => 'PUT', 'files' => true]) !!}
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


            <div class="form-group">
                {{ Form::label('category_id', 'Categories') }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Select Category']) }}
            </div>

            <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}
            </div>

             {{ Form::submit('Edit', array('class' => 'btn btn-block btn-info')) }}
            {!! Form::close() !!}


        </div>
    </div>



@endsection