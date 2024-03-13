@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Students</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
  
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
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                                                    <thead>
                                                        <tr>
                                                            <th>Student ID</th>
                                                            <th>Nama</th>
                                                            <th>RFID</th>
                                                            <th>Kelamin</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data as $siswa)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $siswa->nama }}</td>
                                                            <td>{{ $siswa->rfid }}</td>
                                                            <td>{{ $siswa->kelamin }}</td>
                                                            <td>
                                                                <a href="#editSiswa{{ $siswa->id }}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class="fa fa-edit"></i> Edit</a>
                                                                <a href="#deleteSiswa{{ $siswa->id }}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class="fa fa-trash"></i> Delete</a>
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
                                    

@foreach( $data as $siswa)
@include('includes.edit_delete_siswa')
@endforeach

@include('includes.add_siswa')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection