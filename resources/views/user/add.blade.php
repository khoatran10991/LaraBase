{!! Form::open(['url' => route('user.add'),'method'=>'post']) !!}
@csrf
<div class="card shadow">
    <div class="card-header">
        <strong class="text-primary">{{ __('user.add') }}</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn float-right p-0"><i class="fa fa-times-circle"></i></button>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="form-group">
            <label for="UserName">{{ __('user.user_name') }}<span class="required"></span></label>
            {{ Form::text('UserName',request('UserName'),['class' => 'form-control','id' => 'UserName', 'required' => true,'placeholder' =>  __('user.placeholder.user_name')])  }}
        </div>
        <div class="form-group">
            <label for="Email">{{ __('user.email') }}<span class="required"></span></label>
            {{ Form::email('Email',request('Email'),['class' => 'form-control','id' => 'Email', 'required' => true,'placeholder' => __('user.placeholder.email')])  }}
        </div>
        <div class="form-group">
            <label for="Password">{{ __('user.password') }}<span class="required"></span></label>
            {{ Form::password('Password',['class' => 'form-control','id' => 'Password', 'required' => true,'placeholder' => __('user.placeholder.password')])  }}
        </div>
        <div class="form-group">
            <label for="RePassword">{{ __('user.confirm_password') }}<span class="required"></span></label>
            {{ Form::password('RePassword',['class' => 'form-control','id' => 'RePassword', 'required' => true,'placeholder' => __('user.placeholder.confirm_password')])  }}
        </div>
        <div class="form-group">
            <label for="Scope">{{ __('user.scope') }}</label>
            {{ Form::select('Scope',$scopes,request('Scope',config('constants.user.scope.user')),['class' => 'form-control','id' => 'Scope'])  }}
        </div>
        <div class="form-group">
            <label>{{ __('common.status') }}</label>
            <div class="custom-control custom-radio">
                {{ Form::radio('IsActive', 1, request('IsActive',true),['class' => 'custom-control-input','id' => 'statusActive'])  }}
                <label class="custom-control-label" for="statusActive">{{ __('common.active') }}</label>
            </div>
            <div class="custom-control custom-radio">
                {{ Form::radio('IsActive', 0, request('IsActive'),['class' => 'custom-control-input','id' => 'statusInActive'])  }}
                <label class="custom-control-label" for="statusInActive">{{ __('common.in_active') }}</label>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('common.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('common.add') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}