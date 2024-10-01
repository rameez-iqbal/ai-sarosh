@extends('admin-panel.layout.master')
@section('custom-css')
<style>
    #article-tbody tr td:last-child {
        width: 9% !important;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <div class="card-title-left">
                        <h2 class="">Articles</h2>
                    </div>
                    <div class="btn-grp">
                        <a href="{{  route('library.types') }}" class="btn btn-outline-danger"> <i class="zmdi zmdi-arrow-left"></i> Go Back
                             </a>
                        <a href="{{ route('article.create',['type'=>$type]) }}" class="btn btn-outline-primary"> <i class="feather icon-plus"></i> Add
                            new</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="articles-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th style="width: 20%">Title</th>
                                    <th style="width: 20%">Sub Title</th>
                                    <th style="width: 20%">Redirect Url</th>
                                    <th>Category</th>
                                    <th>Webinar Date</th>
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
            table = $('#articles-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('webinar',['type'=>'articles']) }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'sub_title',
                    name: 'sub_title'
                },
                {
                    data: 'url',
                    name: 'url'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'article_date',
                    name: 'article_date'
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
                    var url = "{{ route('article.destroy', '*') }}";
                    url = url.replace('*', data.id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (response) {
                        toastr.success("Article Deleted Successfully");
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