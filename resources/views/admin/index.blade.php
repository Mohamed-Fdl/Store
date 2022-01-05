@extends('admin.admin_base')
@section('title','Admistration')
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
                Add new administrator
            </header>
            <div class="panel-body">
                <form class="form-inline" method='post' action="{{route('ad_admin')}}" role="form">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="exampleInputEmail2" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="{{old('percent')}}" class="form-control" id="exampleInputEmail2" placeholder="Password" required>
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
                Admins resume
            </header>

            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Utilisateur</th>
                        <th><i class="icon_cogs"></i> Supprimer</th>
                    </tr>
                    @foreach (App\Models\Admin::all() as $admin)
                    <tr>
                        <td>{{$admin->username}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="{{route('admin_deladmin',['id'=>$admin->id])}}"><i class="icon_close_alt2"></i></a>
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
