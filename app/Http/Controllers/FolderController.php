<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FolderResource;
use App\Models\Folder;
use Illuminate\Http\Request;
use Flash;
use Response;

class FolderController extends AppBaseController
{
    /**
     * Display a listing of the Folder.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('folders.index');
    }

    public function getFolders()
    {
        return FolderResource::collection(
            Folder::all()
        );
    }

    /**
     * Show the form for creating a new Folder.
     *
     * @return Response
     */
    public function create()
    {
        return view('folders.create');
    }

    /**
     * Store a newly created Folder in storage.
     *
     * @param CreateFolderRequest $request
     *
     * @return Response
     */
    public function store(CreateFolderRequest $request)
    {
        $input = $request->all();

        /** @var Folder $folder */
        $folder = Folder::create($input);

        Flash::success('Folder saved successfully.');

        return redirect(route('folders.index'));
    }

    /**
     * Display the specified Folder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Folder $folder */
        $folder = Folder::find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        return view('folders.show')->with('folder', $folder);
    }

    /**
     * Show the form for editing the specified Folder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Folder $folder */
        $folder = Folder::find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        return view('folders.edit')->with('folder', $folder);
    }

    /**
     * Update the specified Folder in storage.
     *
     * @param int $id
     * @param UpdateFolderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFolderRequest $request)
    {
        /** @var Folder $folder */
        $folder = Folder::find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        $folder->fill($request->all());
        $folder->save();

        Flash::success('Folder updated successfully.');

        return redirect(route('folders.index'));
    }

    /**
     * Remove the specified Folder from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Folder $folder */
        $folder = Folder::find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        $folder->delete();

        Flash::success('Folder deleted successfully.');

        return redirect(route('folders.index'));
    }
}
