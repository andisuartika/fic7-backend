@extends('layouts.master')
@section('title') Dashboard @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('li_1') Dastone @endslot
            @slot('li_2') Tables @endslot
            @slot('li_3') Basic Tables @endslot
            @slot('title') Basic Tables @endslot
        @endcomponent

        <div class="row">
          <div class="col-lg-6">
              <ul class="list-inline">
                  <li class="list-inline-item">
                      <h5 class="mt-0">List Users <span class="badge badge-pink">6</span></h5>
                  </li>
              </ul>
          </div><!--end col-->

          <div class="col-lg-6 text-end">
            <form method="GET">
              <div class="text-end">
                  <ul class="list-inline">
                      <li class="list-inline-item">
                          <div class="input-group">
                              <input type="text" name="search" class="form-control form-control-sm" placeholder="Search">
                              <button type="submit" class="btn btn-soft-primary btn-sm"><i class="fas fa-search"></i></button>
                          </div>
                      </li>
                  </ul>
              </div>
            </form>
          </div><!--end col-->
      </div>

        <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Striped rows</h4>
                      <p class="text-muted mb-0">
                          Use <code>.table-striped</code> to add zebra-striping to any table row
                          within the <code>&lt;tbody&gt;</code>.
                      </p>
                  </div><!--end card-header-->
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-striped mb-0">
                              <thead>
                              <tr>
                                  <th class="text-center">No</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Status</th>
                                  <th class="text-end">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($users as $index => $user )
                                  
                                <tr>
                                  <td class="text-center">{{ $index + $users->firstItem() }}</td>
                                    <td><img src="{{ URL::asset('assets/images/users/user-1.jpg') }}" alt="" class="rounded-circle thumb-xs me-1"> {{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                      @if ($user->email_verified_at != null)
                                      <span class="badge badge-soft-success">Active</span>
                                      @else
                                      <span class="badge badge-soft-danger">Pending</span>
                                      @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                        <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table><!--end /table-->
                            <div class="mt-3 float-right">
                              {{ $users->withQueryString()->links() }} <!-- Display pagination links -->
                            </div>
                      </div><!--end /tableresponsive-->
                  </div><!--end card-body-->
              </div><!--end card-->
          </div> <!-- end col -->
      </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
