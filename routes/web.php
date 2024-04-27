<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return redirect('/v2/home');
});

Route::get('/v2/maintance', function () {
    return view('v2.maintance');
    // return redirect('/v2/home');
});

Route::get('/news', function () {
    // return view('pengumuman');
    return redirect('/v2/news/all');
});

Route::get('/news/{id}', 'NewsController@show');

Route::get('/competition', function () {
    return view('competition');
});
// Route::get('/gallery', function () {
//     return view('gallery');
// });
// Route::get('/gallery/{id}','LombaGalleryController@show');
Route::get('/education', function () {
    return view('education');
    // return redirect('/v2/education');
});

Route::resource('lomba', 'LombaController');

// Daftar
Route::get('daftar', function () {
    return view('daftar.daftar');
});


Route::get('daftar/create', function () {
    return view('daftar.create');
});

Route::get('daftar/add', function () {
    return view('daftar.add');
});

Route::get('daftar/bayar', function () {
    return view('daftar.bayar');
});


Auth::routes();

Route::get('/pengumuman', function () {
    return view('pengumuman');
});

Route::get('/contact', function () {
    return view('contact');
});


// Route::get('/v2/competition', function () {
//     return view('v2.competition');
// });
Route::get('/v2/reg-competition', function () {
    return view('v2.register-competition');
});
Route::get('/v2/streaming', function () {
    return view('v2.streaming');
});

// Route::get('/v2/myregister/create', function () {
//     return view('v2.create-peserta');
// });
Route::group(['prefix' => 'v2', 'middleware' => ['auth']], function () {
    Route::get('/home', 'OpusV2Controller@index');
    Route::get('/news/{uri}', 'OpusV2Controller@news');
    Route::post('/gallery/{uri}', 'OpusV2Controller@gallery');
    Route::get('/login', 'OpusV2Controller@login');
    Route::get('/register', 'OpusV2Controller@register');
    Route::get('/competition', 'OpusV2Controller@competition');
    Route::get('/competition/{uri}', 'OpusV2Controller@select_competition');
    Route::get('/education', 'OpusV2Controller@education');
    Route::get('/education/{uri}', 'OpusV2Controller@select_education');
    Route::get('/myregister/{lomba_id}/create', 'OpusV2Controller@regiter_participant');
    Route::post('/myregister/{lombaku_id}/add', 'OpusV2Controller@add_participant');
    Route::post('/myregister/{user_id}/create', 'OpusV2Controller@save_participant');
    Route::get('/myregister/{lombaku_id}/confrimation', 'OpusV2Controller@confrimPayment');
    Route::get('/myregister/{lombaku_id}/pembayaran', 'OpusV2Controller@pembayaran');
    Route::post('/myregister/{user_id}/paid', 'OpusV2Controller@paid');
    Route::post('/api/peserta', 'OpusV2Controller@dataPeserta');
    Route::get('/api/lomba/{id}/kategori', 'OpusV2Controller@ApiLombaKategori');
    Route::post('/api/piece-category', 'OpusV2Controller@pieceCategory');
    Route::post('/api/question', 'OpusV2Controller@questionCreate');
    Route::get('/api/ketegori', 'OpusV2Controller@apiKategori');
    Route::get('/myregister', 'OpusV2Controller@myregister');
    Route::get('/myregister/{id}/show', 'OpusV2Controller@myregisterShow');
    Route::get('/password/{url}', 'OpusV2Controller@changePassword');
    Route::post('/myregister/{id}/delete', 'OpusV2Controller@myregisterDelete');
    Route::post('/password/new/{pass}', 'OpusV2Controller@updatedPassword');
    // Route::get('/live','OpusV2Controller@live');
    Route::get('/live/{url?}', 'OpusV2Controller@live');
});
Route::group(['prefix' => 'v2', 'middleware' => ['auth', 'role:organizer']], function () {
    Route::get('/content/new', 'OpusV2Controller@contentCreate');
    Route::get('/gallery/new', 'OpusV2Controller@galleryCreate');
    Route::post('/content/create', 'OpusV2Controller@contentPusblish');
    Route::post('/content/{id}', 'OpusV2Controller@destroyContent');
    Route::post('/content/{id}/edit', 'OpusV2Controller@contentRePusblish');
    Route::post('/lomba/{id}/import/{lombaId}/category', 'OpusV2Controller@importLombaKategori');
});

Route::get('/lomba/{id}/download/ppt-semifinal', 'OrganizerLombaDownload@ppt_semifinal');
Route::get('/lomba/{id}/download/ppt-final', 'OrganizerLombaDownload@ppt_final');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::get('/logout1', function () {
    Auth::logout();
    return redirect('/juri1');
});
Route::get('/logout2', function () {
    Auth::logout();
    return redirect('/juri2');
});
Route::get('/logout3', function () {
    Auth::logout();
    return redirect('/juri3');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    // Route diisi disini...
    Route::get('/shell/php-artisan-migrate-fresh', function () {
        Artisan::call('migrate:fresh');
        return redirect()->back();
    });
    Route::get('/shell/php-artisan-migrate', function () {
        Artisan::call('migrate');
        return redirect()->back();
    });
    Route::get('/shell/php-artisan-db-seed', function () {
        Artisan::call('db:seed');
        return redirect()->back();
    });
    Route::get('/', function () {
        return redirect('/admin/lomba');
    });
    Route::get('/lomba', 'AdminController@index');
    Route::get('/lomba/{id}', 'AdminController@lomba');
    Route::post('/lomba/{id}/cek', 'AdminController@checkin');
    Route::post('/lomba/{id}/uncek', 'AdminController@uncheck');
    Route::get('/lomba/{id}/kategori', 'AdminController@kategori');
});

Route::group(['prefix' => 'organizer', 'middleware' => ['auth', 'role:organizer']], function () {
    // Route diisi disini...

    Route::get('/', function () {
        return redirect('/organizer/lomba');
        //return view('organizer.index');
    });
    Route::get('/api/{id}', 'AdminController@api');
    Route::get('/api/category/{id}', 'OrganizerLombaKategoriController@apiCategory');
    // Route::get('lomba/{id}/delete', "OrganizerLombaController@delete");
    // Route::get('lomba/{id}/delete', "OrganizerLombaController@delete");

    Route::resource('lomba', 'OrganizerLombaController');
    Route::resource('lomba/{lomba_id}/kategori', 'OrganizerLombaKategoriController');

    // Route::post('/organizer/lomba', "kontenController@add");
    Route::resource('/lomba/{lomba_id}/konten', 'LombaKontenController');
    Route::resource('/news', 'NewsController');
    Route::delete('/news', 'NewsController@destroy');
    Route::put('/news', 'NewsController@update');

    Route::get('lomba/{lomba_id}/lombaku/{lombaku_id}', 'OrganizerLombakuController@show');
    Route::post('lomba/{lomba_id}/lombaku/{lombaku_id}/confirm', 'OrganizerLombakuController@confirm');
    Route::post('lomba/{lomba_id}/lombaku/{lombaku_id}/delete', 'OrganizerLombakuController@delete');

    Route::get('lomba/{lomba_id}/peserta/{id}', 'OrganizerPesertaController@show');
    Route::get('lomba/{lomba_id}/peserta/{id}/edit', 'OrganizerPesertaController@edit');
    Route::delete('lomba/{lomba_id}/peserta/{id}', 'OrganizerPesertaController@destroy');
    Route::put('lomba/{lomba_id}/peserta/{id}/', 'OrganizerPesertaController@update');
    Route::post('lomba/{lomba_id}/peserta/{id}/reset_undian', 'OrganizerPesertaController@reset_undian');

    //download laporan
    Route::get('lomba/{lomba_id}/download/bukuacara', 'OrganizerLombaDownload@bukuacara_view');
    Route::post('lomba/{lomba_id}/download/bukuacara', 'OrganizerLombaDownload@bukuacara_download');
    Route::get('lomba/{lomba_id}/download/guidebook', 'OrganizerLombaDownload@guidebook_view');
    Route::post('lomba/{lomba_id}/download/guidebook', 'OrganizerLombaDownload@guidebook_proses');
    Route::get('lomba/{lomba_id}/download/rekap', 'OrganizerLombaDownload@rekap_view');
    Route::post('lomba/{lomba_id}/download/rekap', 'OrganizerLombaDownload@rekap_proses');

    Route::get('/lomba/{id}/download/powerpoint', 'OrganizerLombaDownload@powerpoint_view');
    Route::post('/lomba/{id}/download/powerpoint', 'OrganizerLombaDownload@powerpoint_proses');
    Route::get('/lomba/{id}/download/ppt-semifinal', 'OrganizerLombaDownload@ppt_semifinal');
    Route::get('/lomba/{id}/download/ppt-final', 'OrganizerLombaDownload@ppt_final');
    Route::get('/lomba/{id}/download/sertifikatkpp2019', 'OrganizerLombaDownload@sertifikatkpp2019');

    Route::get('lomba/{lomba_id}/download/rekap_peserta', 'OrganizerLombaDownload@rekap_peserta_view');
    Route::post('lomba/{lomba_id}/download/rekap_peserta', 'OrganizerLombaDownload@rekap_peserta_proses');

    Route::get('lomba/{lomba_id}/download/komentar', 'OrganizerLombaDownload@komentar_view');
    Route::post('lomba/{lomba_id}/download/komentar', 'OrganizerLombaDownload@komentar_proses');
    // Route::post('lomba/{lomba_id}/peserta/{id}','OrganizerPesertaController@update');
    // Route::resource('lomba/{lomba_id}/peserta/','OrganizerPesertaController');
    Route::get('lomba/{lomba_id}/download/penilaian', 'OrganizerLombaDownload@penilaian_view');
    Route::get('lomba/{lomba_id}/download/penilaian/list', 'OrganizerLombaDownload@penilaian_proses');
    Route::post('lomba/{lomba_id}/download/penilaian_simpan', 'OrganizerLombaDownload@penilaian_simpan');
    Route::get('lomba/{lomba_id}/download/hasil', 'OrganizerLombaDownload@hasil_view');
    Route::post('lomba/{lomba_id}/download/hasil', 'OrganizerLombaDownload@hasil_proses');
    Route::get('lomba/{lomba_id}/download/sertifikat', 'OrganizerLombaDownload@sertifikat_view');
    Route::post('lomba/{lomba_id}/download/sertifikat', 'OrganizerLombaDownload@sertifikat_proses');

    Route::get('gallery', 'OrganizerImagesController@show');
    Route::get('gallery/{id}', 'OrganizerImagesController@index');
    Route::post('gallery/storeImage/{id}', 'OrganizerImagesController@storeImage');
    Route::get('gallery/allImages', 'OrganizerImagesController@allImages')->name('allImages');
    Route::post('gallery/deleteImage/{id}', 'OrganizerImagesController@deleteImage');
    Route::post('gallery/deleteImages', 'OrganizerImagesController@deleteImages');


    Route::get('payment-methods', 'PaymentMethodController@index')->name('paymentMethod.index');
    Route::post('payment-methods/update', 'PaymentMethodController@update');
});

Route::group(['prefix' => 'guru', 'middleware' => ['auth', 'role:guru']], function () {
    // Route diisi disini...
    Route::get('/', function () {
        return view('guru.index');
    });
    // Route::get('peserta','GuruController');


});

Route::group(['prefix' => 'peserta', 'middleware' => ['auth', 'role:peserta']], function () {
    // Route diisi disini...
    Route::get('/', function () {
        return view('peserta.index');
    });
});

Route::group(['prefix' => 'juri', 'middleware' => ['auth', 'role:juri']], function () {
    // Route diisi disini...
    Route::get('/', function () {
        return view('juri.index');
    });
    Route::resource('/lomba', 'JuriLombaController');
    Route::get('/lomba/{id}/nilai', 'JuriLombaController@nilai');
    Route::get('/lomba/{id}/penilaian', 'JuriLombaController@penilaian');
    Route::post('/lomba/{id}/penilaian', 'JuriLombaController@simpan');
});

Route::group(['middleware' => ['auth']], function () {
    // Route diisi disini...
    Route::resource('lombaku', 'LombakuController');
    Route::resource('pesertaku', 'PesertakuController');
    Route::resource('lombaku/{lombakuId}/peserta', 'LombakuPesertaController');
    Route::get('lombaku/{lombakuId}/konfirmasi', 'LombakuController@showKonfirmasi');
    Route::post('lombaku/{lombakuId}/konfirmasi', 'LombakuController@storeKonfirmasi');
    Route::get('lombaku/{lombakuId}/pembayaran', 'LombakuController@showPembayaran');
    Route::post('lombaku/{lombakuId}/pembayaran', 'LombakuController@savePembayaran');
    Route::post('lombaku/{lombaId}/undian/{pesertaId}', 'LombakuController@ambilUndian');
});

Route::get('/juri1', function () {
    $data['email'] = 'juri1@gmail.com';
    $data['password'] = 'rahasia';
    return view('auth.loginjuri')->with($data);
});
Route::get('/juri2', function () {
    $data['email'] = 'juri2@gmail.com';
    $data['password'] = 'rahasia';
    return view('auth.loginjuri')->with($data);
});
Route::get('/juri3', function () {
    $data['email'] = 'juri3@gmail.com';
    $data['password'] = 'rahasia';
    return view('auth.loginjuri')->with($data);
});
