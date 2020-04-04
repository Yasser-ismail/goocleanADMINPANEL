<?php


return [

    'plural' => 'اإدارة المقايلات',
    'singular' => 'المقابلة',
    'empty' => 'لا يوجد مقابلات',

    'actions' => [
        'list' => 'إدارة المقابلات',
        'show' => 'عرض المقابلة',
        'create' => 'إضافة مقابلة',
        'edit' => 'تعديل المقابلة',
        'delete' => 'حذف المقابلة',
        'save' => 'حفظ',
        'cancel' => 'إلغاء',
    ],

    'messages' => [
        'created' => 'تم إضافة المقابلة بنجاح.',
        'updated' => 'تم تعديل المقابلة بنجاح.',
        'deleted' => 'تم حذف المقابلة بنجاح.',
    ],

    'attributes' => [
        'client' =>'اسم العميل',
        'company' =>'االشركة',
        'city' =>'المدينة',
        'date' =>'اليوم',
        'time' =>'الميعاد',
        'address' =>'العنوان التفصيلي',
        'service_id' =>'الخدمات المطلوبة',
        'price' =>'السعر الكلي',
        'client_id' =>'رقم تليفون العميل',
        'city_id' =>'مدينة العميل',
        'company_id' =>'الشركات الداعمة للمدينة',
        'workinghour_id' =>'المواعيد المتاحة',
        'time_id' =>'الاوقات المتاحة',
        'serial' =>'رقم الحجز',

    ],

    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد أنك تريد حذف هذه المقابلة ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
    ],

    'show' => [
        'client-name' => 'اسم العميل',
        'client-phone' =>'هاتف العميل',
        'client-email' =>'البريد الالكتروني للعميل',
        'client-city' =>'مدينة العميل',
        'client-address' =>'العنوان التفصيلي للعميل',
        'appoientment-serial' =>'رقم الحجز',
        'company-name' =>'اسم الشركة',
        'company-phone' =>'هاتف الشركة',
        'company-email' =>'البريد الالكتروني للشركة',
        'appoientment-day' =>'اليوم',
        'appoientment-time' =>'التوقيت',
        'All_services' =>'الخدمات المطلوبة',
        'appoientment-totalprice' =>'السعر الكلي',
    ],

];
