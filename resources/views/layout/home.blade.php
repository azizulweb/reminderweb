<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reminder Web</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/images/web.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/style1.css')}}" rel="stylesheet" />
        <!-- fonts googleapis-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-head">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">Reminder<span>Web</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="#link">About</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-head py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Welcome to Myreminder create and arrange your agenda here</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-dark btn-lg px-4 me-sm-3" href="#link">Get Started</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="{{asset('images/formal.jpg')}}" alt="..." /></div>
                    </div>
                </div>
            </header>
            
            <!-- Blog preview section-->
            <section class="py-5" id="link">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-5 justify-content-center">
                        <aside class="bg-head bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                                <div class="mb-4 mb-xl-0">
                                    <div class="fs-3 fw-bold text-white">Take control of your activity schedule with MyReminder.</div>
                                    <div class="text-white-50">Lorem ipsum dolor sit amet.</div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="container px-5 my-5 bg-gradient rounded-3 bg-head">
                        <div class="row gx-5">
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{asset('assets/images/teamwork.jpg')}}" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Hari ini</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Nama Agenda</h5></a>
                                        <p class="card-text mb-0">Jelaskan Deskripsi Singkat Agenda.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div>
                                                    <div class="text-danger">March 12, 2023 &middot; 6 min read</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{asset('assets/images/yogya.jpg')}}" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-danger bg-gradient rounded-pill mb-2">1 hari lagi</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Nama Agenda</h5></a>
                                        <p class="card-text mb-0">Jelaskan Deskripsi Singkat Agenda.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div>
                                                    <div class="text-danger">March 12, 2023 &middot; 6 min read</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{asset('assets/images/laboratorium.jpg')}}" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-danger bg-gradient rounded-pill mb-2">2 hari lagi</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Nama Agenda</h5></a>
                                        <p class="card-text mb-0">Jelaskan Deskripsi Singkat Agenda.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div>
                                                    <div class="text-danger">March 12, 2023 &middot; 6 min read</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{asset('assets/images/bali.jpg')}}" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-danger bg-gradient rounded-pill mb-2">3 hari lagi</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Nama Agenda</h5></a>
                                        <p class="card-text mb-0">Jelaskan Deskripsi Singkat Agenda.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div>
                                                    <div class="text-danger">March 12, 2023 &middot; 6 min read</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{asset('assets/images/kunjunganIndustri.jpg')}}" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-warning bg-gradient rounded-pill mb-2">1 hari yang lalu</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Nama Agenda</h5></a>
                                        <p class="card-text mb-0">Jelaskan Deskripsi Singkat Agenda.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div>
                                                    <div class="text-danger">March 12, 2023 &middot; 6 min read</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{asset('assets/images/museum.jpg')}}" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-warning bg-gradient rounded-pill mb-2">2 hari yang lalu</div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Nama Agenda</h5></a>
                                        <p class="card-text mb-0">Jelaskan Deskripsi Singkat Agenda.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div>
                                                    <div class="text-danger">March 12, 2023 &middot; 6 min read</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-head py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row navbar-brand">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Reminder Web 2024</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/home.js')}}"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </body>
</html>
