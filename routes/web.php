<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GenerateController;
use Illuminate\Support\Facades\Auth;

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

// GENERAL ROUTES
Route::get('/', [App\Http\Controllers\UserController::class, 'home'])->middleware('guest');
Route::get('/home', [App\Http\Controllers\UserController::class, 'home'])->middleware('auth');
Route::get('/detail/question', [App\Http\Controllers\UserController::class, 'question']);
Route::get('/about', [App\Http\Controllers\UserController::class, 'about']);
Route::get('/learn', [App\Http\Controllers\UserController::class, 'learn']);
Route::get('/learn/view-details/{id}', [App\Http\Controllers\UserController::class, 'view_detail']);
Route::get('/help', [App\Http\Controllers\UserController::class, 'user_guide']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth');
Route::get('/demo', [App\Http\Controllers\UserController::class, 'setcookie']);
Route::get('/demo/dashboard', [App\Http\Controllers\UserController::class, 'demo']);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware('auth');
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// PAYMENT
Route::get('/balance', [App\Http\Controllers\UserController::class, 'balance'])->middleware('auth');
Route::get('/top-up', [App\Http\Controllers\UserController::class, 'top_up'])->middleware('auth');
Route::post('/top-up', [App\Http\ControllersUserBalanceController::class, 'topUp'])->name('user.balance.topUp')->middleware('auth');
Route::get('/upgrade-account', [App\Http\Controllers\UserController::class, 'upgrade_account']);
Route::get('/upgrade-account/account-information', [App\Http\Controllers\UserController::class, 'account_information'])->middleware('auth');
Route::post('/upgrade-account/plan-option', [App\Http\Controllers\UserController::class, 'plan_option'])->middleware('auth');
Route::get('/upgrade-account/payment', [App\Http\Controllers\UserController::class, 'payment'])->middleware('auth');
Route::get('/upgrade-account/success-upgrade', [App\Http\Controllers\UserController::class, 'success_upgrade'])->middleware('auth');
Route::post('/upgrade-account/store-payment', [App\Http\Controllers\UserController::class, 'store_payment'])->middleware('auth');
Route::post('/checkout', [App\Http\Controllers\UserController::class, 'checkout'])->middleware('auth');
Route::get('/invoice/{id}', [App\Http\Controllers\UserController::class, 'invoice'])->middleware('auth');
Route::post('/upgrade-account/store-upgrade', [App\Http\Controllers\UserController::class, 'store_upgrade'])->middleware('auth');

// ADMIN
Route::get('/admin-dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->middleware(['auth', 'admin-middleware']);
Route::get('/user-dashboard', [App\Http\Controllers\Admin\AdminController::class, 'user_dashboard'])->middleware(['auth', 'admin-middleware']);
Route::get('/payment-request', [App\Http\Controllers\Admin\AdminController::class, 'payment_request'])->middleware(['auth', 'admin-middleware']);
Route::get('/premium-request', [App\Http\Controllers\Admin\AdminController::class, 'premium_request'])->middleware(['auth', 'admin-middleware']);
Route::post('/decline-request/{id}', [App\Http\Controllers\Admin\AdminController::class, 'decline_request'])->middleware(['auth', 'admin-middleware']);
Route::post('/accept-request', [App\Http\Controllers\Admin\AdminController::class, 'accept_request'])->middleware(['auth', 'admin-middleware']);
Route::post('/accept-request-premium', [App\Http\Controllers\Admin\AdminController::class, 'accept_request_premium'])->middleware(['auth', 'admin-middleware']);
Route::get('/question', [App\Http\Controllers\Admin\AdminController::class, 'question'])->middleware(['auth', 'admin-middleware']);
Route::get('/learning', [App\Http\Controllers\Admin\AdminController::class, 'learning'])->middleware(['auth', 'admin-middleware']);

//IRT
Route::get('/irt/result', [App\Http\Controllers\IrtController::class, 'result']);
Route::get('/irt/test', [App\Http\Controllers\IrtController::class, 'startTest']);
Route::post('/irt/store-answers', [App\Http\Controllers\IrtController::class, 'storeAnswers'])->name('irt.storeAnswers');
// CBT
Route::get('/cbt', [App\Http\Controllers\CbtController::class, 'index']);
Route::get('/demo/cbt', [App\Http\Controllers\CbtController::class, 'index']);
Route::get('/cbt/cbt-dashboard', [App\Http\Controllers\CbtController::class, 'cbtDashboard']);
Route::get('/demo/cbt/cbt-dashboard', [App\Http\Controllers\CbtController::class, 'cbtDashboard']);
Route::post('/store-create-test', [App\Http\Controllers\CbtController::class, 'storeNewTest']);
Route::get('/cbt/create-test', [App\Http\Controllers\CbtController::class, 'createTest']);
Route::get('/demo/cbt/create-test', [App\Http\Controllers\CbtController::class, 'createTest']);
Route::get('/cbt/test/{testCode}', [App\Http\Controllers\CbtController::class, 'startTest']);
Route::get('/demo/cbt/test/{testCode}', [App\Http\Controllers\CbtController::class, 'startTest']);
Route::get('/cbt/test-result/{resultId}', [App\Http\Controllers\CbtController::class, 'testResult']);
Route::get('/demo/cbt/test-result/{resultId}', [App\Http\Controllers\CbtController::class, 'testResult']);
Route::get('/cbt/test-page', [App\Http\Controllers\CbtController::class, 'cbtLandingPage']);
Route::get('/demo/cbt/test-page', [App\Http\Controllers\CbtController::class, 'cbtLandingPage']);
Route::get('/cbt/test-detail/{testCode}/{username}', [App\Http\Controllers\CbtController::class, 'cbtDetail']);
Route::get('/demo/cbt/test-detail/{testCode}/{username}', [App\Http\Controllers\CbtController::class, 'cbtDetail']);
Route::post('/cbt/test/submit/{testCode}', [App\Http\Controllers\CbtController::class, 'submitTest']);
Route::post('/cbt/test-verification/', [App\Http\Controllers\CbtController::class, 'verifyTest']);
Route::get('/cbt/admin-test-detail/{code}', [App\Http\Controllers\CbtController::class, 'cbtAdminDetailTest']);
Route::get('/demo/cbt/admin-test-detail/{code}', [App\Http\Controllers\CbtController::class, 'cbtAdminDetailTest']);
Route::get('/cbt/select-question/{testCode}', [App\Http\Controllers\CbtController::class, 'selectQuestionTest']);
Route::get('/demo/cbt/select-question/{testCode}', [App\Http\Controllers\CbtController::class, 'selectQuestionTest']);
Route::get('/cbt/select-question/{testCode}/{collectionCode}', [App\Http\Controllers\CbtController::class, 'detailSelectQuestionTest']);
Route::get('/demo/cbt/select-question/{testCode}/{collectionCode}', [App\Http\Controllers\CbtController::class, 'detailSelectQuestionTest']);
Route::post('/cbt/select-question/save', [App\Http\Controllers\CbtController::class, 'saveSelectedQuestion'])->name('none');
Route::get('/cbt/test-landing-page', [App\Http\Controllers\CbtController::class, 'testLandingPage']);
Route::delete('/cbt/cbt-dashboard/delete-test/{id}', [App\Http\Controllers\CbtController::class, 'delete_test']);
Route::post('/cbt/cbt-dashboard/update-test/{id}', [App\Http\Controllers\CbtController::class, 'update_test']);
Route::get('/cbt/detail-score/{resultId}', [App\Http\Controllers\CbtController::class, 'scoreDetail']);
Route::post('/store-question-print', [App\Http\Controllers\QuestionController::class, 'store_question'])->middleware(['auth']);
Route::get('/cbt/preview-test/{testCode}/', [App\Http\Controllers\CbtController::class, 'preview']);
Route::get('/cbt/list-result/{testCode}', [App\Http\Controllers\CbtController::class, 'listResult'])->middleware(['auth', 'premium-middleware']);
Route::get('/demo/cbt/list-result/{testCode}', [App\Http\Controllers\CbtController::class, 'listResult']);
Route::get('/cbt/print-question/{code}', [App\Http\Controllers\CbtController::class, 'PrintQuestion']);
Route::get('/cbt/print-question/print/FAF0XU', [App\Http\Controllers\CbtController::class, 'generatePDF'])->middleware(['auth']);


// GENERATE
Route::get('/generate', [App\Http\Controllers\GenerateController::class, 'index'])->middleware('auth');
Route::get('/demo/generate', [App\Http\Controllers\GenerateController::class, 'index']);
Route::get('/generate/{qtype}/input-passage', [App\Http\Controllers\GenerateController::class, 'input_passage'])->middleware('auth');
Route::get('/demo/generate/{qtype}/input-passage', [App\Http\Controllers\GenerateController::class, 'input_passage']);
Route::get('/generate/preview-passage', [App\Http\Controllers\GenerateController::class, 'preview_passage'])->middleware('auth');
Route::get('/demo/generate/preview-passage', [App\Http\Controllers\GenerateController::class, 'preview_passage']);
Route::get('/generate/regenerate', [App\Http\Controllers\GenerateController::class, 'regenerate'])->middleware('auth');
Route::get('/demo/generate/regenerate', [App\Http\Controllers\GenerateController::class, 'regenerate']);
Route::get('/generate/result', [App\Http\Controllers\GenerateController::class, 'generate_result'])->middleware('auth');
Route::get('/demo/generate/result', [App\Http\Controllers\GenerateController::class, 'generate_result']);
Route::get('/generate/file_content', [GenerateController::class, 'file_content'])->name('file_content');
Route::post('/generate/store-passage', [App\Http\Controllers\GenerateController::class, 'store_passage']);
Route::post('/scrapping', [GenerateController::class, 'scrape'])->name('scrape');
Route::post('/process-file', [GenerateController::class, 'process_file'])->name('process_file');
Route::post('/save-generate-result', [GenerateController::class, 'save_generate_result']);
Route::post('/edit-generated-question', [App\Http\Controllers\GenerateController::class, 'edit_generated_question']);


// QUESTION COLLECTION
Route::get('/generate/add-question-manual', [App\Http\Controllers\QuestionController::class, 'add_question_manual'])->middleware('auth');
Route::get('/question-collection', [App\Http\Controllers\QuestionController::class, 'collection_dashboard'])->middleware('auth');
Route::get('/demo/question-collection', [App\Http\Controllers\QuestionController::class, 'collection_dashboard']);
Route::get('/detail-collection/{question_code}', [App\Http\Controllers\QuestionController::class, 'detail_collection'])->middleware('auth');
Route::get('/demo/detail-collection/{question_code}', [App\Http\Controllers\QuestionController::class, 'detail_collection']);
Route::post('/save-edit-question-collection', [App\Http\Controllers\QuestionController::class, 'save_edit_question']);
Route::get('/remove-question/{id}', [App\Http\Controllers\QuestionController::class, 'removeQuestion']);
Route::get('/generate/add-question-test', [App\Http\Controllers\QuestionController::class, 'add_question_test'])->middleware('auth');
Route::get('/add-question-to-test/{testId}/{id}', [App\Http\Controllers\QuestionController::class, 'addQuestiontoTest'])->middleware('auth');
// Route::get('/question-collection/print', [App\Http\Controllers\QuestionController::class, 'print_question'])->middleware(['auth']);

require __DIR__ . '/auth.php';
