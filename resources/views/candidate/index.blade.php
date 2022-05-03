@extends('layouts.admin.admin')

@section('page-specific-styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/TableTools.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}"/>
@endsection

@section('title', 'Candidate List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                <header class="text-capitalize pt-1">Candidate Lists</header>

                <div class="tools ml-auto">
                    <a class="btn btn-primary ink-reaction btn-sm" href="{{ route('candidate.create') }}">
                        <i class="md md-add"></i>
                        Add
                    </a>
                </div>
            </div>
            <div class="card mt-2 p-4">
                @if(Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success ml-auto">
                    {{Illuminate\Support\Facades\Session::get('success')}}
                </div>
                @endif
                <table id="datatable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Nationality</th>
                        <th>DOB</th>
                        <th>Education</th>
                        <th>Prefered Mode of Contact</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Nationality</th>
                            <th>DOB</th>
                            <th>Education</th>
                            <th>Prefered Mode of Contact</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('page-specific-scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#datatable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" style="width: 100%;" placeholder="Search ' + title + '" />');
            });
            var table = $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": '{{ route('candidate.data') }}',
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print',
                //     // exportOptions: {
                //     //     columns: 'th:not(:last-child)'
                //     // }
                // ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export Search Results',
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                            columns: 'th:not(:first-child)'
                        }
                    }
                ],
                "columns": [
                    { "data": "id",  'visible': false },
                    { "data": "DT_RowIndex",  orderable: false, searchable: false },
                    { "data": "firstname" },
                    { "data": "email" },
                    { "data": "gender" },
                    { "data": "phone" },
                    { "data": "address" },
                    { "data": "nationality" },
                    { "data": "dob" },
                    { "data": "education" },
                    { "data": "mode_of_contact" },
                ],
                order: [ [0, 'desc'] ]
            });

            table.columns().every( function() {
                var that = this;

                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        } );
    </script>
@endsection


