@extends('layouts.dashboard')

@section('include.css')
    <!-- DataTables -->
    <link rel="stylesheet" href=" {{ asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href=" {{ asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title',"工作設備表")
@section('content.name',"工作設備表")
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="row card-title" style="font-size:2em;font-family:微軟正黑體,serif">
                        工作設備表
                    </h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped text-nowrap" id="deposit_log_table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>姓名</th>
                            <th>目前餘額</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td  class="{{ $user->deposit < 0 ?'bg-danger':'bg-success' }}">{{ $user->deposit }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
@section('include.js')

@endsection
