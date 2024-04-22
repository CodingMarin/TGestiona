<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'street' => 'required|string',
            'type_document' => 'required|string',
            'document' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|string',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->street = $request->street;
        $client->type_document = $request->type_document;
        $client->document = $request->document;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();

        return redirect()->route('clients.index')->with('success', '¡Cliente registrado exitosamente!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'street' => 'required|string',
            'type_document' => 'required|string',
            'document' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|string',
        ]);

        $client = Client::findOrFail($id);

        $client->name = $request->name;
        $client->street = $request->street;
        $client->type_document = $request->type_document;
        $client->document = $request->document;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();

        return redirect()->route('clients.index')->with('success', '¡Cliente registrado exitosamente!');
    }
}
