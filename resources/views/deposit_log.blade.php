@extends('layouts.dashboard')

@section('include.css')
    <!-- DataTables -->
    <link rel="stylesheet" href=" {{ asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href=" {{ asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title',"歷史紀錄")
@section('content.name',"歷史紀錄")
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="row card-title">
                        歷史紀錄
                    </h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="deposit_log_table">
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>金額</th>
                            <th>操作者</th>
                            <th>備註</th>
                            <th>操作時間</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($depositLogs as $key => $depositLog)
                            <tr class="{{  $depositLog->money<0 ? 'alert-danger ':'alert-success'}} ">
                                <td>{{ $depositLog->user->name }}</td>
                                <td>{{ $depositLog->money }}</td>
                                <td>{{ $depositLog->operator->name }}</td>
                                <td>{{ $depositLog->remark }}</td>
                                <td>{{ $depositLog->created_at }}</td>
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
    <!-- DataTables -->
    <script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $('#deposit_log_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "order": [[4, "desc"]],
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
