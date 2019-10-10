@extends('admin.layouts.main')

@section('add-coupon-page')

active

@endsection

@section('content')



        <div class="col-md-8">
          <div class="card">
            <h5 class="card-header bg-info text-white">
              @if(session('successdelete'))
                  <div class="alert alert-info">
                      {{ session('successdelete') }}
                  </div>
              @endif
              List Coupon
            </h5>
            <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                    <th>Coupon</th>
                      <th>Percentage(%)</th>
                  </thead>

                  @foreach($coupons as $coupon)
                  <tr>
                      <td>{{ $coupon->coupon }}</td>
                      <td>{{ $coupon->percentage }}%</td>
                  </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header bg-info text-white">
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
              @endif
              Add Coupon
            </h5>
            <div class="card-body">
              <form action="{{ url('/coupon/insert') }}" method="post">
                  @csrf
                  <div class="form-group">
                      <label>Percentage</label>
                      <input type="number" class="form-control" placeholder="Enter Percentage" name="percentage" value="{{ old('percentage') }}">
                      @if ($errors->has('percentage'))
                      <strong style="color:red">{{ $errors->first('percentage') }}</strong>
                      @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Add Coupon</button>
              </form>
            </div>
          </div>


<!-- @if($errors->all())
<div class="alert alert-danger">
@foreach ($errors->all() as $value)
<li>{{ $value }}</li>
@endforeach
</div>
@endif -->
                </div>
            </div>
          </div>
          {{-- row --}}


        @endsection
