<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function main()
    {
        $condition = false;
        $clients = Client::all();
        return view('reports.index', compact('clients', 'condition'));
    }
    public function generatePdfForClient(Request $request)
    {
        $clientId = $request->input('client_id');
        $client = Client::with('clinicalRecords')->find($clientId);
        $pdf = \PDF::loadView('reports.export', ['client' => $client, 'clinicalRecords' => $client->clinicalRecords]);
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function generatePdfForContract(Request $request)
    {
        $clientId = $request->input('client_id');
        $client = Client::with('serviceProvisionContracts')->find($clientId);
        $pdf = \PDF::loadView('reports.export_contract', ['client' => $client, 'serviceProvisionContracts' => $client->serviceProvisionContracts]);
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function generatePdfForEuthanasia(Request $request)
    {
        $clientId = $request->input('client_id');
        $client = Client::with('euthanasias')->find($clientId);
        $pdf = \PDF::loadView('reports.export_euthanasia', ['client' => $client, 'euthanasias' => $client->euthanasias]);
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function generatePdfForAnesthesiaSurgeries(Request $request)
    {
        $clientId = $request->input('client_id');
        $client = Client::with('anesthesiaSurgeries')->find($clientId);
        $pdf = \PDF::loadView('reports.export_anesthesia_surgeries', ['client' => $client, 'anesthesiaSurgeries' => $client->anesthesiaSurgeries]);
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function sedationAnesthesia(Request $request)
    {
        $clientId = $request->input('client_id');
        $client = Client::with('sedationAnesthesias')->find($clientId);
        $pdf = \PDF::loadView('reports.export_sedation_anesthesia', ['client' => $client, 'sedationAnesthesias' => $client->sedationAnesthesias]);
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

    public function generatePdfForInternments(Request $request)
    {
        $clientId = $request->input('client_id');
        $client = Client::with('internments')->find($clientId);
        $pdf = \PDF::loadView('reports.export_internments', ['client' => $client, 'internments' => $client->internments]);
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('report.pdf');
    }

}
