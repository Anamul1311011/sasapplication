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
            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#adding">
                <i class="zmdi zmdi-plus"></i>add hosting features
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Hosting Feature</h5>
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
                                        @foreach($hostings as $hosting)
                                        <option value="{{$hosting->id}}">{{$hosting->title}}</option>
                                        @endforeach
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
                        <th style="vertical-align:middle;" class="text-center">Hosting</th>
                        <th style="vertical-align:middle;" class="text-center">Feature</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($features as $feature)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$feature->rel_to_hostings->title}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$feature->feature}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$feature->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$feature->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Hosting Feature</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_host_feature')}}" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$feature->id}}">
                                                        <label class="font-weight-bold">Hosting Name</label>
                                                        <select name="Uhosting" class="form-control">
                                                            <option value="{{$feature->hosting}}">{{$feature->rel_to_hostings->title}}</option>
                                                            @foreach($hostings as $hosting)
                                                                @if($feature->hosting==$hosting->id)
                                                                    @continue
                                                                @endif
                                                                <option value="{{$hosting->id}}">{{$hosting->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Feature</label>
                                                        <input type="text" name="Ufeature" class="form-control{{ $errors->has('Ufeature') ? ' is-invalid' : '' }}" value="{{$feature->feature}}">
                                                        @if ($errors->has('Ufeature'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Ufeature') }}</strong>
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
                            
                                <button onclick="testing{{$feature->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$feature->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_host_feature',$feature->id)}}"
                                                }
                                        });
                                    }
                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="3">There is no hosting feature found</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $features->links() }}
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