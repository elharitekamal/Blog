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


                        @foreach($comments as $comment)
                        <div class="card mb-4">
                            <div class="card-body">
                                <p>{{$comment->text}}</p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                            alt="avatar" width="25" height="25" />
                                        <p class="small mb-0 ms-2">{{$comment->users->fullname}}</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">



                                        <p>{{ $comment->cmntlike->count() }} Like</p>


                                        @if($comment->cmntlike->contains('user_id', auth()->id()))

                                        <form method=" POST" action="/cmntdislike/{{ $comment->id }}">
                                            @csrf
                                            <input type="hidden" name="id_post" value="{{$comment->id_post}}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="far fa-thumbs-down"></i>
                                            </button>
                                        </form>

                                        @else
                                        <form method="POST" action="/cmntlike/{{ $comment->id }}">
                                            @csrf
                                            <input type="hidden" name="id_post" value="{{$comment->id_post}}">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="far fa-thumbs-up"></i></button>
                                        </form>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>