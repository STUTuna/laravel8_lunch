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
                                <th>金額</th>
                                <th>操作者</th>
                                <th>備註</th>
                                <th>時間點</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="{{ route('bookkeep.store') }}">
                                @csrf
                                @foreach ($depositLogs as $key => $depositLog)
                                    <tr>
                                        <td>{{ $depositLog->user->name }}</td>
                                        <td>{{ $depositLog->money }}</td>
                                        <td>{{ $depositLog->operator->name }}</td>
                                        <td>{{ $depositLog->remark }}</td>
                                        <td>{{ $depositLog->created_at }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="text-right">
                                        <button class="btn btn-app bg-success" type="submit">
                                            <i class="fas fa-save"></i> 儲存
                                        </button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    </div>

@endsection
