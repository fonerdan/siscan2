<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCommitment\StoreRequest;
use App\Http\Requests\PaymentCommitment\UpdateRequest;
use App\Models\Client;
use App\Models\PaymentCommitment;
use App\Notifications\Paid;
use Illuminate\Http\Request;

class PaymentCommitmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:payment_commitments.index')->only('index');
        $this->middleware('can:payment_commitments.create')->only('create', 'store');
        $this->middleware('can:payment_commitments.edit')->only('edit', 'update');
        $this->middleware('can:payment_commitments.destroy')->only('destroy');
    }

    public function index()
    {
        $payment_commitments = PaymentCommitment::with('client')->get();
        return view('payment_commitments.index', compact('payment_commitments'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('payment_commitments.create', compact('clients'));
    }

    public function store(StoreRequest $request)
    {
        $data = PaymentCommitment::create([
                'client_id' => $request->client_id,
                'user_id' => auth()->id(),
                'date' => $request->date,
                'amount' => $request->amount,
                'initial_date' => $request->initial_date,
                'final_date' => $request->final_date,
            ]);

        if ($data->shouldSendNotification()) {
            auth()->user()->notify(new Paid($data));
            notyf()->duration(2000)->position('y', 'top')->addWarning('Se ha enviado una notificación al cliente');
        }
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Compromiso de pago creado con éxito');
        return redirect()->route('payment_commitments.index');
    }

    public function pdf(PaymentCommitment $payment_commitment)
    {
        $numeroALetras = new \Luecano\NumeroALetras\NumeroALetras();
        $numero = $numeroALetras->toWords($payment_commitment->amount);

        $pdf = \PDF::loadView('payment_commitments.pdf', compact('payment_commitment', 'numero'));
        return $pdf->stream('payment_commitment.pdf');
    }

    public function pdfAll()
    {
        $payment_commitments = PaymentCommitment::with('client')->get();
        $pdf = \PDF::loadView('payment_commitments.pdf_all', compact('payment_commitments'));
        return $pdf->stream('payment_commitments.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $payment_commitments = PaymentCommitment::with('client')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('payment_commitments.export', compact('payment_commitments'));
        return $pdf->stream('payment_commitments.pdf');
    }

    public function showNotification($clientId){
        $client = Client::find($clientId);
        $client->notify(new Paid($client->paymentCommitments));
    }
    public function edit(PaymentCommitment $paymentCommitment)
    {
        $clients = Client::all();
        $selectedClientId = $paymentCommitment->client->id;
        return view('payment_commitments.edit', compact('paymentCommitment', 'clients', 'selectedClientId'));
    }
    public function update(UpdateRequest $request, PaymentCommitment $paymentCommitment)
    {
        $paymentCommitment->update([
            'client_id' => $request->client_id,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Compromiso de pago actualizado con éxito');
        return redirect()->route('payment_commitments.index');
    }

    public function destroy(PaymentCommitment $paymentCommitment)
    {
        $paymentCommitment->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Compromiso de pago eliminado con éxito');
        return redirect()->route('payment_commitments.index');
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications;
        return view('payment_commitments.notifications', compact('notifications'));
    }

    public function checkNotification($notification)
    {
        $notification = auth()->user()->notifications()->find($notification);
        $notification->markAsRead();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Notificación marcada como leída');
        return redirect()->back();
    }

    public function uploadImage(Request $request, PaymentCommitment $paymentCommitment)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/payment_commitment_images/', $name);
        }
        $paymentCommitment = PaymentCommitment::find($paymentCommitment->id);
        $paymentCommitment->photo = $name;
        $paymentCommitment->save();

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Comprobante subido con éxito');
        return redirect()->back();
    }
}
