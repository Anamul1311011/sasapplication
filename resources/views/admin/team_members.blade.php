@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of team members</h3>
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
                <i class="zmdi zmdi-plus"></i>add team member
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Team Member</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_members')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Member Name</label>
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Member Designation</label>
                                    <input type="text" name="designation" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{old('designation')}}">
                                    @if ($errors->has('designation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Image</label>
                                    <input type="file" accept="image/*" name="image" class="p-0 form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{old('image')}}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description')}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Facebook Icon</label>
                                    <input type="text" name="f_icon" class="form-control" value="{{old('f_icon')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Facebook Link</label>
                                    <input type="url" name="f_link" class="form-control" value="{{old('f_link')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Twitter Icon</label>
                                    <input type="text" name="t_icon" class="form-control" value="{{old('t_icon')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Twitter Link</label>
                                    <input type="url" name="t_link" class="form-control" value="{{old('t_link')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">LinkedIn Icon</label>
                                    <input type="text" name="l_icon" class="form-control" value="{{old('l_icon')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">LinkedIn Link</label>
                                    <input type="url" name="l_link" class="form-control" value="{{old('l_link')}}">
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
            <table class="table table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th style="vertical-align:middle;" class="text-center">Name</th>
                        <th style="vertical-align:middle;" class="text-center">Designation</th>
                        <th style="vertical-align:middle;" class="text-center">Image</th>
                        <th style="vertical-align:middle;" class="text-center">Facebook icon</th>
                        <th style="vertical-align:middle;" class="text-center">Twitter icon</th>
                        <th style="vertical-align:middle;" class="text-center">LinkedIn icon</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($members as $member)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$member->name}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$member->designation}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <img src="{{asset('/storage')}}/{{$member->image}}" alt="No image found" width="50" height="50">
                        </td>
                        <td style="vertical-align:middle; font-size:25px;" class="py-4">
                            @if($member->f_icon)
                                {!! $member->f_icon !!}
                            @else
                                <h6>No icon is inserted</h6>
                            @endif
                        </td>
                        <td style="vertical-align:middle; font-size:25px;" class="py-4">
                            @if($member->t_icon)
                                {!! $member->t_icon !!}
                            @else
                                <h6>No icon is inserted</h6>
                            @endif
                        </td>
                        <td style="vertical-align:middle; font-size:25px;" class="py-4">
                            @if($member->l_icon)
                                {!! $member->l_icon !!}
                            @else
                                <h6>No icon is inserted</h6>
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$member->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Team Member</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_members')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$member->id}}">
                                                        <label class="font-weight-bold">Member Name</label>
                                                        <input type="text" name="Uname" class="form-control{{ $errors->has('Uname') ? ' is-invalid' : '' }}" value="{{$member->name}}">
                                                        @if ($errors->has('Uname'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Member Designation</label>
                                                        <input type="text" name="Udesignation" class="form-control{{ $errors->has('Udesignation') ? ' is-invalid' : '' }}" value="{{$member->designation}}">
                                                        @if ($errors->has('Udesignation'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Udesignation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Image</label>
                                                        <input type="file" accept="image/*" name="Uimage" class="p-0 form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Description</label>
                                                        <textarea name="Udescription" class="form-control{{ $errors->has('Udescription') ? ' is-invalid' : '' }}">{{$member->description}}</textarea>
                                                        @if ($errors->has('Udescription'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Udescription') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Facebook Icon</label>
                                                        <input type="text" name="Uf_icon" class="form-control" value="{{$member->f_icon}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Facebook Link</label>
                                                        <input type="url" name="Uf_link" class="form-control" value="{{$member->f_link}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Twitter Icon</label>
                                                        <input type="text" name="Ut_icon" class="form-control" value="{{$member->t_icon}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Twitter Link</label>
                                                        <input type="url" name="Ut_link" class="form-control" value="{{$member->t_link}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">LinkedIn Icon</label>
                                                        <input type="text" name="Ul_icon" class="form-control" value="{{$member->l_icon}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">LinkedIn Link</label>
                                                        <input type="url" name="Ul_link" class="form-control" value="{{$member->l_link}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn2 btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                                <button onclick="testing{{$member->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$member->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_members',$member->id)}}"
                                                }
                                        });
                                    }
                                </script>
                                
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="7">There is no team member found</td></tr>
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