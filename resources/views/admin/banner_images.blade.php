@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of banner images</h3>
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
                <i class="zmdi zmdi-plus"></i>add banner images
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Banner Image</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_banner_images')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Image Category</label>
                                    <input type="text" name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{old('category')}}" placeholder="e.g.Homepage banner image, Hosting banner Image">
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
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
                                    <label class="font-weight-bold">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Subtitle</label>
                                    <input type="text" name="sub_title" class="form-control" value="{{old('sub_title')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Typewrite</label>
                                    <input type="text" name="typewrite" class="form-control" placeholder='"one Stop Solution", "User friendly UI", "Cloud Applications", "Customized Solution"' value="{{old('typewrite')}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
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
                        <th style="vertical-align:middle;" class="text-center">Category</th>
                        <th style="vertical-align:middle;" class="text-center">Image</th>
                        <th style="vertical-align:middle;" class="text-center">Title</th>
                        <th style="vertical-align:middle;" class="text-center">Subtitle</th>
                        <th style="vertical-align:middle;" class="text-center">Typewrite</th>
                        <th style="vertical-align:middle;" class="text-center">Description</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($images as $image)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$image->category}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <img src="{{asset('/storage')}}/{{$image->image}}" alt="No Banner Image Found" width="50" height="50">
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($image->title)
                                {{$image->title}}
                            @else
                            No title is inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($image->sub_title)
                                {{$image->sub_title}}
                            @else
                            No subtitle is inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($image->typewrite)
                                {{$image->typewrite}}
                            @else
                            No subtitle is inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($image->description)
                                {!! str_limit($image->description,35) !!}
                            @else
                            No description is inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$image->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit "{{$image->category}}"</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_banner_images')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$image->id}}">
                                                        <label class="font-weight-bold">Image</label>
                                                        <input type="file" accept="image/*" name="Uimage" class="p-0 form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Title</label>
                                                        <input type="text" name="Utitle" class="form-control" value="{{$image->title}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Subtitle</label>
                                                        <input type="text" name="Usub_title" class="form-control" value="{{ $image->sub_title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Typewrite</label>
                                                        <input type="text" name="typewrite" class="form-control" value="{{$image->typewrite}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Description</label>
                                                        <textarea name="Udescription" id="Udescription{{$image->id}}" class="form-control">{!! $image->description !!}</textarea>
                                                        <script>
                                                            CKEDITOR.replace('Udescription{{$image->id}}')
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

                                <!-- <button onclick="" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button> -->

                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="6">There is no banner image found</td></tr>
                @endif
                </tbody>
            </table>
            {{ $images->links() }}
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
