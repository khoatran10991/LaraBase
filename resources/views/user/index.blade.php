@extends('layouts.layout')
@section('title')
    {{ __('user.manage') }}
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('user.manage') }}</h1>
        <a  data-toggle="modal" data-target="#ajaxModal" href="{{ route('user.addView')  }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> {{ __('user.add') }}</a>
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
                                <th scope="col">{{ __('user.id') }}</th>
                                <th scope="col">{{ __('user.user_name') }}</th>
                                <th scope="col">{{ __('user.email') }}</th>
                                <th scope="col">{{ __('user.scope') }}</th>
                                <th scope="col">{{ __('common.status') }}</th>
                                <th scope="col" class="action-table">{{ __('common.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($users) && !empty($users))
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->UserId }}</td>
                                            <td><a data-toggle="modal" data-target="#ajaxModal" href="{{ route('user.editView',['id' => $user->UserId])  }}" >{{ $user->UserName  }}</td>
                                            <td><a data-toggle="modal" data-target="#ajaxModal" href="{{ route('user.editView',['id' => $user->UserId])  }}" >{{ $user->Email  }}</td>
                                            <td>{{ $user->Scope }}</td>
                                            <td>
                                                @if($user->IsActive)
                                                    <a class="btn btn-success btn-xs" href="#" role="button">{{ __('common.active') }}</a>
                                                @else
                                                    <a class="btn btn-secondary btn-xs" href="#" role="button">{{ __('common.in_active') }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ajaxModal" class="btn btn-primary btn-sm" href="{{ route('user.editView',['id' => $user->UserId])  }}" role="button">{{ __('common.edit') }}</a>
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
        <div class="modal fade" id="ajaxModal" aria-labelledby="ajaxModal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
    </div>
@endsection
@section('js')
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
                $("#" + $(this).attr("id") + " .modal-content").append('{{ __('common.loading') }}');
            });
        });
    </script>
@endsection