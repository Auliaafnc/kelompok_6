@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.takeaway.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.takeaways.update", [$takeaway->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.takeaway.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $takeaway->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takeaway.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.takeaway.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $takeaway->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takeaway.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="waktu_takeaway">{{ trans('cruds.takeaway.fields.waktu_takeaway') }}</label>
                <input class="form-control datetime {{ $errors->has('waktu_takeaway') ? 'is-invalid' : '' }}" type="text" name="waktu_takeaway" id="waktu_takeaway" value="{{ old('waktu_takeaway', $takeaway->waktu_takeaway) }}" required>
                @if($errors->has('waktu_takeaway'))
                    <div class="invalid-feedback">
                        {{ $errors->first('waktu_takeaway') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takeaway.fields.waktu_takeaway_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="products">{{ trans('cruds.takeaway.fields.product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ (in_array($product->id, old('products', $takeaway->products->pluck('id')->toArray())) ? 'selected' : '') }}>{{ $product->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takeaway.fields.product_id_helper') }}</span>
            </div>
            <div id="quantity-container"></div>
            <div class="form-group">
                <label class="required" for="keterangan_tambahan">{{ trans('cruds.takeaway.fields.keterangan_tambahan') }}</label>
                <input class="form-control {{ $errors->has('keterangan_tambahan') ? 'is-invalid' : '' }}" type="text" name="keterangan_tambahan" id="keterangan_tambahan" value="{{ old('keterangan_tambahan', $takeaway->keterangan_tambahan) }}" required>
                @if($errors->has('keterangan_tambahan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan_tambahan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takeaway.fields.keterangan_tambahan_helper') }}</span>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.takeaway.fields.pembayaran') }}</label>
              <select class="form-control {{ $errors->has('pembayaran') ? 'is-invalid' : '' }}" name="pembayaran" id="pembayaran">
                  <option value disabled {{ old('pembayaran', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                  @foreach(App\Models\Takeaway::PEMBAYARAN_SELECT as $key => $label)
                      <option value="{{ $key }}" {{ old('pembayaran', $takeaway->pembayaran) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
              </select>
              @if($errors->has('pembayaran'))
                  <div class="invalid-feedback">
                      {{ $errors->first('pembayaran') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.takeaway.fields.pembayaran_helper') }}</span>
          </div>
            <div class="form-group">
                <label>{{ trans('cruds.takeaway.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Takeaway::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $takeaway->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takeaway.fields.status_helper') }}</span>
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
