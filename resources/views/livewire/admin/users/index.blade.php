
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-8">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Users</h4>
                    </div>
                </div>
                <div class="col-4">
                    <a wire:navigate href="{{ route('admin.users.create') }}" class="btn btn-primary float-end"> Add New User</a>
                </div>
            </div>
            <!-- end page title -->

            @include('components.layouts.message')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="row g-3 mb-3">
                                <div class="col-9">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Enter search value"  wire:model.live.debounce.150ms="search">
                                </div>
                            </div>
                            <table class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users) > 0)
                                        @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile_no }}</td>
                                                <td>{{ date('d-m-Y H:i A',strtotime($user->created_at)) }}</td>
                                                <td>
                                                    <a wire:navigate href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-icon btn-outline-primary waves-effect">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" wire:click="delete({{$user->id}})" class="btn btn-icon btn-outline-danger waves-effect"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div> 
            </div>

        </div>
        <!-- container-fluid -->
        
    </div>
    @push('script')
    <script>
        function hello() {
      console.log("dvdsvd")
    }

    </script>
    @endpush


        