<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PaymentCommitment extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['client_id', 'date', 'amount', 'user_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shouldSendNotification(): bool
    {
        $threeDaysBefore = Carbon::parse($this->date)->subDays(3);
        $threeDaysAfter = Carbon::parse($this->date)->addDays(3);

        return now()->between($threeDaysBefore, $threeDaysAfter);
    }
}
