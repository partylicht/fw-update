<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Firmware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/{repo}/{version}', function (Request $request, string $repo, string $version) {
        if($request->token != config('firmware-upload.token')) return "wrong token";

        $filePath = $request->file('firmware')->storeAs(
            $repo."/".$version."/",
            "firmware.bin",
            'public'
        );

        $firmware = Firmware::firstOrNew([
            'repo' => $repo,
            'version' => $version,
        ]);

        $firmware->repo = $repo;
        $firmware->version = $version;
        $firmware->file_path = $filePath;
        $firmware->save();

        return 'success';
});


