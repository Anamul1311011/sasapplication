@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of contacts</h3>
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
                <i class="zmdi zmdi-plus"></i>add settings
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        @if($number==1)
                        <div class="modal-body p-5">
                            You are not allowed to insert one new settings, untill you delete the old settings.
                        </div>
                        @else
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Settings</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_settings')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Title</label>
                                    <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{old('title')}}">  
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Logo</label>
                                    <input type="file" accept="image/*" name="logo" class="p-0 form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" value="{{old('logo')}}">
                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Typing</label>
                                    <input type="text" name="typing" class="form-control{{ $errors->has('typing') ? ' is-invalid' : '' }}" value="{{old('typing')}}" placeholder="auto typing text of home page">
                                    @if ($errors->has('typing'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('typing') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea name="description" class="form-control" id="description"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn2 btn-success">Insert</button>
                            </div>
                        </form>
                        @endif
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
                        <th style="vertical-align:middle;" class="text-center">Title</th>
                        <th style="vertical-align:middle;" class="text-center">Logo</th>
                        <th style="vertical-align:middle;" class="text-center">Auto Typing Text</th>
                        <th style="vertical-align:middle;" class="text-center">Description</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($number==1)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$settings->title}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <img src="{{asset('/storage')}}/{{$settings->logo}}" alt="No Image Found" width="50" height="50">
                        </td>
                        <td style="vertical-align:middle;" class="py-4">{{$settings->typing}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($settings->description)
                                {!! str_limit($settings->description,35) !!}
                            @else
                                No description inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <!-------------------Update Starts here---------------------->
                                <button class="item" data-toggle="modal" data-target="#edit{{$settings->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$settings->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Settings</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_settings')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$settings->id}}">
                                                        <label class="font-weight-bold">Title</label>
                                                        <input type="text" name="Utitle" class="form-control{{ $errors->has('Utitle') ? ' is-invalid' : '' }}" value="{{$settings->title}}">  
                                                        @if ($errors->has('Utitle'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Utitle') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Logo</label>
                                                        <input type="file" accept="image/*" name="Ulogo" class="p-0 form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Typing</label>
                                                        <input type="text" name="Utyping" class="form-control{{ $errors->has('Utyping') ? ' is-invalid' : '' }}" value="{{$settings->typing}}">
                                                        @if ($errors->has('Utyping'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Utyping') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Description</label>
                                                        <textarea name="Udescription" class="form-control" id="Udescription{{$settings->id}}">
                                                            @if($settings->description)
                                                                {!! $settings->description !!}
                                                            @endif    
                                                        </textarea>
                                                        <script>
                                                            CKEDITOR.replace('Udescription{{$settings->id}}');
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn2 btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!------------------Delete starts here----------------------->
                                <button onclick="testing{{$settings->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$settings->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_settings',$settings->id)}}"
                                                }
                                        });
                                    }
                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @else
                    <tr><td colspan="5">There is no settings information found</td></tr>
                    @endif
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
    CKEDITOR.replace('description');
</script>
@endsection