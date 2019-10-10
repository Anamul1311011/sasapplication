@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of service plans</h3>
    @if($errors->any())
        <script>
            swal({
                title:"Oops! Something went wrong!",
                text:"Please check",
                icon:"warning",
            })
        </script>
    @endif

    @if(session('insert'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success text-center">{{session('insert')}}</div>
            </div>
        </div>
    @endif
    @if(session('update'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-primary text-center">{{session('update')}}</div>
            </div>
        </div>
    @endif
    @if(session('delete'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger text-center">{{session('delete')}}</div>
            </div>
        </div>
    @endif
    <div class="table-data__tool">
        <div class="table-data__tool-left ml-3">
            
        </div>
        <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#adding">
                <i class="zmdi zmdi-plus"></i>add service plans
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Service Plan</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_service_plans')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Service</label>
                                    <input type="text" name="service" class="form-control{{ $errors->has('service') ? ' is-invalid' : '' }}" value="{{old('service')}}">
                                    @if ($errors->has('service'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Package</label>
                                    <input type="text" name="package" class="form-control{{ $errors->has('package') ? ' is-invalid' : '' }}" value="{{old('package')}}">
                                    @if ($errors->has('package'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('package') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Basic</label>
                                    <input type="text" name="basic" class="form-control{{ $errors->has('basic') ? ' is-invalid' : '' }}" value="{{old('basic')}}">
                                    @if ($errors->has('basic'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('basic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Premium</label>
                                    <input type="text" name="premium" class="form-control{{ $errors->has('premium') ? ' is-invalid' : '' }}" value="{{old('premium')}}">
                                    @if ($errors->has('premium'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('premium') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Price</label>
                                    <input type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{old('price')}}">
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn2 btn-success">Insert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-lg-12">
            <table class="table table-hover text-center" id="datatable">
                <thead class="thead-light">
                    <tr>
                        <th style="vertical-align:middle;" class="text-center">Service</th>
                        <th style="vertical-align:middle;" class="text-center">Package</th>
                        <th style="vertical-align:middle;" class="text-center">Basic</th>
                        <th style="vertical-align:middle;" class="text-center">Premium</th>
                        <th style="vertical-align:middle;" class="text-center">Price</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($plans as $plan)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$plan->service}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$plan->package}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$plan->basic}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$plan->premium}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$plan->price}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$plan->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Service Plan</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_service_plans')}}" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$plan->id}}">
                                                        <label class="font-weight-bold">Service</label>
                                                        <input type="text" name="Uservice" class="form-control{{ $errors->has('Uservice') ? ' is-invalid' : '' }}" value="{{$plan->service}}">
                                                        @if ($errors->has('Uservice'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uservice') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Package</label>
                                                        <input type="text" name="Upackage" class="form-control{{ $errors->has('Upackage') ? ' is-invalid' : '' }}" value="{{$plan->package}}">
                                                        @if ($errors->has('Upackage'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Upackage') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Basic</label>
                                                        <input type="text" name="Ubasic" class="form-control{{ $errors->has('Ubasic') ? ' is-invalid' : '' }}" value="{{$plan->basic}}">
                                                        @if ($errors->has('Ubasic'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Ubasic') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Premium</label>
                                                        <input type="text" name="Upremium" class="form-control{{ $errors->has('Upremium') ? ' is-invalid' : '' }}" value="{{$plan->premium}}">
                                                        @if ($errors->has('Upremium'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Upremium') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Price</label>
                                                        <input type="text" name="Uprice" class="form-control{{ $errors->has('Uprice') ? ' is-invalid' : '' }}" value="{{$plan->price}}">
                                                        @if ($errors->has('Uprice'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uprice') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn2 btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                                <button onclick="testing{{$plan->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$plan->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_service_plan',$plan->id)}}"
                                                }
                                        });
                                    }
                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="6">There is no service plan found</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- END DATA TABLE -->
</div>


@endsection

@section('javaScript')
<script src="{{asset('plugins/DataTables/jquery.dataTables.min.js')}}"></script>
<script>

    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
@endsection