@extends('admin-panel.layout.master')
@section('custom-css')
<style>
    #article-tbody tr td:last-child {
        width: 9% !important;
    }
    #article-tbody tr td:last-child {
        width: 20% !important;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <div class="card-title-left">
                        <h2 class="">Gallery Highlights</h2>
                    </div>
                    <div class="btn-grp">
                        <a href="{{  route('library.types') }}" class="btn btn-outline-danger"> <i class="zmdi zmdi-arrow-left"></i> Go Back
                             </a>
                    <a href="{{ route('highlights.create',['id'=>$id]) }}" class="btn btn-outline-primary"> <i class="feather icon-plus"></i> Add
                        new</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="highlights-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>Day</th>
                                    <th>Heading</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="article-tbody">
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
            let id = '{{ $id }}';
            table = $('#highlights-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('highlights.index',['id' => ':id']) }}".replace(':id', id),
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                
                {
                    data: 'images',
                    name: 'images'
                },
                {
                    data: 'day',
                    name: 'day'
                },
                {
                    data: 'heading',
                    name: 'heading'
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
                    var url = "{{ route('highlights.destroy', '*') }}";
                    url = url.replace('*', data.id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (response) {
                        toastr.success("Report Deleted Successfully");
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