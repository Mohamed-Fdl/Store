@extends('admin.admin_base')
@section('title','Admin coupons')
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
                Add new coupon
            </header>
            <div class="panel-body">
                <form class="form-inline" method='post' action="{{route('ad_adcoupon')}}" role="form">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="code" value="{{old('code')}}" class="form-control" id="exampleInputEmail2" placeholder="Code of coupon" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="percent" value="{{old('percent')}}" class="form-control" id="exampleInputEmail2" placeholder="Percentage " required>
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
                Resume of coupons
            </header>

            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Code </th>
                        <th><i class="icon_profile"></i> Percentage</th>
                        <th><i class="icon_cogs"></i> Delete</th>
                    </tr>
                    @foreach (App\Models\Coupon::all() as $coupon)
                    <tr>
                        <td>{{$coupon->code}}</td>
                        <td>{{$coupon->percent}} %</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="{{route('admin_delcoupon',['id'=>$coupon->id])}}"><i class="icon_close_alt2"></i></a>
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
