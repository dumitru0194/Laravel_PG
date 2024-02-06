<x-admin-master>
    @section('content')


    {{--Show to user falsh messages from succesfull create/update forms--}}
    @if(Session::has('user-deleted'))
        <div class="alert alert-danger">{{Session::get('user-deleted')}}</div>
    @endif
    

    {{-- Uploading assest created by Vite assest complier--}}

    {{-- @vite([
    '/public/vendor/datatables/jquery.dataTables.min.js',
    '/public/vendor/datatables/dataTables.bootstrap4.min.js',
    '/public/vendor/jquery-easing/jquery.easing.min.js',
    '/resources/css/sb-admin-2.css',
    'public/js/bootstrap.js',
    ]) --}}


    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered date</th>
                        <th>Update Profile Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
    
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered date</th>
                        <th>Update Profile Date</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>

              <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>
                          <a href="{{route('user.profile.show', $user->id)}}">{{$user->username}}</a></td>
                        <td>
                            <img class="imf-profile rounded-picture" src="{{$user->avatar}}" alt="" width="70">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->created_at->diffForhumans()}}</td>
                        <td>{{$user->updated_at->diffForhumans()}}</td>
                        <td>
                            <form method="post" action="{{route('user.destroy', $user->id)}}">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{-- <div class="pagination justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }}
    </div> --}}
      {{-- {{$posts->links('pagination::bootstrap-4')}} --}}
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
        <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.js')}}"></script>
        

        <!-- Page level custom scripts -->
           <script src="{{asset('/vendor/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>