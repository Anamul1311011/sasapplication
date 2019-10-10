@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of blogs</h3>
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
                <i class="zmdi zmdi-plus"></i>add blogs
            </button>
            <!-- Modal -->
            <div class="modal fade" id="adding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Blog</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_blogs')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Blog Category</label>
                                    <select name="category" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Blog Writer</label>
                                    <select name="writer" class="form-control">
                                        @foreach($writers as $writer)
                                        <option value="{{$writer->id}}">{{$writer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Thumbnail Image</label>
                                    <input type="file" accept="image/*" value="{{old('thumbnail')}}" name="thumbnail" class="p-0 form-control{{ $errors->has('thumbnail') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('thumbnail'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('thumbnail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Description</label>
                                    <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description')}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
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
                        {{--<th style="vertical-align:middle;" class="text-center">Blog Category</th>--}}
                        <th style="vertical-align:middle;" class="text-center">Thumbnail Image</th>
                        <th style="vertical-align:middle;" class="text-center">Description</th>
                        <th style="vertical-align:middle;" class="text-center">Writer</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr class="tr-shadow bg-white">
                        {{-- <td style="vertical-align:middle;" class="py-4">{{$blog->categoryName->category}}</td> --}}

                        <td style="vertical-align:middle;" class="py-4">
                            <img src="{{asset('/storage')}}/{{$blog->thumbnail}}" alt="No Thumbnail Image Found" width="50" height="50">
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            {!! str_limit($blog->description,40) !!}
                        </td>
                        <td style="vertical-align:middle;" class="py-4">{{(!empty($blog->writerName))?$blog->writerName->name:'unone'}}</td>

                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#blogEdit_{{$blog->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="blogEdit_{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="blogModalCenterTitle_{{$blog->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="blogModalCenterTitle_{{$blog->id}}">Edit Blog</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_blogs')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$blog->id}}">
                                                        <label class="font-weight-bold">Blog Category</label>
                                                        <select name="Ucategory" class="form-control">
                                                            <option value="{{$blog->category}}">{{$blog->categoryName->category}}</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}"{{ ($blog->category==$category->id)?' selected':'' }}>{{$category->category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Blog Writer</label>
                                                        <select name="Uwriter" class="form-control">
                                                            @foreach($writers as $writer)
                                                                <option value="{{$writer->id}}"{{ ($blog->writer==$writer->id)?' selected':'' }}>{{$writer->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Thumbnail Image</label>
                                                        <input type="file" accept="image/*" name="Uthumbnail" class="p-0 form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Description</label>
                                                        <textarea name="Udescription" id="blogDescription_{{$blog->id}}" class="form-control{{ $errors->has('Udescription') ? ' is-invalid' : '' }}">{!! $blog->description !!}</textarea>
                                                        @if ($errors->has('Udescription'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Udescription') }}</strong>
                                                            </span>
                                                        @endif
                                                        <script>CKEDITOR.replace('blogDescription_{{$blog->id}}');</script>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn2 btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button onclick="testing{{$blog->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$blog->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_blogs',$blog->id)}}"
                                                }
                                        });
                                    }
                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="4">There is no blog found</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $blogs->links() }}
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
