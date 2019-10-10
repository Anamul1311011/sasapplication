@extends('admin.layouts.main')

@section('content')


<div class="col-md-12">

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35 pl-3">data table of Key Service </h3>
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
            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addContact">
                <i class="zmdi zmdi-plus"></i>add Key Service
            </button>
            <!-- Modal -->
            <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0 border-0">
                        <div class="modal-header rounded-0 border-0 bg-success">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add Key Service </h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insert_service_category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Category Name</label>
                                    <input type="text" name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{old('category')}}">
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
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
                                    <label class="font-weight-bold">Icon</label>
                                    <input type="text" name="icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" value="{{old('icon')}}">
                                    @if ($errors->has('icon'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
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
                        <th style="vertical-align:middle;" class="text-center">Category </th>
                        <th style="vertical-align:middle;" class="text-center">Title</th>
                        <th style="vertical-align:middle;" class="text-center">Icon</th>
                        <th style="vertical-align:middle;" class="text-center">Image</th>
                        <th style="vertical-align:middle;" class="text-center">Price</th>
                        <th style="vertical-align:middle;" class="text-center">Description</th>
                        <th style="vertical-align:middle;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr class="tr-shadow bg-white">
                        <td style="vertical-align:middle;" class="py-4">{{$category->category}}</td>
                        <td style="vertical-align:middle;" class="py-4">{{$category->title}}</td>
                        <td style="vertical-align:middle; font-size:25px;" class="py-4">{!! $category->icon !!}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            <img src="{{asset('/storage')}}/{{$category->image}}" alt="No Image Found" width="50" height="50">
                        </td>
                        <td style="vertical-align:middle;" class="py-4">{{$category->price}}</td>
                        <td style="vertical-align:middle;" class="py-4">
                            @if($category->description)
                                {!! str_limit($category->description, 25) !!}
                            @else
                                No description inserted
                            @endif
                        </td>
                        <td style="vertical-align:middle;" class="py-4">
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit{{$category->id}}" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content rounded-0 border-0">
                                            <div class="modal-header rounded-0 border-0 bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Edit Service Category</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('update_service_category')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body text-left">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Uid" value="{{$category->id}}">
                                                        <label class="font-weight-bold">Category Name</label>
                                                        <input type="text" name="Ucategory" class="form-control{{ $errors->has('Ucategory') ? ' is-invalid' : '' }}" value="{{$category->category}}">
                                                        @if ($errors->has('Ucategory'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Ucategory') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Title</label>
                                                        <input type="text" name="Utitle" class="form-control{{ $errors->has('Utitle') ? ' is-invalid' : '' }}" value="{{$category->title}}">
                                                        @if ($errors->has('Utitle'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Utitle') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Icon</label>
                                                        <input type="text" name="Uicon" class="form-control{{ $errors->has('Uicon') ? ' is-invalid' : '' }}" value="{{$category->icon}}">
                                                        @if ($errors->has('Uicon'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uicon') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Image</label>
                                                        <input type="file" accept="image/*" name="Uimage" class="p-0 form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Price</label>
                                                        <input type="text" name="Uprice" class="form-control{{ $errors->has('Uprice') ? ' is-invalid' : '' }}" value="{{$category->price}}">
                                                        @if ($errors->has('Uprice'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('Uprice') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Description</label>
                                                        <textarea id="description{{$category->id}}" name="Udescription" class="form-control">
                                                            @if($category->description)
                                                                {!! $category->description !!}
                                                            @endif
                                                        </textarea>
                                                        <script>
                                                            CKEDITOR.replace('description{{$category->id}}');
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

                                <button onclick="testing{{$category->id}}()" data-toggle="tooltip" data-placement="top" class="item" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <script>
                                    function testing{{$category->id}}() {
                                        swal({
                                                title: "Are you sure you wanna delete?",
                                                text: "Once deleted, you will not be able to recover it!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "{{route('delete_service_category',$category->id)}}"
                                                }
                                        });
                                    }
                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                @empty
                    <tr><td colspan="7">There is no service category found</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
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
