<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Unit;
use App\Owner;
class UnitDebtsNotifyer extends Mailable
{
	use Queueable, SerializesModels;
	public $unit;
	public $owner;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Unit $unit, Owner $owner)
	{
		$this->unit = $unit;
		$this->owner = $owner;
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
