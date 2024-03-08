<?php

namespace App\Http\Controllers;

use App\Models\AnesthesiaSurgeries;
use App\Models\Animal;
use App\Models\ClinicalRecord;
use App\Models\Euthanasia;
use App\Models\Internment;
use App\Models\SedationAnesthesia;
use App\Models\ServiceProvisionContract;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:dashboard.index')->only('index');
    }

    public function index(){
        $anesthesiaSurgeries = AnesthesiaSurgeries::count();
        $clinicalRecords = ClinicalRecord::count();
        $euthanasias = Euthanasia::count();
        $internments = Internment::count();
        $sedationAnesthesias = AnesthesiaSurgeries::count();
        $serviceProvisionContracts = ServiceProvisionContract::count();

        // chart js por genero
        $anesthesiaSurgeriesMales = AnesthesiaSurgeries::whereHas('animal', function ($query) {$query->where('gender', 'Macho');})->with('animal')->count();
        $anesthesiaSurgeriesFemales = AnesthesiaSurgeries::whereHas('animal', function ($query) {$query->where('gender', 'Hembra');})->with('animal')->count();
        $clinicalRecordsMales = ClinicalRecord::whereHas('animal', function ($query){$query->where('gender', 'Macho');})->with('animal')->count();
        $clinicalRecordsFemales = ClinicalRecord::whereHas('animal', function ($query){$query->where('gender', 'Hembra');})->with('animal')->count();

        $euthanasiasMales = Euthanasia::whereHas('animal', function ($query){$query->where('gender', 'Macho');})->with('animal')->count();
        $euthanasiasFemales = Euthanasia::whereHas('animal', function ($query){$query->where('gender', 'Hembra');})->with('animal')->count();

        $internmentsMales = Internment::whereHas('animal', function ($query){$query->where('gender', 'Macho');})->with('animal')->count();
        $internmentsFemales = Internment::whereHas('animal', function ($query){$query->where('gender', 'Hembra');})->with('animal')->count();

        $sedationAnesthesiasMales = SedationAnesthesia::whereHas('animal', function ($query){$query->where('gender', 'Macho');})->with('animal')->count();
        $sedationAnesthesiasFemales = SedationAnesthesia::whereHas('animal', function ($query){$query->where('gender', 'Hembra');})->with('animal')->count();

        $serviceProvisionContractsMales = ServiceProvisionContract::whereHas('animal', function ($query){$query->where('gender', 'Macho');})->with('animal')->count();
        $serviceProvisionContractsFemales = ServiceProvisionContract::whereHas('animal', function ($query){$query->where('gender', 'Hembra');})->with('animal')->count();

        return view('dashboard.index', compact('anesthesiaSurgeries', 'clinicalRecords', 'euthanasias', 'internments', 'sedationAnesthesias', 'serviceProvisionContracts', 'anesthesiaSurgeriesMales', 'anesthesiaSurgeriesFemales', 'clinicalRecordsMales', 'clinicalRecordsFemales', 'euthanasiasMales', 'euthanasiasFemales', 'internmentsMales', 'internmentsFemales', 'sedationAnesthesiasMales', 'sedationAnesthesiasFemales', 'serviceProvisionContractsMales', 'serviceProvisionContractsFemales'));
    }
}
