<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses =  Status::query()->with([])->get();

        return view('status.index', compact('statuses'));
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(StatusRequest $request)
    {


        $status = status::create($request->all());
        return redirect()->route('statuses.show', $status);
    }

    public function show(Status $status)
    {
        return view('status.show', ['status' => $status]);

    }

    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    public function update(StatusRequest $request, Status $status)
    {



        $status->update($request->all());
        return redirect()->route('status.show', $status);
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index');
    }
}
