@extends('admin.layouts.master')

@section('content')

    <p>
        {!! Form::open(['style' => 'display: inline-block;', 'method' => 'POST', 'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.system-are_you_sure') . '\');',  'route' => ['system.execute', 'all']]) !!}
        {!! Form::submit(trans('quickadmin::admin.system-cache_flush-all'), ['class' => 'btn btn-xs btn-danger']) !!}
        {!! Form::close() !!}
    </p>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::admin.system-management') }}</div>
        </div>
        <div class="portlet-body">
            <table id="datatable" class="table table-striped table-hover table-responsive datatable">
                <thead>
                <tr>
                    <th>{{ trans('quickadmin::admin.system-tile') }}</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cacheConfig as $operation => $title)
                    <tr>
                        <td>{{ $title }}</td>
                        <td>
                            {!! Form::open(['style' => 'display: inline-block;', 'method' => 'POST', 'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.system-are_you_sure') . '\');',  'route' => ['system.execute', $operation]]) !!}
                            {!! Form::submit(trans('quickadmin::admin.system-execute'), ['class' => 'btn btn-xs btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

