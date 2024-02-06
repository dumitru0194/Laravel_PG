<x-admin-master>
    @section('content')


    {{--Show to user falsh messages from succesfull create/update forms--}}
    @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
      @elseif(Session::has('post-created-message'))
        <div class="alert alert-success">{{Session::get('post-created-message')}}</div>
      @elseif(Session::has('post-updated-message'))
        <div class="alert alert-success">{{Session::get('post-updated-message')}}</div>
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

      </div>
      <div class="pagination justify-content-center">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
      {{-- {{$posts->links('pagination::bootstrap-4')}} --}}
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
        {{-- <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.js')}}"></script> --}}
        

        <!-- Page level custom scripts -->
           {{-- <script src="{{asset('/vendor/demo/datatables-demo.js')}}"></script> --}}
    @endsection

</x-admin-master>