@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of services</h3>
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
                <i class="zmdi zmdi-plus"></i>add services
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Services</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_service')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Name</label>
                                    <select name="category" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Service Name</label>
                                    <input type="text" name="service" class="form-control{{ $errors->has('service') ? ' is-invalid' : '' }}" value="{{old('service')}}">
                                    @if ($errors->has('service'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Icon</label>
                                    <input type="text" name="icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" value="{{old('icon')}}">
                                    @if ($errors->has('icon'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
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
                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Offer Type</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="offer" id="gridRadios1" value="1" checked>
                                                <label class="form-check-label" for="gridRadios1">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="offer" id="gridRadios2" value="2">
                                                <label class="form-check-label" for="gridRadios2"> No </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">On Sale</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sale" id="gridRadios3" value="1" checked>
                                                <label class="form-check-label" for="gridRadios3">Yes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sale" id="gridRadios4" value="2">
                                                <label class="form-check-label" for="gridRadios4"> No </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
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
            <table class="table table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th style="vertical-align:middle;" class="text-center">Category</th>
                        <th style="vertical-align:middle;" class="text-center">Service</th>
                        <th style="vertical-align:middle;" class="text-center">Icon</th>
                        <th style="vertical-align:middle;" class="text-center">Price</th>
                        <th style="vertical-align:middle;" class="text-center">Description</th>
                        <th style="vertical-align:middle;" class="text-center">Offer Type</th>
                        <th style="vertical-align:middle;" class="text-center">On Sale</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($services as $service)
                    <tr class="tr-shadow bg-white">
                        {{-- <td style="vertical-align:middle;" class="py-4">{{ $service->rel_to_categories->id }}</td> --}}
                        <td style="vertical-align:middle;" class="py-4"></td>
                        <td style="vertical-align:middle;" class="py-4">{{$service->service}}</td>
                        <td style="vertical-align:middle; font-size:25px;" class="py-4">{!! $service->icon !!}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$service->price}} </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($service->description)
                                {!! str_limit($service->description,25) !!}
                            @else
                                No description inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($service->offer==1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($service->sale==1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$service->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Services</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_service')}}" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$service->id}}">
                                                        <label class="font-weight-bold">Category Name</label>
                                                        {{-- <select name="Ucategory" class="form-control">
                                                            <option value="{{$service->category}}">{{$service->rel_to_categories->category}}</option>
                                                            @foreach($categories as $category)
                                                                @if($category->id==$service->category)
                                                                    @continue
                                                                @endif
                                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Service Name</label>
                                                        <input type="text" name="Uservice" class="form-control{{ $errors->has('Uservice') ? ' is-invalid' : '' }}" value="{{$service->service}}">
                                                        @if ($errors->has('Uservice'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uservice') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Icon</label>
                                                        <input type="text" name="Uicon" class="form-control{{ $errors->has('Uicon') ? ' is-invalid' : '' }}" value="{{$service->icon}}">
                                                        @if ($errors->has('Uicon'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uicon') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Price</label>
                                                        <input type="text" name="Uprice" class="form-control{{ $errors->has('Uprice') ? ' is-invalid' : '' }}" value="{{$service->price}}">
                                                        @if ($errors->has('Uprice'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uprice') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Description</label>
                                                        <textarea id="Udescription{{$service->id}}" name="Udescription" class="form-control">
                                                            @if($service->description)
                                                                {!! $service->description !!}
                                                            @endif
                                                        </textarea>
                                                        <script>
                                                            CKEDITOR.replace('Udescription{{$service->id}}');
                                                        </script>
                                                    </div>
                                                    <fieldset class="form-group">
                                                        <div class="row">
                                                            <legend class="col-form-label col-sm-2 pt-0">Offer Type</legend>
                                                            <div class="col-sm-10">

                                                                <div class="form-check">
                                                                    @if($service->offer==1)
                                                                    <input class="form-check-input" type="radio" name="Uoffer" id="gridRadios1" value="1" checked>
                                                                    @else
                                                                    <input class="form-check-input" type="radio" name="Uoffer" id="gridRadios1" value="1">
                                                                    @endif
                                                                    <label class="form-check-label" for="gridRadios1">Yes</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    @if($service->offer==2)
                                                                    <input class="form-check-input" type="radio" name="Uoffer" id="gridRadios2" value="2" checked>
                                                                    @else
                                                                    <input class="form-check-input" type="radio" name="Uoffer" id="gridRadios2" value="2">
                                                                    @endif
                                                                    <label class="form-check-label" for="gridRadios2"> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <div class="row">
                                                            <legend class="col-form-label col-sm-2 pt-0">On Sale</legend>
                                                            <div class="col-sm-10">
                                                                <div class="form-check">
                                                                    @if($service->sale==1)
                                                                    <input class="form-check-input" type="radio" name="Usale" id="gridRadios3" value="1" checked>
                                                                    @else
                                                                    <input class="form-check-input" type="radio" name="Usale" id="gridRadios3" value="1">
                                                                    @endif
                                                                    <label class="form-check-label" for="gridRadios3">Yes</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    @if($service->sale==2)
                                                                    <input class="form-check-input" type="radio" name="Usale" id="gridRadios4" value="2" checked>
                                                                    @else
                                                                    <input class="form-check-input" type="radio" name="Usale" id="gridRadios4" value="2">
                                                                    @endif
                                                                    <label class="form-check-label" for="gridRadios4"> No </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn2 btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <button onclick="testing{{$service->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$service->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_service',$service->id)}}"
                                                }
                                        });
                                    }
                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="8">There is no service found</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $services->links() }}
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
    CKEDITOR.replace('description');
</script>
@endsection
