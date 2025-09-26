<?php

use App\Events\SendNotification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Juara\EventController;
use App\Http\Controllers\Pendaftaran\FilePersyaratanController;
use App\Http\Controllers\MasterData\PersyaratanController;
use App\Http\Controllers\Pendaftaran\DaftarPendaftaranController;
use App\Http\Controllers\Pendaftaran\FormPendaftaranController;
use App\Http\Controllers\PendaftaranMandiriController;
use App\Models\RevaerToken;
use Faker\Core\File;
use GuzzleHttp\Client;
use Kreait\Firebase\Factory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
  // 🏠 Dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  // 📄 Persyaratan
  Route::resource('persyaratan', PersyaratanController::class);
  Route::get('/persyaratan/data', [PersyaratanController::class, 'getAll']);

  // 📋 Formulir Pendaftaran
  // Route::get('/formpendaftaran/{id}/edit', [FormPendaftaranController::class, 'edit'])->name('formpendaftaran.edit');
  Route::get('/pendaftaran/{id}/editform', [FilePersyaratanController::class, 'renderEditForm'])
    ->name('pendaftaran.renderEditForm');

  Route::resource('form-pendaftaran', FormPendaftaranController::class);


  Route::post('post-biodata', [FilePersyaratanController::class, 'store'])->name('post-biodata');

  Route::get('/get-desa/{kecamatan_id}', [FormPendaftaranController::class, 'getDesa']);

  // 📝 Daftar Pendaftaran — CUKUP SATU INI
  Route::resource('daftar-pendaftaran', DaftarPendaftaranController::class);

  // Route::get('file-persyaratan/{id}', FilePersyaratanController::class, 'index');
  Route::get('/file-persyaratan/{id}', [FilePersyaratanController::class, 'index'])->name('file-persyaratan.show');

  Route::post('/file-persyaratan/{id}/updateBiodata', [FilePersyaratanController::class, 'updateBiodata'])
    ->name('file-persyaratan.updateBiodata');

  Route::post('/upload-file-persyaratan/{id}', [FilePersyaratanController::class, 'store']);

  Route::resource('file-persyaratan', FilePersyaratanController::class);

  Route::post('/verifikasi-persyaratan/{id}', [FilePersyaratanController::class, 'verifikasi']);

  Route::get('/cetak-pemohon/{id}', [DaftarPendaftaranController::class, 'cetak_pemohon'])->name('cetakPemohon');
   
  Route::get('/events', [EventController::class, 'index'])->name('events.index'); // daftar event
  Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // form tambah event
  Route::post('/events', [EventController::class, 'store'])->name('events.store'); // simpan event + kirim notifikasi
  Route::get('/test-firebase', function () {
    $path = env('FIREBASE_CREDENTIALS');
    if (file_exists($path)) {
        return response()->json(['status' => 'ok', 'file_size' => filesize($path)]);
    }
    return response()->json(['status' => 'not found']);
});

Route::get('/test-firebase3', function () {
    try {
        $factory = (new Factory)->withServiceAccount(env('FIREBASE_CREDENTIALS'));
        $messaging = $factory->createMessaging();
        return response()->json(['status' => 'Firebase connected']);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
});

});
Route::get('/pendaftaran-mandiri', [PendaftaranMandiriController::class, 'index'])->name('pendaftaranMandiri.index');
Route::post('/pendaftaran/store', [PendaftaranMandiriController::class, 'store'])->name('pendaftaranMandiri.store');
Route::get('/test-notification', function () {
    $title = "Event Baru";
    $body = "Halo dari Laravel!";

    // 🔹 Broadcast realtime (Pusher)
    event(new SendNotification($title, $body));

    // 🔹 Kirim push notification Revaer
    $tokens = RevaerToken::pluck('token')->toArray();
    $client = new Client();
    $client->post('https://api.revaer.com/send', [
        'json' => [
            'app_id' => env('REVAER_APP_ID'),
            'api_key' => env('REVAER_API_KEY'),
            'tokens' => $tokens,
            'title' => $title,
            'message' => $body,
        ],
    ]);

    return 'Notifikasi dikirim';
});

