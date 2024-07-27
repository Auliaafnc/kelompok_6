<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBennerRequest;
use App\Http\Requests\StoreBennerRequest;
use App\Http\Requests\UpdateBennerRequest;
use App\Models\Benner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BennerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('benner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $benners = Benner::with(['media'])->get();

        return view('admin.benners.index', compact('benners'));
    }

    public function create()
    {
        abort_if(Gate::denies('benner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.benners.create');
    }

    public function store(StoreBennerRequest $request)
    {
        $benner = Benner::create($request->all());

        if ($request->input('image', false)) {
            $benner->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $benner->id]);
        }

        return redirect()->route('admin.benners.index');
    }

    public function edit(Benner $benner)
    {
        abort_if(Gate::denies('benner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.benners.edit', compact('benner'));
    }

    public function update(UpdateBennerRequest $request, Benner $benner)
    {
        $benner->update($request->all());

        if ($request->input('image', false)) {
            if (! $benner->image || $request->input('image') !== $benner->image->file_name) {
                if ($benner->image) {
                    $benner->image->delete();
                }
                $benner->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($benner->image) {
            $benner->image->delete();
        }

        return redirect()->route('admin.benners.index');
    }

    public function show(Benner $benner)
    {
        abort_if(Gate::denies('benner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.benners.show', compact('benner'));
    }

    public function destroy(Benner $benner)
    {
        abort_if(Gate::denies('benner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $benner->delete();

        return back();
    }

    public function massDestroy(MassDestroyBennerRequest $request)
    {
        $benners = Benner::find(request('ids'));

        foreach ($benners as $benner) {
            $benner->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('benner_create') && Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Benner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
