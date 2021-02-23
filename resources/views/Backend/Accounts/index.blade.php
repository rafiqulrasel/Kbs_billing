@extends('Backend.master')
@section("content")

    <div class="container w-full md:w-full xl:w-full  mx-auto px-2">
        <!--Title-->
        <h1 class="font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
           All Collections and Expences
        </h1>
        <a href="{{route('dashboard.accounts.create')}}" class="text-right"><button class="button text-white bg-theme-1 shadow-md mr-2 text-right">Add New Accounts</button></a>

        <!--Card-->
        <div id='recipients' class="mt-12 lg:mt-0 rounded shadow bg-white">
            <table id="example">
                <thead>
                {{success_message()}}
                {{error_message($errors)}}
                <tr>
                    <th data-priority="1">Id</th>
                    <th data-priority="2">Building Name</th>
                    <th class="text-center whitespace-no-wrap" data-priority="4" align="center">Action</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->
@endsection
@section('style')
    <!--Replace with your tailwind.css once created-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Button Extension Datatables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <style>
        /* Overrides to match the Tailwind CSS */

        .dataTables_wrapper {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem
        }

        table.dataTable.no-footer {
            border-bottom-width: 1px;
            border-color: #d2d6dc
        }

        table.dataTable tbody td, table.dataTable tbody th {
            padding: 0.75rem 1rem;
            border-bottom-width: 1px;
            border-color: #d2d6dc
        }

        div.dt-buttons {
            padding: 1rem 1rem 1rem 0;
            display: flex;
            align-items: center
        }

        .dataTables_filter, .dataTables_info {
            padding: 1rem
        }

        .dataTables_wrapper .dataTables_paginate {
            padding: 1rem
        }

        .dataTables_filter label input {
            padding: 0.5rem;
            border-width: 2px;
            border-radius: 0.5rem
        }

        .dataTables_filter label input:focus {
            box-shadow: 0 0 0 3px rgba(118, 169, 250, 0.45);
            outline: 0
        }

        table.dataTable thead tr {
            border-radius: 0.5rem
        }

        table.dataTable thead tr th:not(.text-center) {
            text-align: left
        }

        table.dataTable thead tr th {
            background-color: #edf2f7;
            border-bottom-width: 2px;
            border-top-width: 1px;
            border-color: #d2d6dc
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.next:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.previous:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button:not(.disabled), button.dt-button {
            transition-duration: 150ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #374151 !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.75rem;
            font-weight: 600;
            align-items: center;
            display: inline-flex;
            border-width: 1px !important;
            border-color: #d2d6dc !important;
            border-radius: 0.375rem;
            background: #ffffff;
            overflow: visible;
            margin-bottom: 0
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.next:focus:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.next:hover:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.previous:focus:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button:focus:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.disabled), button.dt-button:focus, button.dt-button:focus:not(.disabled), button.dt-button:hover, button.dt-button:hover:not(.disabled) {
            background-color: #edf2f7 !important;
            border-width: 1px !important;
            border-color: #d2d6dc !important;
            color: #374151 !important
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:not(.disabled) {
            background: #6875f5 !important;
            color: #ffffff !important;
            border-color: #8da2fb !important
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #8da2fb !important;
            color: #ffffff !important;
            border-color: #8da2fb !important
        }

        .dataTables_length select {
            padding: .25rem;
            border-radius: .25rem;
            background-color: #edf2f7;
        }

        .dataTables_length {
            padding-top: 1.25rem;
        }
    </style>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <!--Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>

    <script type="text/javascript">
        $(function () {

            var table = $('#example').DataTable({
                processing: true,
                serverSide: true,

                ajax: "{{ route('dashboard.building.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: true},
                ]
            });

        });
    </script>
<script>
    function deleteUser(package) {
        var id=package.getAttribute('data-pack');

        if (confirm('Delete this Building Name?')) {
            $.ajax({
                type: "DELETE",
                url: 'building/' + id, //resource
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}'
                },
                success: function(affectedRows) {
                    //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    console.log(affectedRows);
                    if (affectedRows > 0) window.location = "{{route('dashboard.building.index')}}";
                }
            });
        }
    }

</script>
@endsection
