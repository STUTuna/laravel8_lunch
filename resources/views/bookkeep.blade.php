@extends('layouts.dashboard')
@section('title',"記帳主程式")
@section('content.name',"記帳主程式")
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="row card-title" style="font-size:2em;font-family:微軟正黑體">
                    我們ㄉ錢
                    </h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>姓名</th>
                                <th>目前餘額</th>
                                <th>扣款</th>
                                <th>儲值</th>
                                <th>備註</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->deposit }}</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" value="0">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" value="0">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Enter ..."></textarea>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>總餘額</td>
                                <td>目前餘額</td>
                                <td></td>
                                <td></td>
                                <td class="text-right">
                                    <a class="btn btn-app bg-success">
                                        <i class="fas fa-save"></i> 儲存
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    </div>

@endsection
