<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginWithGooglecontroller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\loginCheck;
use App\Http\Middleware\roleCheck;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::controller(LoginWithGooglecontroller::class)->group(function () {
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/register', [AuthController::class, 'register'])->name('v_register');
    Route::get('/registerstep2', function () {
        return view('login');
    })->name('loginstep2');
    Route::get('/register-company', function () {
        return view('registercompany');
    })->name('registercompany');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::get('/login/forgotpassword', function () {
        return view('forgotpass');
    });
});

Route::post('/jobs', [JobController::class, 'index']);
Route::post('/jobsCompany', [JobController::class, 'indexCompany']);

Route::post('/jobs_detail', [JobController::class, 'detail_job']);
Route::post('/detail-blog', [BlogController::class, 'detail_blog']);

Route::post('/blog-index', [BlogController::class, 'index']);
Route::controller(BlogController::class)->group(function () {
    foreach (['postCommentSingle'] as $key => $value) {
        Route::post('/blog/' . $value, $value);
    }
});
Route::get('/jobscount', [JobController::class, 'jobscount']);

Route::middleware(['roleCheck:BfiwyVUDrXOpmStr'])->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('index');
    Route::get('/', function () {
        return view('welcome');
    })->name('index');

    Route::get('/category', function () {
        return view('category');
    })->name('category');

    Route::get('/register-company', function () {
        return view('registercompany');
    })->name('registercompany');

    Route::get('/detailjob', function () {
        return view('detailjob');
    });
    Route::get('/blog', function () {
        return view('blog');
    });
    Route::get('/content-blog', function () {
        return view('contentblog');
    });
    Route::get('/create-blog', function () {
        return view('formblog');
    });
    Route::post('/register/company', [CompanyController::class, 'store'])->name('register.company');

    Route::get('/registerchoice', function () {
        return view('registerchoice');
    })->name('registerchoice');

});

Route::controller(JobController::class)->group(function () {
    foreach ([ 'save', 'uploadFile', 'deleteFile'] as $key => $value) {
        Route::post('/job/' . $value, $value);
    }
});

Route::get('/landing', function () {
    return view('landingadmin');
});


Route::middleware([loginCheck::class])->group(function () {
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');

    Route::group(['middleware' => ['roleCheck:BfiwyVUDrXOpmStr']], function () {
        Route::get('/resumeprev', [ResumeController::class, 'index']);
        Route::get('/userdata', [UserController::class, 'index']);

        Route::controller(ResumeController::class)->group(function () {
            foreach (['save', 'submitJob', 'deleteFile'] as $key => $value) {
                Route::post('/resume/' . $value, $value);
            }
        });
        Route::get('/resume', function () {
            return view('resume');
        });

        Route::get('/resumepreview', function () {
            return view('resumepreview');
        });

        Route::get('/userprofile', function () {
            return view('userprofile');
        });

        Route::get('/editprofile', function () {
            return view('editprofile');
        });
    });

    Route::group(['middleware' => ['roleCheck:FOV4Qtgi5lcQ9kZ']], function () {
        Route::get('/company/landing', function () {
            return view('indexcompany.landingcompany');
        })->name('landingcompany');

        Route::get('/company', function () {
            return view('indexcompany.landingcompany');
        });

        Route::get('/company/jobvacancy', function () {
            return view('indexcompany.jobvacancy');
        });
        Route::get('/company/detailjob', function () {
            return view('indexcompany.detailjob');
        });
        Route::get('/company/detailpelamar', function () {
            return view('indexcompany.detailpelamar');
        });
        Route::get('/company/formjob', function () {
            return view('indexcompany.formjob');
        })->name('formjob');
        Route::get('/company/profile', function () {
            return view('indexcompany.companyprofile');
        });
        Route::get('/company/previewjob', function () {
            return view('indexcompany.previewjob');
        });
        Route::get('/company/profile', function () {
            return view('indexcompany.profile');
        });
        Route::get('/company/formprofile', function () {
            return view('indexcompany.formprofile');
        });
    });
});
