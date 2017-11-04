<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Unit;
class UnitDebtsNotifyer extends Mailable
{
    use Queueable, SerializesModels;
    public $unit;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('finance@ghazala-bay.com')
                    ->subject('Unit debts')
                    ->cc('mohibrahimqop@gmail.com')
                    ->markdown('emails.reports.units.unit_debts_notifyer');
    }
}
