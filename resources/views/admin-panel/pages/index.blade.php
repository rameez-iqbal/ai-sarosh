@extends('admin-panel.layout.master')
@section('custom-css')
<style>
    table tr td:last-child {
        /* text-align: center; */
        display: flex;
        justify-content: center;
        column-gap: 8px;
    }
    .table-striped>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg:none !important;
    }
</style>
@endsection

@section('content')
    <div class="row">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Success !</strong> {{ session('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Error !</strong> {{ session('error') }}
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <div class="card-title-left">
                        <h2 class="">Sections</h2>
                    </div>
                    <a href="{{ route('page.create') }}" class="btn btn-outline-primary"> <i class="feather icon-plus"></i> Add
                        new</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pages-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>Heading</th>
                                    <th>Page</th>
                                    <th>Slug</th>
                                    <th>Type</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        var table = null;
        $(document).ready(function(){
            table = $('#pages-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pages') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'heading',
                    name: 'heading'
                },
                {
                    data: 'name',
                    name: 'title',
                    render: function(data, type, row) {
                        return data ? data : '--';
                    }
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
          });

            $("body").on("click", ".delete", function (e) {
                if(confirm("Are you sure want to delete ? ")) {
                    e.preventDefault();
                    var data = table.row($(this).parents('tr')).data();
                    var url = "{{ route('page.delete', '*') }}";
                    url = url.replace('*', data.id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (response) {
                        toastr.success("Page Deleted Successfully");
                            table.ajax.reload(null, false);
                        },
                        error: function (err) {
                        toastr.error(err);

                        }
                    });
                }
            });

        });
 



    </script>
@endsection
