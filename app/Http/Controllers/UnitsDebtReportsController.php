<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Unit;
use Mail;
use App\Mail\UnitDebtsNotifyer;
use PDF;

class UnitsDebtReportsController extends Controller 
{
	public function getDebtsNotifier()
	{
		$units = Unit::latest()->get();
		return view('reports.units_debts.debts_notifier', compact('units'));
	}


	public function notify(Request $request)
	{
		$this->validate(
			$request,
			['units_ids'=>'required', 'notifier_type'=>'required'],
			[
				'units_ids.required'=>'برجاء أختر الوحدة المراد إعلامها بالمديونية المستحقة',
				'notifier_type.required'=>'برجاء أختر نوع العملية',
			]
		);
		
		$notifierType = $request->input('notifier_type');
		$unitsIds = $request->input('units_ids');
		if (isset($notifierType) ) {
			if ($notifierType == 'email') {
				$this->notifyAsEmail($unitsIds, $request);
				flash()->success('تم الإرسال بنجاح')->important();
				return redirect()->action('UnitsDebtReportsController@getDebtsNotifier');
			} elseif ($notifierType == 'pdf') {
				$units = Unit::findOrFail($unitsIds);
				$pdf = PDF::loadView('pdf.reports.units.unit_debts_notifyer', compact('units'));
				return $pdf->download('test.pdf');
			}
		}		
	}

	private function notifyAsEmail(array $unitsIds, Request $request)
	{
		foreach ($unitsIds as $arrayKey=>$id) {
			$unit = Unit::findOrFail($id);
			if ($unit->owners->isNotEmpty()) {
				foreach ($unit->owners as $owner) {
					if (!empty($owner->email)) {											
						Mail::to($owner->email)->send(new UnitDebtsNotifyer($unit, $owner));
					} else {
						return redirect()
							->back()
							->withInput($request->input())
							->withErrors(['المالك: <strong>'.$owner->name.'.</strong> ليس له بريد اللكتروني']);
					}
				}
			} else {
				return redirect()
					->back()
					->withInput($request->input())
					->withErrors(['الوحدة رقم: <strong>'.$unit->code.'</strong> بدون مالك']);
			}
			// Delete current Unit ID from units_ids input to not conflict 
			// with returned other inputs if owner not have email and error happened.
			unset($unitsIds[$arrayKey]);								
			$request['units_ids'] = $unitsIds;
		}
	}


	public function notifyAsPdf()
	{
		
	}

	
}
