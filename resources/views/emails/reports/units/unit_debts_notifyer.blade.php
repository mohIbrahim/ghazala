@component('mail::message')
![alt text](https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Title Text 1")
<div style="direction: rtl; float:right;">
	<img src="http://www.ghazala-bay.com/assets/asset-1422809375490.png?v=0.8567256918177009">
	<h3 style="text-align: right;"> السيد / {{ $owner->name }}</h3>
	<h3 style="text-align: right;"> مالك الوحدة رقم / {{ $unit->code }}</h3>
	<h2 style="text-align: right; text-decoration: underline;"> الموضوع/ مطالبات مصروفات صيانة عام.</h2>
	<h5 style="text-align: center; "> تحية طيبة وبعد ،،،</h5>
	<h5 style="text-align: right; "> بناءاً على قرارت الجمعية العمومية المنعقدة يقوم مجلس الإدارة بإرسال مطالبات وكشف الحساب الوحدة </h5>
	<h5 style="text-align: right; "> نحيط سيادتكم علماً بأن المستحق على سيادتكم حتى مطالب كاللأتي: </h5>
</div>

@component('mail::table')
|        		| القيمة  	| البند  			|
| ------------- 	|-------------:	| --------:				|
|       		| 88288 	|:مصاريف الوحدة	    	|
|       		| 88288 	|:مصاريف صيانة الحدائق    	|
|       		| 88288 	|:مصاريف سكن العاملين    	|
|       		| 88288 	|:فوائد الدين 		    	|
|       		| 88288 	|:أرصدة سنوات آخرى 	    	|
|       		| 88288 	|:المديونية المستحقة    	|
|       		| 88288 	|:تاريخ المديونية 	   	|
@endcomponent

@component('mail::button', ['url' => 'http://www.ghazala-bay.com/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
