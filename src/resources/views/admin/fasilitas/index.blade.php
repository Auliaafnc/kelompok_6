@extends('layouts.admin')
@section('content')
@can('fasilitas_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.fasilitas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.fasilitas.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fasilitas.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Fasilitas">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fasilitas.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fasilitas.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.fasilitas.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.fasilitas.fields.detail') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fasilitas as $key => $fasilitas)
                        <tr data-entry-id="{{ $Fasilitas->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $fasilitas->id ?? '' }}
                            </td>
                            <td>
                                {{ $fasilitas->name ?? '' }}
                            </td>
                            <td>
                                @if($fasilitas->image)
                                    <a href="{{ $fasilitas->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $fasilitas->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $fasilitas->detail ?? '' }}
                            </td>
                            <td>
                                @can('fasilitas_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fasilitas.show', $fasilitas->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fasilitas_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fasilitas.edit', $fasilitas->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('fasilitas_delete')
                                    <form action="{{ route('admin.fasilitas.destroy', $Fasilitas->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fasilitas_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fasilitas.massDestroy') }}",
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
  let table = $('.datatable-Fasilitas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection