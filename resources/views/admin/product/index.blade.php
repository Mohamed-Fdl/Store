@extends('admin.admin_base')
@section('title','Add product')
@section('content')
@if(session('success'))
<div class="alert alert-primary" role="alert">
  {{session('success')}}
</div>
@endif
<section class="panel">
    <header class="panel-heading">
        Form Elements
    </header>
    <div class="panel-body">
        <form class="form-horizontal" action="{{route('ad_addproduct')}}" method="post" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">Product title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Sub title</label>
                <div class="col-sm-10">
                    <input type="text" name="subtitle" value="{{old('subtitle')}}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" name="description" class="form-control " required>{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Price in cents</label>
                <div class="col-sm-10">
                    <input type="number"  name="price" value="{{old('price')}}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2" for="inputSuccess">Product rating</label>
                <div class="col-lg-10">
                    <select class="form-control m-bot15" name="rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Product's stock</label>
                <div class="col-sm-10">
                    <input type="number"   name="stocks" value="{{old('stocks')}}"  class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2" for="inputSuccess">Category</label>
                <div class="col-lg-10">
                    @foreach (App\Models\Category::all() as $category)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name='{{$category->id}}' value="{{$category->id}}">
                            {{$category->name}}
                        </label>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Image (Obligatory)</label>
                <div class="col-sm-10">
                    <input class="form-control"   name="image" value="{{old('image')}}" id="focusedInput" type="file" value="This is focused..."  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Image (Optional)</label>
                <div class="col-sm-10">
                    <input class="form-control"   name="img_f1" value="{{old('img_f1')}}" id="focusedInput" type="file" value="This is focused..." >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Image (Optional)</label>
                <div class="col-sm-10">
                    <input class="form-control"  name="img_f2" value="{{old('img_f2')}}"  id="focusedInput" type="file" value="This is focused..." >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>



@endsection
