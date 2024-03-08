<?php

use App\Http\Controllers\AnesthesiaSurgeriesController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClinicalRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EuthanasiaController;
use App\Http\Controllers\InternmentController;
use App\Http\Controllers\PaymentCommitmentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SedationAnesthesiaController;
use App\Http\Controllers\ServiceProvisionContractController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

// N + 1 problem
// DB::listen(function ($query) {
//     dump($query->sql);
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::resource('dashboard', DashboardController::class)->names('dashboard');

Route::resource('clients', ClientController::class)->names('clients');
Route::get('/get-animals/{client}', [ClientController::class, 'getAnimals'])->name('get-animals');

Route::resource('animals', AnimalController::class)->names('animals');
Route::get('animals_pdf', [AnimalController::class, 'pdf'])->name('animals_pdf');
Route::get('history_animal/{animal}', [AnimalController::class, 'history_animal'])->name('history_animal');

Route::resource('clinical_records', ClinicalRecordController::class)->names('clinical_records');
Route::get('clinical_records_pdf/{clinical_records}', [ClinicalRecordController::class, 'pdf'])->name('clinical_records_pdf');
Route::get('pdf_all_clinical_records', [ClinicalRecordController::class, 'pdfAll'])->name('pdf_all_clinical_records');
Route::post('export_clinical_records', [ClinicalRecordController::class, 'export'])->name('export_clinical_records');
Route::post('clinical_records/{client}/pdf', [ClinicalRecordController::class, 'exportForClient'])->name('clinical_records_pdf_client');
Route::put('upload_image_clinical/{clinical_record}', [ClinicalRecordController::class, 'uploadImage'])->name('upload_image_clinical');

Route::resource('payment_commitments', PaymentCommitmentController::class)->names('payment_commitments');
Route::get('payment_commitments_client/{payment_commitment}', [PaymentCommitmentController::class, 'pdf'])->name('payment_commitments_client');
Route::get('pdf_all_payment_commitments', [PaymentCommitmentController::class, 'pdfAll'])->name('pdf_all_payment_commitments');
Route::post('export_payment_commitments', [PaymentCommitmentController::class, 'export'])->name('export_payment_commitments');
Route::put('upload_image/{payment_commitment}', [PaymentCommitmentController::class, 'uploadImage'])->name('upload_image');

Route::resource('service_provision_contracts', ServiceProvisionContractController::class)->names('service_provision_contracts');
Route::get('service_provision_contracts/{service_provision_contract}', [ServiceProvisionContractController::class, 'pdf'])->name('service_provision_contracts');
Route::get('pdf_all_service_provision_contracts', [ServiceProvisionContractController::class, 'pdfAll'])->name('pdf_all_service_provision_contracts');
Route::post('export_service_provision_contracts', [ServiceProvisionContractController::class, 'export'])->name('export_service_provision_contracts');
Route::put('upload_image_contract/{service_provision_contract}', [ServiceProvisionContractController::class, 'uploadImage'])->name('upload_image_contract');

Route::resource('euthanasias', EuthanasiaController::class)->names('euthanasias');
Route::get('euthanasias/{euthanasia}', [EuthanasiaController::class, 'pdf'])->name('euthanasias');
Route::get('pdf_all_euthanasias', [EuthanasiaController::class, 'pdfAll'])->name('pdf_all_euthanasias');
Route::post('export_euthanasias', [EuthanasiaController::class, 'export'])->name('export_euthanasias');
Route::put('upload_image_euthanasia/{euthanasia}', [EuthanasiaController::class, 'uploadImage'])->name('upload_image_euthanasia');

Route::resource('anesthesia_surgeries', AnesthesiaSurgeriesController::class)->names('anesthesia_surgeries');
Route::get('anesthesia_surgeries/{anesthesia_surgery}', [AnesthesiaSurgeriesController::class, 'pdf'])->name('anesthesia_surgeries');
Route::get('pdf_all_anesthesia_surgeries', [AnesthesiaSurgeriesController::class, 'pdfAll'])->name('pdf_all_anesthesia_surgeries');
Route::post('export_anesthesia_surgeries', [AnesthesiaSurgeriesController::class, 'export'])->name('export_anesthesia_surgeries');
Route::put('upload_image_anesthesia_surgery/{anesthesia_surgery}', [AnesthesiaSurgeriesController::class, 'uploadImage'])->name('upload_image_anesthesia_surgery');

Route::resource('sedation_anesthesias', SedationAnesthesiaController::class)->names('sedation_anesthesias');
Route::get('sedation_anesthesias/{sedation_anesthesia}', [SedationAnesthesiaController::class, 'pdf'])->name('sedation_anesthesias');
Route::get('pdf_all_sedation_anesthesias', [SedationAnesthesiaController::class, 'pdfAll'])->name('pdf_all_sedation_anesthesias');
Route::post('export_sedation_anesthesias', [SedationAnesthesiaController::class, 'export'])->name('export_sedation_anesthesias');
Route::put('upload_image_sedation_anesthesia/{sedation_anesthesia}', [SedationAnesthesiaController::class, 'uploadImage'])->name('upload_image_sedation_anesthesia');

Route::resource('internments', InternmentController::class)->names('internments');
Route::get('internments/{internment}', [InternmentController::class, 'pdf'])->name('internments');
Route::get('pdf_all_internments', [InternmentController::class, 'pdfAll'])->name('pdf_all_internments');
Route::post('export_internments', [InternmentController::class, 'export'])->name('export_internments');
Route::put('upload_image_internment/{internment}', [InternmentController::class, 'uploadImage'])->name('upload_image_internment');

Route::get('notifications', [PaymentCommitmentController::class, 'notifications'])->name('notifications');
Route::post('checkNotification/{notification}', [PaymentCommitmentController::class, 'checkNotification'])->name('checkNotification');

Route::get('markAllAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAllAsRead');

Route::get('reports', [ReportController::class, 'main'])->name('reports');
Route::post('/reports/pdf-client', [ReportController::class, 'generatePdfForClient'])->name('reports_pdf_client');
Route::post('/reports/conctract', [ReportController::class, 'generatePdfForContract'])->name('reports_pdf_contract');
Route::post('/reports/euthanasia', [ReportController::class, 'generatePdfForEuthanasia'])->name('reports_pdf_euthanasia');
Route::post('/reports/anesthesia_surgeries', [ReportController::class, 'generatePdfForAnesthesiaSurgeries'])->name('reports_pdf_anesthesia_surgeries');
Route::post('/reports/sedation_anesthesia', [ReportController::class, 'sedationAnesthesia'])->name('reports_pdf_sedation_anesthesia');
Route::post('/reports/internments', [ReportController::class, 'generatePdfForInternments'])->name('reports_pdf_internments');

Route::resource('users', UserController::class)->names('users');
});


