@extends('layouts.admin',['title' => 'Help Requests']) 
@section('content')

<div class="row md:flex mb-1c">
    <div class="md:flex-1  py-2 align-middle">

        <div aria-label="Breadcrumb" role="navigation" class="el-breadcrumb"><span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/') }}">Dashboard</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>

            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner">Help Requests</span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>


        </div>

    </div>
    <div class="md:flex-1 px-2 md:flex md:justify-end"><a href="{{ url('admin/requests/processed') }}" class="el-button el-button--primary"><i class="el-icon-check"></i>
        Processed Requests</a></div>
</div>

<div class="bg-white p-4">
    <div id="no-more-tables">

        <table class="table table-striped table-bordered table-hover" id="tabledata">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone </th>
                    <th>Map</th>
                    <th>Created At</th>
                    <th width="200px;">Actions</th>
                </tr>

            </thead>

        </table>

    </div>
</div>
@endsection
 
@section('js')
<script>
    $(document).ready(function() {
  
     $('#tabledata').DataTable({
        processing: true,
        serverSide: true,
        'bAutoWidth': false, 
        'bServerSide': true,
        ajax: '{!! url('admin/data/requests') !!}',
        "columns": [
            {"data": "name"}, 
            {"data": "phone"}, 
            {"data": "map"}, 
            {"data": "created_at"}, 
            {"data": "actions", 'searchable': false}
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
            });
        }
    });

});

</script>














@stop