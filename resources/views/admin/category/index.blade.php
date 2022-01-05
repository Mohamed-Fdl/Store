@extends('admin.admin_base')
@section('title','Admin categories')
@section('content')
@if(session('success'))
<div class="alert alert-primary" role="alert">
    {{session('success')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add new category
            </header>
            <div class="panel-body">
                <form class="form-inline" method='post' action="{{route('ad_adcategory')}}" role="form">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Category name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail2" placeholder="Category name ">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>

            </div>
        </section>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Resume of categories
            </header>

            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Category</th>
                        <th><i class="icon_cogs"></i> Delete</th>
                    </tr>
                    @foreach (App\Models\Category::all() as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="{{route('admin_delcategory',['id'=>$category->id])}}"><i class="icon_close_alt2"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>

@endsection
