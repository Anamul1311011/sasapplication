@extends('admin.layouts.main')
@section('add-quotation-page')
active
@endsection
@section('content')

  <div class="Card panel-container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-success">
          <div class="panel-heading">
            @if(session('successdelete'))
                            <div class="alert alert-info">
                                {{ session('successdelete') }}
                            </div>
                            @endif
            List Quotation
          </div>

          <div class="panel-body">
            <table class="table table-bordered">
              <thead>
                <th>Serial_No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Created At</th>

                <th>Action</th>
              </thead>
              @php
                $i =1;
              @endphp
              @foreach ($quotations as $quotation)

                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $quotation->f_name }}</td>
                  <td>{{ $quotation->l_name }}</td>
                  <td>{{ $quotation->email }}</td>
                  <td>{{ $quotation->phone }}</td>
                  <td>{{ $quotation->message }}</td>
                  <td>{{ $quotation->created_at }}</td>

                  <td>
                    <a class="" href="{{ url('delete/quotation') }}/{{ $quotation->id }}"> <span style="color:red; font-size:20px;"><i class="fas fa-trash"></i></span> </a>
                  </td>
                </tr>
                @php
                  $i++;
                @endphp
              @endforeach
            </table>
            {{ $quotations->links() }}

          </div>
        </div>
      </div>

    </div><!--/.row-->
  </div>


@endsection
