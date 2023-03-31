<!DOCTYPE html>
<htm llang="en">

    <head>
        <!-- Design by foolishdeveloper.com -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <!--Stylesheet-->
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
        .row {
            width: 100%;
        }

        a {
            text-decoration: none;
        }

        .col-md-8 {
            margin-top: 2%;
        }
        </style>

    </head>


    <body>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">
                        <div class="form-outline mb-4">
                            <a href="{{ url('/posts') }}"><button type="text" id="addANote" class="form-control">
                                    Back</a>

                        </div>





                        <div class="modal-body">
                            @foreach($posts as $post)
                            <form action="/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">

                                    <label for="body" class="form-label">Text</label>
                                    <textarea class="form-control" id="body" name="text"
                                        required>{{$post->text}}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label lass="form-label">Image</label>
                                    <input value="{{$post->img}}" type="file" class="form-control" id="title"
                                        name="img">
                                </div>
                                <div class="mb-3">
                                    @endforeach
                                    <label for="body" class="form-label">Categories</label>
                                    <ul>
                                        @foreach($categories as $category)
                                        <li>
                                            <input type="checkbox" id="checkbox-1" name="category_name[]"
                                                value="{{$category->id}}">
                                            <label>{{$category->name_category}}</label>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>