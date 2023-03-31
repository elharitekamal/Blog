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
        a {
            text-decoration: none;
        }

        .btn-primary {
            background-color: #A2AEAC;
        }

        .modal-content {
            margin-top: 15%;
            background-color: #91ACEA;

        }
        </style>

    </head>


    <body style="background-color: #000000; ">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light " style=" background-color: #A2AEAC">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">BLOG</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <section>

            <!-- Button to trigger modal -->
            <div class="flex">
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                        Add Post
                    </button>
                </div>
                <div>
                    <form action="/search" method="post">
                        @csrf
                        <input type="text" name="search" class="search" placeholder="Search">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPostModalLabel">Add Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/addpost" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="body" class="form-label">Text</label>
                                    <textarea class="form-control" id="body" name="text" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label lass="form-label">Image</label>
                                    <input type="file" class="form-control" id="title" name="img" required>
                                </div>
                                <div class="mb-3">
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



        </section>

        <!-- Code for Showing the Status -->
        <main>
            <div class="col-9">


                <!-- Code for viewing the Post -->
                @foreach($posts as $post)
                <div class=" card ">
                    <div class="top">
                        <div class="userDetails">
                            <div class="profilepic">
                                <div class="profile_img">
                                    <div class="image">
                                        <img src="https://animotaku.fr/wp-content/uploads/2021/09/anime-baki-son-of-ogre-trailer.jpeg"
                                            alt="img8">
                                    </div>
                                </div>
                            </div>
                            <h3>{{$post->users->fullname}}
                            </h3>
                        </div>
                        @if($post->user_id == auth()->user()->id )
                        <div class="dropdown">
                            <button class="bg-transparent border-0" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span class="dot">
                                    <i class="fas fa-ellipsis-h"></i>
                                </span>
                            </button>
                            <ul class="dropdown-menu" style="background-color:#303030">
                                <li>
                                    <a href="/edit/{{ $post->id }}" class="editPost dropdown-item text-primary">edit</a>
                                </li>
                                <li>
                                    <form method="POST" action="/deletepost/{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button id="deletebtn" type="submit">Delete Post</button>
                                    </form>


                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <span>
                        <p>{{$post->text}}</p>
                    </span>
                    <div class="imgBx">
                        <img src="{{asset('storage/'.$post->img)}}" alt="post-1" class="cover">
                    </div>
                    <div class="bottom">
                        <div class="actionBtns">
                            <div class="left">
                                <span class="heart"">
                                    <span>
                                    
                                    @if($post->likes->contains('user_id', auth()->id()))
                                    
                                    <form method=" POST" action="/dislike/{{ $post->id }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-thumbs-down"></i>
                                    </button>
                                    </form>

                                    @else
                                    <form method="POST" action="/like/{{ $post->id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"><i
                                                class="far fa-thumbs-up"></i></button>
                                    </form>
                                    @endif


                                </span>
                                </span>
                            </div>

                        </div>
                        <a href="#">
                            <p class="likes">{{ $post->likes->count() }} likes </p>
                            @foreach($post->categories as $cat)
                            <span class="">{{$cat->name_category}}</span>
                            @endforeach
                        </a>
                        <a href="{{url('/comments/'.$post->id)}}">
                            <h4 class="comments">View comments</h4>
                        </a>

                        <div class="addComments">

                            <form action="{{url('/addcomment/'.$post->id)}}" method="post">
                                @csrf
                                <input type="text" name="text" class="text" placeholder="Add a comment...">
                                <button class="btn btn-dark" type="submit">Post</button>
                            </form>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>




            </div>
        </main>


        <!-- footer -->
        <footer class="text-center text-white" style="background-color: #A2AEAC">
            <!-- Grid container -->
            <div class="container">
                <!-- Section: Links -->
                <section class="mt-5">

                </section>

                <hr class="my-5" />

                <section class="mb-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                distinctio earum repellat quaerat voluptatibus placeat nam,
                                commodi optio pariatur est quia magnam eum harum corrupti
                                dicta, aliquam sequi voluptate quas.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="text-center mb-5">
                    <a href="" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-github"></i>
                    </a>
                </section>
                <!-- Section: Social -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MillionDollars</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <script src="script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </body>

    </html>