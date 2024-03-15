@extends('layouts.master')

@section('css')
<!-- Table css -->
<link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Jurusan</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Jurusan</a></li>

    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add</a>
@endsection

@section('content')
@include('includes.flash')

<!--Show Validation Errors here-->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!--End showing Validation Errors here-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th data-priority="1">No</th>
                                    <th data-priority="2">Nama</th>
                                    <th data-priority="3">Nama BK</th>
                                    <th data-priority="4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $jurusan)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $jurusan->nama }} </td>
                                    <td> {{ $jurusan->user->name }} </td>
                                    <td>
                                        <a href="#editJurusan{{ $jurusan->id }}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat">
                                            <i class='fa fa-edit'></i> Edit
                                        </a>
                                        <a href="#deleteJurusan{{ $jurusan->id }}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat">
                                            <i class='fa fa-trash'></i> Delete
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Your table code goes here -->

@foreach ($data as $jurusan)
@include('includes.edit_delete_jurusan', ['jurusan' => $jurusan])
@endforeach

@include('includes.add_jurusan')

@endsection


@section('script')
<!-- Responsive-table-->
<script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
@endsection

@section('script')
<script>
    $(function() {
        $('.table-responsive').responsiveTable({
            addDisplayAllBtn: 'btn btn-secondary'
        });
    });
</script>
@endsection