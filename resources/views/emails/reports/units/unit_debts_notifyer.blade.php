@component('mail::message')

<div style="direction: rtl; float:right;">	
	<h3 style="text-align: right;"> السيد / {{ $owner->name }}</h3>
	<h3 style="text-align: right;"> مالك الوحدة رقم / {{ $unit->code }}</h3>
	<h2 style="text-align: right; text-decoration: underline;"> الموضوع/ مطالبات مصروفات صيانة عام.</h2>
	<h5 style="text-align: center; "> تحية طيبة وبعد ،،،</h5>
	<h5 style="text-align: right; "> بناءاً على قرارت الجمعية العمومية المنعقدة يقوم مجلس الإدارة بإرسال مطالبات وكشف الحساب الوحدة </h5>
	<h5 style="text-align: right; "> نحيط سيادتكم علماً بأن المستحق على سيادتكم حتى مطالب كاللأتي: </h5>
</div>

@component('mail::table')
|        		| القــــيمة  						| البـــند				|	
| ------------- 	|----------:						| --------:					|
| 	      	| {{$unit->unit_expenses}} EGP 				|:مصاريف الوحدة	 		|
|       		| {{$unit->garden_maintenance_expenses}}  EGP	|:مصاريف صيانة الحدائق    		|
|       		| {{$unit->staff_housing_expenses}}  EGP		|:مصاريف سكن العاملين    		|
|       		| {{$unit->debt_benefits}}  EGP				|:فوائد الدين 		    		|
|       		| {{$unit->balances_of_previous_years}}  EGP		|أرصدة سنوات آخرى 	    		|
|		|-----------						|					|
|       		| {{$unit->the_current_unit_debt}}  EGP			|:إجمالي المديونية المستحقة 	|
|       		| {{$unit->date_of_indebtedness->format('d-M-Y')}} 	|:تاريخ المديونية 	   		|
@endcomponent

<div style="direction: rtl; float:right;">	
	
	<h5 style="text-align: right; "> رجاء التكرم بسرعة السداد نقداً/شيكات أو عن طريق البنك أو بتحويل بنكي </h5>
	<h5 style="text-align: right; "> البنك/: بنك تنمية الصادرات </h5>
	<h5 style="text-align: right; "> رقم الحساب/: 1601400200610101 </h5>
	<h5 style="text-align: right; "> سويفت كود/: EXDEEGCXRSH </h5>
	<h5 style="text-align: right;text-decoration: underline; "> ونرحب بأستفساركم عن طريق الاستاذة/ فاتن حامد - مسئول حساب العملاء تليفون رقم: 01211189900 </h5>
	<h5 style="text-align: center; "> ولسيادتكم جزيل الشكر ،،</h5>
	
</div>

@component('mail::table')
|        						| 		  											| 											|	
| :-------------: 				|----------:										| :--------:								|
|<strong>رئيس الأتحاد</strong>	| 													|<strong>أمين الصندوق</strong>	 		   	|
|د/ على المصيلحي				|  													|أشرف إسكندر 								|
@endcomponent

@component('mail::table')
|        													| 		  											| 																|	
| :------------- 											|----------:										| --------:														|
|<h6> Website: www.ghazala-bay.com<br>E-Mail: faten_taha@ymail.com<br>E-Mail: ghazalabayresort@ymail.com<br>Facebook page: facebook.com/GhazalaBay.official</h6>| 													|<h6>عنوان: 30 شارع لبنان المهندسين - الدور 6 - الجيزة<br>الكيلو 142 إسكندرية مطروح - الساحل الشمالي	<br>ت: 	4190121-046<br>فاكس: 	4190251-046<br>محمول: 01211189900</h6>|


@endcomponent

							


@endcomponent