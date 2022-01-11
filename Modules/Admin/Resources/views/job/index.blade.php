@extends('admin::layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">Quản lý tin tuyển dụng</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Danh sách</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <div class="p-2">
                        <form action="" class="form-inline">
                            <input type="text" class="form-control" placeholder="Tiêu đề công việc" name="n" value="{{ Request::get('n') }}">
                            <button type="submit" class="btn btn-success" style="margin-left: 5px">Tìm kiếm</button>
                        </form>
                    </div>
                    <table class="table mb-0" style="font-size: 12px">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0" style="text-align: left">Tiêu đề</th>
                            <th scope="col" class="border-0">Tên ngành nghề</th>
                            <th scope="col" class="border-0">Trạng thái</th>
                            <th scope="col" class="border-0">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td style="text-align: left">
                                    <a href="">{{ $item->j_name }}</a>
                                </td>
                                <td>{{ $item->career->c_name ?? "[N\A]" }}</td>
                                <td>
                                    <span class=" {{ $item->getStatus($item->j_status)['class-text'] }}">{{ $item->getStatus($item->j_status)['name'] }}</span>
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('get_admin.job.update', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ route('get_admin.job.delete', $item->id) }}"  class="btn btn-outline-primary btn-sm deletebutton">
                                        <i class="material-icons">restore_from_trash</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $jobs->links() !!}
            </div>
        </div>
    </div>

@stop
