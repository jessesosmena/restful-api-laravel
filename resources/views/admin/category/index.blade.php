@extends('admin.layout.admin')
<!--- sidenav here -->
@section('content')

    <div class="navbar">
        <br/>
        <a class="navbar-brand" href="#">Categories: </a>
        <ul class="nav navbar-nav">

            @if(!empty($categories)) <!--- If $categories is not empty display data -->
            @forelse($categories as $category)

                <li class="active">

                    <a style="font-size: 16px;" href="{{route('category.show',$category->id)}}">{{$category->name}}</a> <!--- Route => CategoriesController/show function + category id -->

                    {{-- delete button --}}

                    <form action="{{route('category.destroy',$category->id)}}"  method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                     </form>
                </li><br/><br/>

            @empty
                <h4>No Items</h4>
            @endforelse
                @endif

        </ul>

    <a class="btn btn-info" data-toggle="modal" href="#category">Create Category</a>
    <div class="modal fade" id="category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title">Create New Category</h5>
                </div>

                {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Category Name')) }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>

    {{--products--}}

    @if(isset($products)) <!--- if $products is set or !empty show $products data -->

    <h3>Products</h3>

    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>Products</th>
    		</tr>
    	</thead>

    	<tbody>
@forelse($products as $product)
    <tr><td>{{$product->name}}</td></tr>
    	@empty
        <tr><td>No Product Available</td></tr>
        @endforelse
        </tbody>

    </table>
    @endif

@endsection
    
    
    