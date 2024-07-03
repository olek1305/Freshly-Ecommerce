<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <title>One Shop || e-Commerce HTML Template</title>
        <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.nice-number.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.calendar.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/add_row_custon.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/mobile_menu.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.exzoom.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/multiple-image-video.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/ranger_style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.classycountdown.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/venobox.min.css')}}">
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}">
        <!-- <link rel="stylesheet" href="css/rtl.css"> -->
    </head>

    <body>
        <!--=============================
          DASHBOARD MENU START
        ==============================-->
        <div class="wsus__dashboard_menu">
            <div class="wsusd__dashboard_user">
                <img src="{{asset('frontend/assets/images/dashboard_user.jpg')}}" alt="img" class="img-fluid">
                <p>anik roy</p>
            </div>
        </div>
        <!--=============================
          DASHBOARD MENU END
        ==============================-->


        <!--=============================
          DASHBOARD START
        ==============================-->
        @yield('content')
        <!--=============================
          DASHBOARD START
        ==============================-->


        <!--============================
            SCROLL BUTTON START
          ==============================-->
        <div class="wsus__scroll_btn">
            <i class="fas fa-chevron-up"></i>
        </div>
        <!--============================
          SCROLL BUTTON  END
        ==============================-->


        <!--jquery library js-->
        <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
        <!--bootstrap js-->
        <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!--font-awesome js-->
        <script src="{{ asset('frontend/assets/js/Font-Awesome.js')}}"></script>
        <!--select2 js-->
        <script src="{{ asset('frontend/assets/js/select2.min.js')}}"></script>
        <!--slick slider js-->
        <script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
        <!--simplyCountdown js-->
        <script src="{{ asset('frontend/assets/js/simplyCountdown.js')}}"></script>
        <!--product zoomer js-->
        <script src="{{ asset('frontend/assets/js/jquery.exzoom.js')}}"></script>
        <!--nice-number js-->
        <script src="{{ asset('frontend/assets/js/jquery.nice-number.min.js')}}"></script>
        <!--counter js-->
        <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.countup.min.js')}}"></script>
        <!--add row js-->
        <script src="{{ asset('frontend/assets/js/add_row_custon.js')}}"></script>
        <!--multiple-image-video js-->
        <script src="{{ asset('frontend/assets/js/multiple-image-video.js')}}"></script>
        <!--sticky sidebar js-->
        <script src="{{ asset('frontend/assets/js/sticky_sidebar.js')}}"></script>
        <!--price ranger js-->
        <script src="{{ asset('frontend/assets/js/ranger_jquery-ui.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/ranger_slider.js')}}"></script>
        <!--isotope js-->
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <!--venobox js-->
        <script src="{{ asset('frontend/assets/js/venobox.min.js')}}"></script>
        <!--classycountdown js-->
        <script src="{{ asset('frontend/assets/js/jquery.classycountdown.js')}}"></script>
        <!--summernote js-->
        <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
        <!--dataTables js-->
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
        <!--moment js-->
        <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
        <!--date picker js-->
        <script src="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!--sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!--main/custom js-->
        <script src="{{ asset('frontend/assets/js/main.js')}}"></script>

        <!-- flash alert -->
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    @php
                        flash()->addError($error);
                    @endphp
                @endforeach
            @endif
        </script>

        <!-- Dynamic delete alert -->
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('body').on('click', '.delete-item', function(event) {
                    event.preventDefault();

                    let deleteUrl = $(this).attr('href');

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                type: 'DELETE',
                                url: deleteUrl,

                                success: function(data) {
                                    if(data.status === 'success') {
                                        Swal.fire(
                                            'Deleted!',
                                            data.message,
                                            'success'
                                        )
                                        setTimeout(function() {
                                            window.location.reload();
                                        }, 1000); // 5000 ms = 5 seconds
                                    } else if (data.status === 'error') {
                                        Swal.fire(
                                            'Cant Delete',
                                            data.message,
                                            'error'
                                        )
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(error);
                                }
                            })
                        }
                    });
                })
            })
        </script>

        <script>
            <!-- summernote -->
            $('.summernote').summernote({
                height: 300,
                minHeight: 200,
                maxHeight: 400,
            });

            <!--date picker js-->
            $('.datepicker').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                singleDatePicker: true
            });
        </script>

        @stack('scripts')
    </body>
</html>
