<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="stylesheet" href="/assets/fonts/css24b9.css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min2167.css?v=3.2.0">

    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>



    <link rel="stylesheet" href="/assets/icons/ionicons.min.css" />

    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />

    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />

    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css" />

    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />

    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css" />

    @livewireStyles
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('layouts.partials._header')
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('layouts.partials._sidemenu')
        </aside>

        <div class="content-wrapper">
            @include('layouts.partials._page_header')

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            {{ $slot }}
                            {{-- @yield('content') --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            @include('layouts.partials._footer')
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('success') }}
            </div>
        @endif

    </div>


    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>

    <script src="/assets/dist/js/adminlte.min2167.js?v=3.2.0"></script>

    {{-- <script src="/assets/dist/js/demo.js"></script> --}}

    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="/assets/plugins/toastr/toastr.min.js"></script>

    <script src="/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/plugins/chart.js/Chart.min.js"></script>

    <script src="/assets/plugins/sparklines/sparkline.js"></script>

    <script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="/assets/dist/js/adminlte2167.js?v=3.2.0"></script>

    <script src="/assets/dist/js/pages/dashboard.js"></script>

    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultInfo').click(function() {
                Toast.fire({
                    icon: 'info',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultWarning').click(function() {
                Toast.fire({
                    icon: 'warning',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultQuestion').click(function() {
                Toast.fire({
                    icon: 'question',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });

            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultInfo').click(function() {
                toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').click(function() {
                toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').click(function() {
                toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });

            $('.toastsDefaultDefault').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultTopLeft').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'topLeft',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultBottomRight').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'bottomRight',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultBottomLeft').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'bottomLeft',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultAutohide').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    autohide: true,
                    delay: 750,
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultNotFixed').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    fixed: false,
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultFull').click(function() {
                $(document).Toasts('create', {
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    icon: 'fas fa-envelope fa-lg',
                })
            });
            $('.toastsDefaultFullImage').click(function() {
                $(document).Toasts('create', {
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    image: '/assets/dist/img/user3-128x128.jpg',
                    imageAlt: 'User Picture',
                })
            });
            $('.toastsDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultInfo').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-info',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultWarning').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultDanger').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultMaroon').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-maroon',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    </script>
    @livewireScripts
    @stack('scripts')

    {{-- <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["Add", "copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script> --}}
</body>

</html>
