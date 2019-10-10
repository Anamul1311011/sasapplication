@extends('admin.layouts.main')
@section('add-budget-page')
active
@endsection
@section('content')

  <div class="panel panel-container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-success">
          <div class="panel-heading">
            @if(session('successdelete'))
                            <div class="alert alert-info">
                                {{ session('successdelete') }}
                            </div>
                            @endif
            List Newsletter
          </div>

          <div class="panel-body">
            <table class="table table-bordered">
              <thead>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </thead>
              @foreach ($newsletters as $newsletter)
                <tr>
                  <td>{{ $newsletter->email }}</td>
                  <td>{{ $newsletter->created_at }}</td>
                  <td>{{ $newsletter->updated_at ? $newsletter->updated_at:"Not Yet" }}</td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="{{ url('delete/newsletter') }}/{{ $newsletter->id }}"> <span style="color:white">Delete</span> </a>
                  </td>
                </tr>
              @endforeach
            </table>
            {{ $newsletters->links() }}

          </div>
        </div>
      </div>

    </div><!--/.row-->
  </div>


@endsection
