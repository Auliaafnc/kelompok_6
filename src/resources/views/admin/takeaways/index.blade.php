@extends('layouts.admin')
@section('content')
@can('takeaway_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.takeaways.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.takeaway.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.takeaway.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Takeaway ">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.waktu_takeaway') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.product_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.keterangan_tambahan') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.pembayaran') }}
                        </th>
                        <th>
                            {{ trans('cruds.takeaway.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($takeaways as $key => $takeaway)
                        <tr data-entry-id="{{ $takeaway->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $takeaway->id ?? '' }}
                            </td>
                            <td>
                                {{ $takeaway->name ?? '' }}
                            </td>
                            <td>
                                {{ $takeaway->phone ?? '' }}
                            </td>
                            <td>
                                {{ $takeaway->waktu_takeaway ?? '' }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($takeaway->products as $product)
                                        <li>{{ $product->name }} - {{ $product->pivot->quantity }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $takeaway->keterangan_tambahan ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Takeaway::PEMBAYARAN_SELECT[$takeaway->pembayaran] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Takeaway::STATUS_SELECT[$takeaway->status] ?? '' }}
                            </td>
                            <td>
                                @can('takeaway_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.takeaways.show', $takeaway->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('takeaway_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.takeaways.edit', $takeaway->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('takeaway_delete')
                                    <form action="{{ route('admin.takeaways.destroy', $takeaway->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('takeaway_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.takeaways.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-Takeaway:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
