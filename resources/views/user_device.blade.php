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
                <div class="card-header d-flex">
                    <h1 class="row card-title" style="font-size:2em;font-family:微軟正黑體,serif">
                        工作設備表
                    </h1>
{{--                    <button class="btn btn-success btn-lg ml-auto">增加設備</button>--}}
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped text-nowrap" id="deposit_log_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>姓名</th>
                                <th>目前設備</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->device }}</td>
                                <td>
                                    <button class="btn btn-warning text-white" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">設備類別</label>
                        </div>
                        <select class="custom-select" id="select_lang">
                            <option value="tw" selected="">請選擇...</option>
                            <option value="tw">顯卡</option>
                            <option value="mas">CPU</option>
                            <option value="mas">硬碟</option>
                            <option value="mas">螢幕</option>
                            <option value="mas">滑鼠</option>
                            <option value="mas">鍵盤</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">型號</label>
                        </div>
                        <input type="text" class="form-control" placeholder="型號" aria-label="型號">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">
                                BarCode
                                <i class="fas fa-barcode"></i>
                            </label>
                        </div>
                        <input type="text" class="form-control" placeholder="條碼" aria-label="條碼">
                    </div>
                    <button type="button" class="btn btn-success ">
                        <i class="fas fa-plus"></i>
                    </button>

                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('include.js')

@endsection
