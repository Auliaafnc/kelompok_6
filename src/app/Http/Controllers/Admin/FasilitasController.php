<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFasilitasRequest;
use App\Http\Requests\StoreFasilitasRequest;
use App\Http\Requests\UpdateFasilitasRequest;
use App\Models\Fasilitas;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FasilitasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fasilitas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fasilitas = Fasilitas::with(['media'])->get();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        abort_if(Gate::denies('fasilitas_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('fasilitas.create');
    }

    public function store(StoreFasilitasRequest $request)
    {
        $fasilitas = Fasilitas::create($request->all());

        if ($request->input('image', false)) {
            $fasilitas->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fasilitas->id]);
        }

        return redirect()->route('admin.fasilitas.index');
    }

    public function edit(Fasilitas $fasilitas)
    {
        abort_if(Gate::denies('fasilitas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(UpdateFasilitasRequest $request, Fasilitas $fasilitas)
    {
        $fasilitas->update($request->all());

        if ($request->input('image', false)) {
            if (! $fasilitas->image || $request->input('image') !== $fasilitas->image->file_name) {
                if ($fasilitas->image) {
                    $fasilitas->image->delete();
                }
                $fasilitas->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($fasilitas->image) {
            $fasilitas->image->delete();
        }

        return redirect()->route('admin.fasilitas.index');
    }

    public function show(Fasilitas $fasilitas)
    {
        abort_if(Gate::denies('fasilitas_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fasilitas.show', compact('fasilitas'));
    }

    public function destroy(Fasilitas $fasilitas)
    {
        abort_if(Gate::denies('fasilitas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fasilita->delete();

        return back();
    }

    public function massDestroy(MassDestroyFasilitasRequest $request)
    {
        $fasilitas = Fasilitas::find(request('ids'));

        foreach ($fasilitas as $fasilitas) {
            $fasilitas->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fasilitas_create') && Gate::denies('fasilitas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Fasilitas();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
