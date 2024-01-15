<x-admin-master>

    @section('content')

        <h1>Edit a post</h1>

        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input 
                type="text" 
                name="title"
                class="form-control"
                id="title"
                aria-describedby=""
                placeholder="Enter title"
                value="{{$post->title}}"
                >
            </div>


            <div class="form-group">
                <div><img height="100px" src="{{asset($post->post_image)}}" alt=""></div>
                <label for="file">File</label>
                <input 
                type="file" 
                name="post_image"
                class="form-control-file"
                id="post_image"
                aria-describedby=""
                placeholder="Enter title"
                >
            </div>


            <div class="form-group">
                <label for="file">Body</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    @endsection


</x-admin-master>