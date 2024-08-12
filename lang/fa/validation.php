<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    'accepted_if'      => 'هنگامی که :other، :value است باید با :attribute توافق کنید.',
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    'after_or_equal'   => ':attribute باید بعد از یا برابر تاریخ :date باشد.',
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "ascii"            => ":attribute .باید شامل کاراکترها و نمادهای الفبایی تک بایتی باشد",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    'before_or_equal' => ':attribute باید قبل از یا برابر تاریخ :date باشد.',
    "between"          => [
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ],
    "boolean"          => "فیلد :attribute فقط میتواند صحیح و یا غلط باشد",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    'current_password'         => 'رمز عبور اشتباه است.',
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    'date_equals'      => ':attribute باید برابر تاریخ :date باشد.',
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    'declined'         => ':attribute باید پذیرفته نشود.',
    'declined_if'      => 'هنگامی که :other، :value است باید با :attribute نپذیرید.',
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    'dimensions'       => 'dimensions مربوط به فیلد :attribute اشتباه است.',
    'distinct'         => ':attribute مقدار تکراری دارد.',
    'doesnt_end_with'  => ':attribute نباید با یکی از موارد :values تمام شود.',
    'doesnt_start_with'  => ':attribute نباید با یکی از موارد :values شروع شود.',
    "email"            => "فرمت :attribute معتبر نیست.",
    'ends_with'        => ':attribute باید با این مقدار تمام شود: :values.',
    "enum"             => ":attribute انتخاب شده، معتبر نیست.",
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    'file' 	       => 'فیلد :attribute باید فایل باشد.',
    "filled"           => "فیلد :attribute الزامی است",
    'gt' => [
        'numeric' => ':attribute باید بیشتر از :value باشد.',
        'file'    => ':attribute باید بیشتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر از :value کاراکتر باشد.',
        'array'   => ':attribute باید بیشتر از :value ایتم باشد.',
    ],
    'gte' => [
        'numeric' => ':attribute باید بیشتر یا برابر :value باشد.',
        'file'    => ':attribute باید بیشتر یا برابر :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر یا برابر :value کاراکتر باشد.',
        'array'   => ':attribute باید :value ایتم یا بیشتر را داشته باشد.',
    ],
    "image"            => ":attribute باید تصویر باشد.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    "integer"          => ":attribute باید نوع داده ای عددی (عدد صحیح) باشد.",
    'in_array'         => 'فیلد :attribute در :other موجود نیست.',
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    'ipv4'             => ':attribute باید یک ادرس درست IPv4 باشد.',
    'ipv6'             => ':attribute باید یک ادرس درست IPv6 باشد.',
    'json'             => ':attribute یک مقدار درست JSON باشد.',
    'lt' => [
        'numeric' => ':attribute باید کمتر از :value باشد.',
        'file'    => ':attribute باید کمتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر از :value کاراکتر باشد.',
        'array'   => ':attribute باید :value ایتم یا کمتر را داشته باشد.',
    ],
    'lte' => [
        'numeric' => ':attribute باید کمتر یا برابر :value باشد.',
        'file'    => ':attribute باید کمتر یا برابر :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر یا برابر :value کاراکتر باشد.',
        'array'   => ':attribute باید :value ایتم یا کمتر را داشته باشد.',
    ],
    "mac_address"           => ":attribute باید یک مک آدرس معتبر باشد.",
    "max"              => [
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ],
    "max_digits"       => ":attribute نباید بیشتر از :max رقم داشته باشد.",
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    'mimetypes'        => ':attribute باید تایپ ان از نوع: :values باشد.',
    "min"              => [
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ],
    "min_digits"       => ":attribute نباید کمتر از :min رقم داشته باشد.",
    "missing"           => ":attribute باید از دست رفته باشد.",
    "missing_if"           => ":attribute نباید وجود داشته باشد تا زمانی که :other :value باشد.",
    "missing_unless"           => ":attribute نباید وجود داشته باشد یا اینکه :other :value باشد.",
    "missing_with"           => ":attribute باید در صورت :value وجود نداشته باشد.",
    "missing_with_all"           => ":attribute باید در صورت تمامی :value وجود نداشته باشد.",
    'multiple_of'      => ':attribute باید ضریبی از :value باشد.',
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    'not_regex'        => ':attribute فرمت معتبر نیست.',
    "numeric"          => ":attribute باید شامل عدد باشد.",
    'password' => [
        'letters' => ':attribte باید حدقل شامل یک حرف باشد.',
        'mixed' => ':attribte باید حداقل یک حرف بزرگ یا یک حرف کوچک انگلیسی را شامل باشد.',
        'numbers' => ':attribte باید حداقل شامل یک عدد باشد.',
        'symbols' => ':attribte باید حداقل شامل یک نماد یا نشان(سمبل) باشد ',
        'uncompromised' => ':attribte وارد شده سازگار ندارد. لطفا :attribute دیگری را امتحان کنید.',
    ],
    'present'          => ':attribute باید وجود داشته باشد.',
    'prohibited'       => 'فیلد :attribute ممنوع است.',
    'prohibited_if'    => 'هنگام که :other، :value است فیلد :attribute ممنوع است.',
    'prohibited_unless' => ':attribute ممنوع است مگر اینکه :other برابر با (:values) باشد.',
    'prohibits'        => 'هنگام ورود فیلد :attribute، وارد کردن فیلد :other ممنوع است.',
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => "فیلد :attribute الزامی است",
    "required_array_keys" => ":attribute باید شامل ورودی هایی برای :for :values باشد.",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_if_accepted" => ":attribute زمانی الزامی میباشد که :other پذیرفته شود.",
    'required_unless'  => 'قیلد :attribute الزامیست مگر این فیلد :other مقدارش  :values باشد.',
    "required_with"    => ":attribute الزامی است تا زمانی که :values موجود است.",
    "required_with_all" => ":attribute الزامی است تا زمانی که همه :values ها موجود است.",
    "required_without" => ":attribute الزامی است تا زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است تا زمانی که :values ها موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => [
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ],
    'starts_with'      => ':attribute باید با یکی از این مقادیر شروع شود: :values.',
    "string"           => ":attribute باید رشته باشد.",
    "timezone"         => "فیلد :attribute باید یک منطقه صحیح باشد.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    'uploaded'         => 'فیلد :attribute به درستی اپلود نشد.',
    "url"              => "فرمت آدرس :attribute اشتباه است.",
    'ulid'             => ':attribute باید یک فرمت درست ULID باشد.',
    'uuid'             => ':attribute باید یک فرمت درست UUID باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        "name" => "نام",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "family" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "city" => "شهر",
        "province" => "استان",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "telephone" => "تلفن ثابت",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "birthday" => "تاریخ تولد",
        "birthdate" => "تاریخ تولد",
        "married" => "متاهل",
		"single" => "مجرد",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
        "volume" => "حجم",
		"file" => "فایل",
		"fullname" => "نام کامل",
        "melli_code" => "کد ملی",
        "national_number" => "کد ملی",
        "postal_code" => "کد پستی",
        "zip_code" => "کد پستی",
        "passport_number" => "شماره پاسپورت",
        "passport_no" => "شماره پاسپورت",
		"sheba_number" => "شماره شبا",
		"iban" => "شماره شبا",
		"accountـnumber" => "شماره حساب",
        "national_code" => "کد ملی",
        "token" => "کد",
        "type" => "نوع",
        "admin_id" => "ادمین",
        "parent_id" => "والد",
        "users" => "کاربران",
        "users.*" => "کاربر با شماره",
        "panel_id" => "پنل",
        "is_show" => "وضعیت نمایش",
        "permissions" => "دسترسی ها",
        "user_id" => "کاربر",
        "contact_group_id" => "گروه مخاطبین",
        "contacts" => "مخاطبین",
        "contacts.*" => "مخاطب",
        "is_confirmed" => "تایید",
        "contact_id" => "مخاطب",
        "to_user_id" => "کاربر ارسالی",
        "ticket_id" => "تیکت",
        "status" => "وضعیت",
        "prefix_number" => "پیش شماره",
        "cost" => "هزینه",
        "length" => "طول",
        "total_page" => "تعداد صفحه",
        "type_lang" => "نوع زبان",
        "provider_id" => "ارائه دهنده",
        "length_number" => "طول شماره",
        "price" => "قیمت",
        "number" => "شماره",
        "line_id" => "شماره",
        "panel_line_id" => "خط پنل",
        "receiver_phone" => "شماره گیرنده",
        "amount" => "مقدار",
        "reference_type" => "نام مرجع",
        "reference_id" => "شماره مرجع",
        "debtor" => "بدهکار",
        "creditor" => "بستانکار",
        "details" => "جزئیات",
        "details.description" => "توضیحات",
        "details.meta_data" => "داده",
        "details.ref_number" => "شماره رفرنس",
        "send_time" => "زمان ارسال",
        "receiver_phones" => "لیست تلفن همراه ها",
        "receiver_contacts" => "مخاطبین",
        "receiver_file" => "فایل گیرنده ها",
        "national_card" => "کارت ملی",
        "send_number" => "شماره فرستنده",
        "line_number" => "سرشماره",
        "start_time" => "زمان شروع",
        "end_time" => "زمان پایان",
        "receive_line_id" => "شماره دریافت کننده",
        "receive_phones_id" => "تلفن های دریافتی",
        "key_word" => "کلمه کلیدی",
        "send_line_id" => "سر شماره فرستنده",
        "detail_id" => "شناسه جزئیات",
        "faxNumber" => "شماره فکس",
        "typeId" => "نوع شرکت",
        "stateId" => "استان",
        "cityId" => "شهر",
        "companyCode" => "کد شرکت",
        "code" => "کد",
        "isDefault" => "پیشفرض",
        "isActive" => "فعال",
        "fullDistance" => "مسافت پر",
        "emptyDistance" => "مسافت خالی",
        "shippingContractId" => "قرارداد حمل",
        "way" => "راه",
        "turn" => "نوبت",
        "repairs"=> "تعمیرات",
        "parking"=> "پارکینگ",
        "penalty"=> "جریمه",
        "examination"=> "معاینه",
        "weighbridge"=> "باسکول",
        "escort"=> "اسکورت",
        "complications"=> "عوارض",
        "traffic"=> "ترافیک",
        "tip"=> "انعام",
        "loadingAndUnloading"=> "بارگیری و تخلیه",
        "entranceToTown"=> "ورود به شهرک",
        "loadScan"=> "اسکن بار",
        "ventilatorVentilation"=> "تهویه هوا",
        "travelId"=> "سفر",
        "travelType" => "نوع سفر",
        "origin" => "مبدا",
        "destination" => "مقصد",
        "startDate" => "زمان شروع",
        "freight" => "کرایه",
        "senderId" => "فرستنده",
        "senderName" => "نام فرستنده",
        "senderNationalCode" => "کدملی فرستنده",
        "senderAddress" => "آدرس مبدا",
        "receiverId" => "گیرنده",
        "receiverName" => "نام گیرنده",
        "receiverNationalCode" => "کد ملی گیرنده",
        "receiverAddress" => "آدرس مقصد",
        "firstDriverId" => "راننده اول",
        "firstDriverName" => "نام راننده اول",
        "firstDriverNationalcode" => "کدملی راننده اول",
        "firstDriverPersonalCode" => "کدپرسنلی راننده اول",
        "secondDriverId" => "راننده دوم",
        "secondDriverName" => "نام راننده دوم",
        "secondDriverNationalcode" => "کدملی راننده دوم",
        "secondDriverPersonalCode" => "کدپرسنلی راننده دوم",
        "cargoType" => "نوع محموله",
        "cargoDescription" => "شرح محموله",
        "packingType" => "نوع بسته بندی",
        "weightInOrigin" => "وزن در مبدا",
        "weightInDestination" => "وزن در مقصد",
        "weightDeductions" => "کسورات وزنی",
        "numberInOrigin" => "تعداد در مبدا",
        "numberInDestination" => "تعداد در مقصد",
        "numberDeductions" => "کسورات تعدادی",
        "waybillNumber" => "شماره بارنامه",
        "waybillSeries1" => "بخش اول سریال بارنامه",
        "waybillSeries2" => "بخش دوم سریال بارنامه",
        "timeIssue" => "تاریخ صدور",
        "freightType" => "نوع کرایه",
        "baseFreightFee" => "کرایه پایه",
        "loadingFee" => "بارگیری",
        "weighbridgeFee" => "باسکول",
        "complicationsFee" => "عوارض",
        "supplementaryInsuranceFee" => "بیمه تکمیلی",
        "insuranceAmountFee" => "بیمه",
        "insuranceTaxFee" => "مالیات بیمه",
        "commissionFee" => "کمسیون",
        "preFreightFee" => "پیش کرایه",
        "payableFee" => "قابل پرداخت",
        "valueAddedTax" => "ارزش افزوده",
        "otherFee" => "سایر",
        "driverPaymentFee" => "پرداختی راننده",
        "other1" => "سایر 1",
        "other2" => "سایر 2",
        "other3" => "سایر 3",
        "other1.name" => "نام سایر 1",
        "other1.value" => "مقدار سایر 1",
        "other2.name" => "نام سایر 2",
        "other2.value" => "مقدار سایر 2",
        "other3.name" => "نام سایر 3",
        "other3.value" => "مقدار سایر 3",
        "distance" => "فاصله",
        "truckId" => "ناوگان",
        "loadingTypeId" => "بارگیر",
        "distanceType" => "نوع مسافت",
        "dosage" => "میزان مصرف",
        "originId" => "مبدا",
        "destinationId" => "مقصد",
        "packingTypeId" => "بسته بندی",
        "fuel" => "سوخت",
        "extraFuel" => "مازاد سوخت",
        "typeCalculateId" => "نحوه محاسبه حق سرویس",
        "metaKey" => "کلید",
        "metaValue" => "مقدار",
        "items.*.to" => "مقدار تا",
        "items.*.from" => "از مقدار",
        "items.*.value" => "مقدار",
        "items.*.percent" => "درصد",
        "serviceFeeGroupId" => "گروه حق سرویس",
        "originStateId" => "استان مبدا",
        "destinationStateId" => "استان مقصد",
        "originCountyId" => "شهرستان مبدا",
        "destinationCountyId" => "شهرستان مقصد",
        "originCityId" => "شهر مبدا",
        "destinationCityId" => "شهر مقصد",
        "items.*.metaValue" => "مقدار آیتم",
        "items.*.metaKey" => "نام آیتم",
        "items.*.destinationId" => "مقصد",
        "items.*.originId" => "مبدا",
        "items.*.typeId" => "نوع",
        "truckLoadingType" => "نوع بارگیر",
        "accumulativeTypeId" => "نوع تجمیعی",
        "onTravelTypeId" => "نوع روی هر بارنامه",
        "accumulativeDescription" => "توضیحات تجمیعی",
        "onTravelDescription" => "توضیحات روی هر بارنامه",
        "driverId" => "راننده",
        "image" => "تصویر",
        "nationalCode" => "کدملی",
        "firstName" => "نام",
        "lastName" => "نام خانوادگی",
        "fatherName" => "نام پدر",
        "idNumber" => "شماره شناسنامه",
        "birthDate" => "تاریخ نولد",
        "idRegisterPlace" => "محل صدور",
        "organizational_unit_id" => "واحد سازمانی",
        "organizational_unit" => "واحد سازمانی",
        "start" => "شروع",
        "mail" => "ایمیل",
        "person_id" => "کاربر",
        "person" => "کاربر",
        "duration" => "مدت",
        "institution" => "آموزشگاه",
        "educational_record_type" => "نوع دوره آموزشی",
        "average" => "معدل",
        "position" => "موقعیت",
        "committeeDate" => "تاریخ تشکیل",
        "decision" => "تصمیم",
        "subject" => "موضوع",
        "registerDate" => "تاریخ",
        "signatory" => "امضا کننده",
        "company" => "شرکت",
        "buy_date" => "تاریخ خرید",
        "start_date" => "تاریخ شروع",
        "end_date" => "تاریخ پایان",
        "financial_commitment" => "تعهد مالی",
        "life_commitment" => "تعهد جانی",
        "driver_commitment" => "تعهد حوادث راننده",
        "all_discount" => "تخفیفات",
        "discount" => "تخفیف",
        "system_rate" => "نرخ سیستم",
        "non_accident_discount" => "تخفیف عدم خسارت",
        "zero_discount" => "تخفیف صفر کیلومتر",
        "number_accident" => "تعدد خسارت",
        "obsolescence" => "کهنگی",
        "risk_aggravation_additions" => "اضافات تشدید خطر",
        "fund_penalty" => "جریمه صندوق",
        "property_id" => "شناسه اموال",
        "tax" => "مالیات",
        "health_complications" => "عوارض بهداشت",
        "sum" => "جمع",
        "register_name" => "نام بیمه گذار",
        "register_phone" => "تلفن بیمه گذار",
        "register_address" => "آدرس بیمه گذار",
        "reseller_address" => "آدرس نمایندگی",
        "reseller_name" => "شعبه",
        "reseller_phone" => "تلفن شعبه",
        "issue_date" => "زمان صدور",
        "reseller_issuing_unit" => "واحد صدور",
        "register_nationalcode" => "کدملی بیمه گذار",
        "axisNumber" => "تعداد محور",
        "brakeSystem" => "سیستم ترمز",
        "isPlaceRole" => "جارولی",
        "serialNumber" => "شماره سریال",
        "serial" => "سریال",
        "spareBrand" => "برند",
        "suspension" => "سیستم تعلق",
        "tiresNumber" => "تعداد تایر",
        "trailerType" => "نوع تریلر",
        "collector" => "جمع دار",
        "property" => "مال",
        "economic_code" => "کد اقتصادی",
        "tel" => "تلفن",
        "interface_code" => "کد واسط",
        "transportation_code" => "کد حمل و نقل",
        "postalCode" => "کد پستی",
        "shabaNumber" => "شماره شبا",
        "accountHolderName" => "نام صاحب حساب",
        "bankName" => "نام بانک",
        "is_default" => "پیشفرض",
        "smartNumber" => "شماره هوشمند",
        "first" => "قسمت اول پلاک",
        "system" => "سیستم",
        "model" => "تیپ",
        "chassisNumber" => "شماره شاسی",
        "third" => "قسمت سوم پلاک",
        "fourth" => "قسمت چهارم پلاک",
        "ownerStatusCode" => "نوع ناوگان",
        "motorNumber" => "شماره موتور",
        "loadingType" => "نوع بارگیر",
        "accountId" => "حساب",
        "peymentType" => "نوع پرداخت",
        "phoneNumber" => "شماره",
        "provider" => "ارائه دهنده",
        "personSecondary" => "نسبت",
        "capacity" => "ظرفیت",
        "constructionYear" => "سال ساخت",
        "manufacturingFactory" => "کارخانه سازنده",
        "engineNumber" => "شماره موتور",
        "capacityUnit" => "واحد ظرفیت",
        "bodyColor" => "رنگ بدنه",
        "color" => "رنگ",
        "carType" => "تیپ",
        "carBrand" => "برند",
        "brand" => "برند",
        "technicalCode" => "کد فنی",
        "carUsage" => "کاربری",
        "bodyNumber" => "شماره بدنه",
        "carAxlesCount" => "تعداد محور",
        "tiresCount" => "تعداد تایر",
        "tireSize" => "سایز تایر",
        "carCategory" => "نوع نقلیه",
        "non_accident" => "سال بدون خسارت",
        "state" => "استان",
        "fax" => "فکس",
        "register_national_code" => "کدملی بیمه گذار",
        "phones" => "تلفن",
        "waybillSeries" => "سریال بارنامه",
        "companyId" => "کمپانی",
        "cargoTypeId" => "نوع محموله",
        "truckSmartNumber" => "شماره هوشمند ناوگان",
        "plateFirst" => "قسمت اول پلاک",
        "plateSecond" => "قسمت دوم پلاک",
        "plateThird" => "قسمت سوم پلاک",
        "plateFourth" => "قسمت چهارم پلاک",
        "billId" => "صورتحساب",
        "sheetId" => "ّبرگه",
        "referenceType" => "مرجع",
        "referenceId" => "شناسه مرجع",
        "costs" => "هزینه ها",
        "isGlobal" => "آیا عمومی",
        "issueDate" => "تاریخ صدور",
        "height" => "ارتفاع",
        "width" => "عرض",
        "weight" => "وزن",
        "numering_code" => "کد واحد شماره گذاری",
        "discount_percent" => "درصد تخفیف",
        "isMultiAssignment" => "واگذاری چند تایی",
        "financialCode" => "کد مالی",
        "groupTypeId" => "گروهبندی",
        "coefficient" => "ضریب",
        "isDebtor" => "آیا بدهکار",
        "total" => "کل",
        "moeen" => "معین",
        "preferentialCode" => "کد تفضیلی",
        "preferentialCode2" => "کد تفضیلی 2",
        "descriptionDocument" => "شرح سند",
        "personCode" => "کد شخص",
        "unitCode" => "کد واحد",
        "fromSheetNumber" => "از شماره برگه",
        "toSheetNumber" => "تا شماره برگه",
        "receive" => "دریافت",
        "deposit" => "واریز",
        "columns" => "ستون",
        "columns.*.name" => "نام ستون",
        "columns.*.level" => "درجه ستون",
        "statusId" => "وضعیت",
        "statusDate" => "زمان ثبت وضعیت",
        "fromBillNumber" => "از شماره صورتحساب",
        "toBillNumber" => "تا شماره صورتحساب",
        "fromDate" => "از تاریخ",
        "toDate" => "تا تاریخ",
        "deductionCost" => "هزینه کسورات",
        "deductionFormula" => "فرمول محاسبه هزینه کسورات",
        "statusFaceFormula" => "فرمول محاسبه صورت وضعیت",
        "statusStatement" => "صورت وضعیت",
        "normal" => "معمولی",
        "managerName" => "نام مدیر عامل",
        "coordinator" => "هماهنگ کننده",
        "responsibleStatement" => "مسئول صورت وضعیت",
        "shippingContractsId" => "قراردادها",
        "logo" => "لوگو",
        "statementCustomerId" => "مشتری صورت وضعیت",
        "travels" => "سفرها",
        "sheetNumber" => "شماره برگه",
        'personnelCode' => "کد پرسنلی",
        "startTime" => "زمان شروع",
        "endTime" => "زمان پایان",
        "contractingPartyName" => "نام مسئول پروژه",
        "managerPhone" => "شماره مدیرعامل",
        "employerName" => "نام کارفرما",
        "employerPhone" => "شماره کارفرما",
        "employerRepresentativeName" => "نام نماینده کارفرما",
        "employerRepresentativePhone" => "شماره نماینده کارفرما",
        "lat" => "طول جغرافیایی",
        "lng" => "عرض جغرافیایی",
        "coast" => "مبلغ",
        "class" => "کلاس",
        "waybills" => "بارنامه",
        "waybills.*.waybillNumber" => "شماره بارنامه",
        "waybills.*.waybillSeries" => "سریال بارنامه",
        "parentId" => "والد",
        "driverStatus" => "وضعیت راننده",
        "groupId" => "گروه",
        "sendTime" => "زمان ارسال",
        "permissionId" => "دسترسی",
        "moduleId" => "ماژول",
        "isAnswerDriver" => "نیاز به پاسخ راننده",
        "defaultDriverStatus" => "وضعیت پیشفرض راننده",
        "images" => "تصویر",
        "imageId" => "شناسه تصویر",
        "persons" => "کاربران",
        "end" => "پایان",
        "density" => "چگالی",
        "is_fire_insurance" => "بیمه آتش سوزی",
        "valueBuilding" => "ارزش ساختمانی",
        "furnitureValue" => "ارزش اثاثیه",
        "propertyId" => "شناسه اموال",
        "endDate" => "زمان پایان",
        "reseller_department" => "شعبه",
        "timeMove" => "زمان انتقال",
        "deliveryTime" => "زمان تحویل",
        "organization_location_id" => "موقعیت مکانی",
        "organization_chart_id" => "چارت سازمانی",
        "role_id" => "نقش",
        "responsibilities" => "مسئولیت ها",
        "responsibility_id" => "مسئولیت",
        "responsibility" => "مسئولیت",
        "expire_date" => "تاریخ اعتبار",
        "supervisor_id" => "ناظر",
        "supervision_groups_id" => "گروه نظارت",
        "serviceFee_group_id" => "گروه حق سرویس",
        "state_id" => "استان",
        "city_id" => "شهر",
        "is_assignment" => "واگذاری است ؟",
        "costCenter" => "مرکز هزینه"
    ],
];
