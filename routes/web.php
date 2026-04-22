        <?php

        use App\Http\Controllers\ApprovedController;
        use App\Http\Controllers\DataSiswaController;
        use App\Http\Controllers\DocumentController;
        use App\Http\Controllers\JurusanController;
        use App\Http\Controllers\RayonController;
        use App\Http\Controllers\RombleController;
        use App\Http\Controllers\UserController;
        use App\Http\Controllers\DataKeluargaController;


        use Illuminate\Support\Facades\Route;

        Route::get('/', function () {
            return view('Home');
        })->name('Home');
        //tidak memerlukan data : route - view
        //memerlukan dat : route - controller -model -conteroller-view

        Route::get('signup', function () {
            return view('signup');
        })->name('signup')->middleware('isGuest');

        Route::get('login', function () {
            return view('login');
        })->name('login')->middleware('isGuest');


        //http method
        //1.get : menampilkan halaman/ mengambil data
        //2. post : menambah data
        //3.pacth/put : mengubah data
        //4. delete : menghapus data

        Route::post('/signup', [UserController::class, 'store'])->name('signup.store')
            ->middleware('isGuest');
        Route::post('/login', [UserController::class, 'login'])->name('login.auth')
            ->middleware('isGuest');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');




        Route::prefix('/user')->name('user.')->group(function () {
            
        Route::get('/', [UserController::class, 'home'])->name('home');
            // dataSiswa
            Route::prefix('/datasiswa')->name('datasiswas.')->group(function () {
                Route::get('/', [DataSiswaController::class, 'index'])->name('index');
                Route::get('/create', [DataSiswaController::class, 'create'])->name('create');
                Route::post('/store', [DataSiswaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [DataSiswaController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [DataSiswaController::class, 'update'])->name('update');
                // Route::delete('/{datasiswa}', [DataSiswaController::class, 'destroy'])->name('destroy');
                Route::get('/export', [DataSiswaController::class, 'exportExcel'])->name('export');
                // Route::get('/trash', [DataSiswaController::class, 'trash'])->name('trash');
                // Route::patch('/restore/{id}', [DataSiswaController::class, 'restore'])->name('restore');
                // Route::delete('/delete-permanent/{id}', [DataSiswaController::class, 'deletepermanent'])->name('delete_permanent');
            });
            // DATA KELUARGA (Relasi ke Ayah, Ibu, Wali)
        // ===========================
            Route::prefix('/datakeluarga')->name('datakeluargas.')->group(function () {
                Route::get('/', [DataKeluargaController::class, 'index'])->name('index');
                Route::get('/create', [DataKeluargaController::class, 'create'])->name('create');
                Route::post('/store', [DataKeluargaController::class, 'store'])->name('store');
                Route::get('/edit', [DataKeluargaController::class, 'edit'])->name('edit');
                Route::put('/update', [DataKeluargaController::class, 'update'])->name('update');
                // Route::delete('/{datakeluarga}', [DataKeluargaController::class, 'destroy'])->name('destroy');
                Route::get('/export', [DataKeluargaController::class, 'exportExcel'])->name('export');
            });

            Route::prefix('/documents')->name('documents.')->group(function () {
                Route::get('/', [DocumentController::class, 'index'])->name('index');
                Route::post('/store', [DocumentController::class, 'store'])->name('store');
                Route::get('/create', [DocumentController::class, 'create'])->name('create');
                Route::get('/{id}/edit', [DocumentController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [DocumentController::class, 'update'])->name('update');
                // Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('destroy');
                Route::get('/export', [DocumentController::class, 'exportExcel'])->name('export');
                Route::get('/trash', [DocumentController::class, 'trash'])->name('trash');
                Route::patch('/restore/{id}', [DocumentController::class, 'restore'])->name('restore');
                Route::delete('/delete-permanent/{id}', [DocumentController::class, 'deletepermanent'])->name('delete_permanent');
            });

        });

        Route::middleware(['auth', 'isAdmin'])->prefix('/admin')->name('admin.')->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');


            Route::resource('keluarga', DataKeluargaController::class);
            Route::resource('document', DocumentController::class);


            Route::prefix('/jurusan')->name('jurusans.')->group(function () {
                Route::get('/', [JurusanController::class, 'index'])->name('index');
                Route::get('/create', [JurusanController::class, 'create'])->name('create');
                Route::post('/store', [JurusanController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [JurusanController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [JurusanController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [JurusanController::class, 'destroy'])->name('delete');
                Route::get('/datatables', [JurusanController::class, 'dataForDatatables'])->name('datatables');
                Route::get('/export', [JurusanController::class, 'exportExcel'])->name('export');
                Route::get('/trash', [JurusanController::class, 'trash'])->name('trash');
                Route::patch('/restore/{id}', [JurusanController::class, 'restore'])->name('restore');
                Route::delete('/delete-permanent/{id}', [JurusanController::class, 'deletepermanent'])->name('delete_permanent');
            });
            // Rayon
            Route::prefix('/rayon')->name('rayons.')->group(function () {
                Route::get('/', [RayonController::class, 'index'])->name('index');
                Route::get('/create', [RayonController::class, 'create'])->name('create');
                Route::post('/store', [RayonController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [RayonController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [RayonController::class, 'destroy'])->name('delete');
                Route::get('/export', [RayonController::class, 'exportExcel'])->name('export');
                Route::get('/trash', [RayonController::class, 'trash'])->name('trash');
                Route::patch('/restore/{id}', [RayonController::class, 'restore'])->name('restore');
                Route::delete('/delete-permanent/{id}', [RayonController::class, 'deletepermanent'])->name('delete_permanent');
            });
            // Romble
            Route::prefix('/romble')->name('rombles.')->group(function () {
                Route::get('/', [RombleController::class, 'index'])->name('index');
                Route::get('/create', [RombleController::class, 'create'])->name('create');
                Route::post('/store', [RombleController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [RombleController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [RombleController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [RombleController::class, 'destroy'])->name('delete');
                Route::get('/export', [RombleController::class, 'exportExcel'])->name('export');
                Route::get('/trash', [RombleController::class, 'trash'])->name('trash');
                Route::patch('/restore/{id}', [RombleController::class, 'restore'])->name('restore');
                Route::delete('/delete-permanent/{id}', [RombleController::class, 'deletepermanent'])->name('delete_permanent');
            });

            Route::prefix('/approve')->name('approve.')->group(function () {
                Route::get('/', [ApprovedController::class, 'index'])->name('index');
                Route::get('/datatables', [ApprovedController::class, 'datatables'])->name('datatables');
                Route::get('/detail/{id}', [ApprovedController::class, 'show'])->name('show');
                Route::put('/setuju/{id}', [ApprovedController::class, 'approve'])->name('approve');
                Route::put('/tolak/{id}', [ApprovedController::class, 'reject'])->name('reject');
                Route::delete('/hapus/{id}', [ApprovedController::class, 'destroy'])->name('delete');
                Route::get('/{showId}/export/pdf', [ApprovedController::class, 'exportPdf'])->name('export.pdf');
                Route::get('/trash', [ApprovedController::class, 'trash'])->name('trash');
                Route::patch('/restore/{id}', [ApprovedController::class, 'restore'])->name('restore');
                Route::delete('/delete-permanent/{id}', [ApprovedController::class, 'deletePermanent'])->name('delete_permanent');
            });
        });


