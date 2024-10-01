@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <div class="card-title-left">
                        <h2 class="">Our Teams</h2>
                    </div>
                    <a href="{{ route('our.teams.create') }}" class="btn btn-outline-primary"> <i class="feather icon-plus"></i> Add
                        new</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="our-teams-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Category</th>
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
            table = $('#our-teams-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('our.teams') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                
                {
                    data: 'image',
                    name: 'image'
                },
                
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'designation',
                    name: 'designation'
                },
                {
                    data: 'category',
                    name: 'category'
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
                    var url = "{{ route('our.teams.destroy', '*') }}";
                    url = url.replace('*', data.id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (response) {
                        toastr.success("Our Team Deleted Successfully");
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