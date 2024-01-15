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
    

    {{--Uploading assest created by Vite assest complier--}}
    @vite([
    'public/vendor/datatables/jquery.dataTables.min.js',
    'public/vendor/datatables/dataTables.bootstrap4.min.js',
    'public/vendor/demo/datatables-demo.js',
    'public/vendor/jquery-easing/jquery.easing.min.js',])


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
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Create at</th>
                  <th>Updated at</th>
                  <th>Delete</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Owner</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Create at</th>
                  <th>Updated at</th>
                  <th>Delete</th>
                </tr>
              </tfoot>

              <tbody>
                @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>
                      <img height="40px" src="{{$post->post_image}}" alt="">
                    </td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                      <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
</x-admin-master>