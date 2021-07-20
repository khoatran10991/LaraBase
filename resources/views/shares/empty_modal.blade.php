<div class="card shadow">
    <div class="card-header">
        <strong class="text-primary">
            {{ $name ?? '' }}
        </strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="btn float-right p-0"><i class="fa fa-times-circle"></i></button>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        {{ __('common.no_info') }}
    </div>
    <div class="card-footer clearfix">
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('common.close') }}</button>
        </div>
    </div>
</div>