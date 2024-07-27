@extends('layouts.admin')
@section('content')
@can('benner_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.benners.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.benner.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.benner.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Blog">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.benner.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.benner.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.benner.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.benner.fields.image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($benners as $key => $benner)
                        <tr data-entry-id="{{ $benner->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $benner->id ?? '' }}
                            </td>
                            <td>
                                {{ $benner->title ?? '' }}
                            </td>
                            <td>
                                {{ $benner->description ?? '' }}
                            </td>
                            <td>
                                @if($benner->image)
                                    <a href="{{ $benner->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $benner->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('benner_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.benners.show', $benner->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('benner_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.benners.edit', $benner->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('benner_delete')
                                    <form action="{{ route('admin.benners.destroy', $benner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('benner_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.benners.massDestroy') }}",
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
  let table = $('.datatable-Blog:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection