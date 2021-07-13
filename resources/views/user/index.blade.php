@extends('packages/permission::layouts.master')
@section('title')
    Quản lý thành viên
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý hệ thống</h1>
        <a  data-toggle="modal" data-target="#ajaxModal" href="{{ route('admin.manager.add')  }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Thêm người quản lý</a>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th scope="col">ManagerId</th>
                                <th scope="col">Tên truy cập</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nhóm quyền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col" class="action-table">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($managers) && !empty($managers))
                                    @foreach($managers as $manager)
                                        <tr>
                                            <td>{{ $manager->ManagerId }}</td>
                                            <td><a data-toggle="modal" data-target="#ajaxModal" href="{{ route('admin.manager.edit',['managerId' => $manager->ManagerId])  }}" >{{ $manager->UserName  }}</td>
                                            <td><a data-toggle="modal" data-target="#ajaxModal" href="{{ route('admin.manager.edit',['managerId' => $manager->ManagerId])  }}" >{{ $manager->Email  }}</td>
                                            <td>{{ $manager->Scope }}</td>
                                            <td>
                                                @if($manager->IsActive)
                                                    <a class="btn btn-success btn-xs" href="#" role="button">Đang hoạt động</a>
                                                @else
                                                    <a class="btn btn-secondary btn-xs" href="#" role="button">Đã khóa</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ajaxModal" class="btn btn-primary btn-sm" href="{{ route('admin.manager.edit',['managerId' => $manager->ManagerId])  }}" role="button">Chỉnh sửa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- remote modals -->
    <div id="permission-modals">
        <div class="modal fade" id="ajaxModal" aria-labelledby="ajaxModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
    </div>
@endsection
@section('jquery')
    <script>
        $('#ajaxModal').on('show.bs.modal', function (e) {
            var loadurl = $(e.relatedTarget).attr('href');
            $(this).find('.modal-content').load(loadurl);
        });
        $('#ajaxModal').on('loaded.bs.modal', function (e) {
            $('#ajaxModal').removeData();
        });

        $(document).ready(function(){
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });

        $(document).ready(function(){
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
                $("#" + $(this).attr("id") + " .modal-content").empty();
                $("#" + $(this).attr("id") + " .modal-content").append("Đang tải nội dung...");
            });
        });
    </script>
@endsection