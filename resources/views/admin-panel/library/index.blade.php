@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <div class="card-title-left">
                        <h2 class="">Library</h2>
                    </div>
                    <a href="{{ route('library.create') }}" class="btn btn-outline-primary"> <i class="feather icon-plus"></i> Add
                        new</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="library-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
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
            table = $('#library-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('library.types') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                
                {
                    data: 'image',
                    name: 'image'
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
                    var url = "{{ route('library.destroy', '*') }}";
                    url = url.replace('*', data.id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (response) {
                        toastr.success("Library Deleted Successfully");
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