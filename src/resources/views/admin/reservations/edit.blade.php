@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reservations.update", [$reservation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.reservation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $reservation->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.reservation.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $reservation->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_book">{{ trans('cruds.reservation.fields.start_book') }}</label>
                <input class="form-control datetime {{ $errors->has('start_book') ? 'is-invalid' : '' }}" type="text" name="start_book" id="start_book" value="{{ old('start_book', $reservation->start_book) }}" required>
                @if($errors->has('start_book'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_book') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.start_book_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="table_id">{{ trans('cruds.reservation.fields.table_id') }}</label>
                <select class="form-control select2 {{ $errors->has('table_id') ? 'is-invalid' : '' }}" name="table_id" id="table_id" required>
                    @foreach($tables as $id => $table)
                        <option value="{{ $id }}" {{ (old('table_id') ? old('table_id') : $reservation->table_id) == $id ? 'selected' : '' }}>{{ $table }}</option>
                    @endforeach
                </select>
                @if($errors->has('table_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('table_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.table_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="keterangan_tambahan">{{ trans('cruds.reservation.fields.keterangan_tambahan') }}</label>
                <input class="form-control {{ $errors->has('keterangan_tambahan') ? 'is-invalid' : '' }}" type="text" name="keterangan_tambahan" id="keterangan_tambahan" value="{{ old('keterangan_tambahan', $reservation->keterangan_tambahan) }}" required>
                @if($errors->has('keterangan_tambahan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan_tambahan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.keterangan_tambahan_helper') }}</span>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.reservation.fields.pembayaran') }}</label>
              <select class="form-control {{ $errors->has('pembayaran') ? 'is-invalid' : '' }}" name="pembayaran" id="pembayaran">
                  <option value disabled {{ old('pembayaran', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                  @foreach(App\Models\Resevation::PEMBAYARAN_SELECT as $key => $label)
                      <option value="{{ $key }}" {{ old('pembayaran', $reservation->pembayaran) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
              </select>
              @if($errors->has('pembayaran'))
                  <div class="invalid-feedback">
                      {{ $errors->first('pembayaran') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.reservation.fields.pembayaran_helper') }}</span>
          </div>
            <div class="form-group">
                <label>{{ trans('cruds.reservation.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Reservation::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $reservation->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
