@extends('admin.layout.admin')

@section('content')

<ul class="container">
    @forelse($products as $product)

  <li style="list-style-type: none;" class="row">

       <div class="col-md-8">
        <h3>Products</h3>
        <br/>
        <h4>Name of product: {{$product->name}}</h4>
        <h4>Category: {{count($product->category)?$product->category->name:"N/A"}}</h4> <!--- if category is available display product category name else N/A -->

        <img src="{{url('images',$product->image)}}" style="max-width: 150px">
  
      <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm ">Edit Product</a>
      <br><br/>

        <form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
         </form>

         <div class="col-md-4">
            
            <form action="/admin/product/image-upload/{{$product->id}}" method="POST" class="dropzone" id="my-awesome-dropzone-{{$product->id}}">
              {{csrf_field()}}

             </form>

        </div>

    </li>

        @empty

        <h3 class="text-left">No products available</h3>

    @endforelse
</ul>


@endsection