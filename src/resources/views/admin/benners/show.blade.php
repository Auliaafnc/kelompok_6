@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.benner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.benners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.benner.fields.id') }}
                        </th>
                        <td>
                            {{ $benner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benner.fields.title') }}
                        </th>
                        <td>
                            {{ $benner->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benner.fields.description') }}
                        </th>
                        <td>
                            {{ $benner->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benner.fields.image') }}
                        </th>
                        <td>
                            @if($benner->image)
                                <a href="{{ $benner->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $benner->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.benners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection