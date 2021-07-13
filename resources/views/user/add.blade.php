{!! Form::open(['url' => route('admin.manager.addManager'),'method'=>'post']) !!}
@csrf
<div class="card shadow">
    <div class="card-header">
        <strong>Thêm quản lý</strong>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="form-group">
            <label for="UserName">Tên đăng nhập<span class="required"></span></label>
            {{ Form::text('UserName',request('UserName'),['class' => 'form-control','id' => 'UserName', 'required' => true,'placeholder' => 'Vui lòng nhập tên đăng nhập hệ thống...'])  }}
        </div>
        <div class="form-group">
            <label for="Email">Email<span class="required"></span></label>
            {{ Form::email('Email',request('UserName'),['class' => 'form-control','id' => 'Email', 'required' => true,'placeholder' => 'Vui lòng nhập Email...'])  }}
        </div>
        <div class="form-group">
            <label for="Password">Mật khẩu<span class="required"></span></label>
            {{ Form::password('Password',['class' => 'form-control','id' => 'Password', 'required' => true,'placeholder' => 'Vui lòng nhập mật khẩu...'])  }}
        </div>
        <div class="form-group">
            <label for="RePassword">Nhập lại mật khẩu<span class="required"></span></label>
            {{ Form::password('RePassword',['class' => 'form-control','id' => 'RePassword', 'required' => true,'placeholder' => 'Vui lòng nhập lại mật khẩu...'])  }}
        </div>
        <div class="form-group">
            <label for="Scope">Phân nhóm quản trị</label>
            {{ Form::select('Scope',['admin' => 'Administrator', 'mod' => 'Moderator'],request('Scope','admin'),['class' => 'form-control','id' => 'Scope'])  }}
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <div class="custom-control custom-radio">
                {{ Form::radio('IsActive', 1, request('IsActive',true),['class' => 'custom-control-input','id' => 'statusActive'])  }}
                <label class="custom-control-label" for="statusActive">Hoạt động</label>
            </div>
            <div class="custom-control custom-radio">
                {{ Form::radio('IsActive', 0, request('IsActive'),['class' => 'custom-control-input','id' => 'statusInActive'])  }}
                <label class="custom-control-label" for="statusInActive">Không hoạt động</label>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
</div>
{!! Form::close() !!}