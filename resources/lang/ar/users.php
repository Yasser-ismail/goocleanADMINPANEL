<?php

return [
    'plural' => 'المستخدمين',
    'singular' => 'المستخدم',
    'empty' => 'لا توجد مستخدمين',
    'actions' => [
        'list' => 'إدارة المستخدمين ',
        'show' => 'إعرض المستخدم',
        'create' => 'إضافة مستخدم جديد',
        'edit' => 'تعديل  المستخدم',
        'delete' => 'حذف المستخدم',
        'save' => 'حفظ',
        'search' => 'إبحث فى المستخدمين',
        'cancel' => 'إلغاء'
    ],
    'messages' => [
        'created' => 'تم إضافة المستخدم بنجاح .',
        'updated' => 'تم تعديل المستخدم بنجاح .',
        'deleted' => 'تم حذف المستخدم بنجاح .',
    ],
    'attributes' => [
        'name' => 'اسم المستخدم',
        'city_id' => 'المدينة',
        'city_name' => 'المدينة',
        'email' =>  'البريد الالكترونى',
        'password' => 'كلمة السر',
        'phone_number' => 'رقم الهاتف',
        'type' => 'نوع المستخدم',
        'is_active' => 'الحالة',

        'is_active-options' => [
            'active' => 'فعال',
            'in-active' => 'غير فعال',
        ],
        'type-options' => [
            'admin' => 'ادمن',
            'supervisor' => 'مشرف',
        ],

    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا المستخدم ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ],
    ],
];
