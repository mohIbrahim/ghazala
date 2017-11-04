@component('mail::message')

<div style="direction: rtl; float: right">
	{{$unit->code}}
</div>




@component('mail::button', ['url' => 'http://www.ghazala-bay.com/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
