@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of hosting features</h3>
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
            <!-- <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#adding">
                <i class="zmdi zmdi-plus"></i>Register More
            </button> -->
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Register one more user</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_host_feature')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Hosting Name</label>
                                    <select name="hosting" class="form-control">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Feature</label>
                                    <input type="text" name="feature" class="form-control{{ $errors->has('feature') ? ' is-invalid' : '' }}" value="{{old('feature')}}">
                                    @if ($errors->has('feature'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('feature') }}</strong>
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
            <table class="table table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th style="vertical-align:middle;" class="text-center">User Name</th>
                        <th style="vertical-align:middle;" class="text-center">Email</th>
                        <th style="vertical-align:middle;" class="text-center">Image</th>
                        <th style="vertical-align:middle;" class="text-center">Password</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$user->name}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$user->email}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <img src="{{asset('/storage')}}/{{$user->image}}" alt="No image found" width="50" height="50">
                        </td>
                        <td style="vertical-align:middle;" class="py-4">{{$user->password}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$user->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit User Information</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_users')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$user->id}}">
                                                        <label class="font-weight-bold">Name</label>
                                                        <input type="text" name="Uname" class="form-control{{ $errors->has('Uname') ? ' is-invalid' : '' }}" value="{{$user->name}}">
                                                        @if ($errors->has('Uname'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Image</label>
                                                        <input type="file" accept="image/*" name="Uimage" class="p-0 form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Password</label>
                                                        <input type="password" name="Upassword" class="form-control{{ $errors->has('Upassword') ? ' is-invalid' : '' }}" value="{{$user->password}}">
                                                        @if ($errors->has('Upassword'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Upassword') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Email</label>
                                                        <input type="email" name="Uemail" class="form-control{{ $errors->has('Uemail') ? ' is-invalid' : '' }}" value="{{$user->email}}">
                                                        @if ($errors->has('Uemail'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uemail') }}</strong>
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
                            
                                
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="5">There is no user found</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
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