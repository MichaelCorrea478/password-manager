<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Password;
use Illuminate\Http\Request;
use Flash;
use Response;

class PasswordController extends AppBaseController
{
    /**
     * Display a listing of the Password.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Password $passwords */
        $passwords = Password::all();

        return view('passwords.index')
            ->with('passwords', $passwords);
    }

    /**
     * Show the form for creating a new Password.
     *
     * @return Response
     */
    public function create()
    {
        return view('passwords.create');
    }

    /**
     * Store a newly created Password in storage.
     *
     * @param CreatePasswordRequest $request
     *
     * @return Response
     */
    public function store(CreatePasswordRequest $request)
    {
        $input = $request->all();

        /** @var Password $password */
        $password = Password::create($input);

        Flash::success('Password saved successfully.');

        return redirect(route('passwords.index'));
    }

    /**
     * Display the specified Password.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Password $password */
        $password = Password::find($id);

        if (empty($password)) {
            Flash::error('Password not found');

            return redirect(route('passwords.index'));
        }

        return view('passwords.show')->with('password', $password);
    }

    /**
     * Show the form for editing the specified Password.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Password $password */
        $password = Password::find($id);

        if (empty($password)) {
            Flash::error('Password not found');

            return redirect(route('passwords.index'));
        }

        return view('passwords.edit')->with('password', $password);
    }

    /**
     * Update the specified Password in storage.
     *
     * @param int $id
     * @param UpdatePasswordRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePasswordRequest $request)
    {
        /** @var Password $password */
        $password = Password::find($id);

        if (empty($password)) {
            Flash::error('Password not found');

            return redirect(route('passwords.index'));
        }

        $password->fill($request->all());
        $password->save();

        Flash::success('Password updated successfully.');

        return redirect(route('passwords.index'));
    }

    /**
     * Remove the specified Password from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Password $password */
        $password = Password::find($id);

        if (empty($password)) {
            Flash::error('Password not found');

            return redirect(route('passwords.index'));
        }

        $password->delete();

        Flash::success('Password deleted successfully.');

        return redirect(route('passwords.index'));
    }
}
