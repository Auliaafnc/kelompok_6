@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fasilitas.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fasilitas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fasilitas.fields.id') }}
                        </th>
                        <td>
                            {{ $fasilitas->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fasilitas.fields.name') }}
                        </th>
                        <td>
                            {{ $fasilitas->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fasilitas.fields.image') }}
                        </th>
                        <td>
                            @if($fasilitas->image)
                                <a href="{{ $fasilitas->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $fasilitas->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fasilitas.fields.detail') }}
                        </th>
                        <td>
                            {{ $fasilitas->detail }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fasilitas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection