@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.takeaway.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.takeaways.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.id') }}
                        </th>
                        <td>
                            {{ $takeaway->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.name') }}
                        </th>
                        <td>
                            {{ $takeaway->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.phone') }}
                        </th>
                        <td>
                            {{ $takeaway->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.menu') }}
                        </th>
                        <td>
                            {{ $takeaway->menu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.keterangan_tambahan') }}
                        </th>
                        <td>
                            {{ $takeaway->keterangan_tambahan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.pembayaran') }}
                        </th>
                        <td>
                            {{ App\Models\Takeaway::PEMBAYARAN_SELECT[$takeaway->pembayaran] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takeaway.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Takeaway::STATUS_SELECT[$takeaway->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.takeaways.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection