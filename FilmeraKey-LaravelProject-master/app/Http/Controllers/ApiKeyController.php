<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ApiKey;

class ApiKeyController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255'
        ]);

        $key = Str::random(32);

        $request->user()->apiKeys()->create([
            'key' => $key,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('message', 'API key successfully generated!');
    }
    public function revoke($id)
    {
        $apiKey = ApiKey::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        $apiKey->delete();

        return redirect()->back()->with('message', 'API key revoked.');
    }
}






