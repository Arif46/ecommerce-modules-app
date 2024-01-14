<?php

namespace App;

class AppConfig
{
    /*upload path*/
    public const PER_PAGE_RECORDS = 10;

    public const SELLER_DOCUMENT_UPLOAD = 'public/seller-documents';

    public const USER_ROLE_SUPER_ADMIN = 1;
    public const USER_ROLE_ADMIN = 2;
    public const USER_ROLE_SELLER = 3;
    public const USER_ROLE_CUSTOMER = 4;

    public const USER_ROLES = [
        self::USER_ROLE_SUPER_ADMIN => 'Super Admin',
        self::USER_ROLE_ADMIN => 'Admin',
        self::USER_ROLE_SELLER => 'Seller',
        self::USER_ROLE_CUSTOMER => 'Customer',
    ];
    public const USER_ROLE_TYPE_SUPER_ADMIN = 'super_admin';
    public const USER_ROLE_TYPE_ADMIN = 'admin';
    public const USER_ROLE_TYPE_SELLER = 'seller';
    public const USER_ROLE_TYPE_CUSTOMER = 'customer';

    public const USER_ROLE_TYPES = [
        self::USER_ROLE_TYPE_SUPER_ADMIN => 'Super Admin',
        self::USER_ROLE_TYPE_ADMIN => 'Admin',
        self::USER_ROLE_TYPE_SELLER => 'Seller',
        self::USER_ROLE_TYPE_CUSTOMER => 'Customer',
    ];
    public const COUPON_CALCULATION_TYPE_FIXED = 'fixed';
    public const COUPON_CALCULATION_TYPE_PERCENTAGE = 'percentage(%)';

    public const COUPON_CALCULATION_TYPE = [
        self::COUPON_CALCULATION_TYPE_FIXED => 'Fixed',
        self::COUPON_CALCULATION_TYPE_PERCENTAGE => 'Percentage(%)',
    ];
    // seller document verification status
    public const SELLER_DOCUMENT_VERIFICATION_STATUS_PENDING = 'pending';
    public const SELLER_DOCUMENT_VERIFICATION_STATUS_VERIFIED = 'verified';
    public const SELLER_DOCUMENT_VERIFICATION_STATUS_CANCELLED = 'cancelled';
    public const SELLER_DOCUMENT_VERIFICATION_STATUS_SEND_BACK = 'send_back';
    public const SELLER_DOCUMENT_VERIFICATION_STATUS = [
        self::SELLER_DOCUMENT_VERIFICATION_STATUS_PENDING => 'Pending',
        self::SELLER_DOCUMENT_VERIFICATION_STATUS_VERIFIED => 'Verified',
        self::SELLER_DOCUMENT_VERIFICATION_STATUS_CANCELLED => 'Cancelled',
        self::SELLER_DOCUMENT_VERIFICATION_STATUS_SEND_BACK => 'Send Back',
    ];

    public const VERIFICATION_SESSION_TIME= 3600; // in seconds == 1 hour
}
