<?php

//User Roles
function userRole($input = null)
{
    $output = [
        USER_ROLE_ADMIN => __('Admin'),
        USER_ROLE_INSTRUCTOR => __('Instructor'),
        USER_ROLE_STUDENT => __('Student')
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function status($input = null){
    $output = [
        INACTIVE => __('Inactive'),
        ACTIVE => __('Active'),
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}


function statusAction($input = null)
{
    $output = [
        STATUS_PENDING => __('Pending'),
        STATUS_ACCEPTED => __('Accepted'),
        STATUS_REJECTED => __('Rejected'),
        STATUS_SUSPENDED => __('Suspended'),
        STATUS_DELETED => __('Deleted'),
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function statusClass($input = null)
{
    $output = [
        STATUS_PENDING => 'bg-info-soft-varient',
        STATUS_ACCEPTED => 'active',
        STATUS_REJECTED => 'bg-red',
        STATUS_SUSPENDED => 'bg-yellow',
        STATUS_DELETED => 'bg-red',
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getUserType($input = null)
{
    $output = [
        USER_ROLE_ADMIN => 'Admin',
        USER_ROLE_INSTRUCTOR => 'Instructor',
        USER_ROLE_STUDENT => 'Student'
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getOpenAiLanguage($input = null)
{
    $output = [
        "Arabic" => "Arabic",
        "Bengali" => "Bengali",
        "Chinese (Simplified)" => "Chinese (Simplified)",
        "Chinese (Traditional)" => "Chinese (Traditional)",
        "Dutch" => "Dutch",
        "Danish" => "Danish",
        "English" => "English",
        "French" => "French",
        "German" => "German",
        "Hebrew" => "Hebrew",
        "Hindi" => "Hindi",
        "Indonesian" => "Indonesian",
        "Italian" => "Italian",
        "Japanese" => "Japanese",
        "Korean" => "Korean",
        "Malay" => "Malay",
        "Norwegian" => "Norwegian",
        "Persian (Farsi)" => "Persian (Farsi)",
        "Polish" => "Polish",
        "Portuguese" => "Portuguese",
        "Punjabi" => "Punjabi",
        "Romanian" => "Romanian",
        "Russian" => "Russian",
        "Spanish" => "Spanish",
        "Swedish" => "Swedish",
        "Tamil" => "Tamil",
        "Telugu" => "Telugu",
        "Thai" => "Thai",
        "Turkish" => "Turkish",
        "Ukrainian" => "Ukrainian",
        "Urdu" => "Urdu",
        "Vietnamese" => "Vietnamese",
        "Serbian" => "Serbian",
        "Croatian" => "Croatian",
        "Albanian" => "Albanian",
        "Macedonian" => "Macedonian"
    ];

    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input];
    }
}



if (!function_exists('getMetaPages')) {
    function getMetaPages($input = null)
    {
        $output = [
           'default' => __('Default'),
           'auth' => __('Auth Page'),
           'home' => __('Home'),
           'course' => __('Course List'),
           'bundle' => __('Bundle List'),
           'consultation' => __('Consultation List'),
           'instructor' => __('Instructor List'),
           'saas' => __('Saas List'),
           'subscription' => __('Subscription List'),
           'blog' => __('Blog List'),
           'verify_certificate' => __('Verify Certificate'),
           'contact_us' => __('Contact Us'),
           'about_us' => __('About Us'),
           'forum' => __('Forum'),
           'support_faq' => __('Support page'),
           'faq' => __('Faq page'),
           'privacy_policy' => __('Privacy Policy'),
           'cookie_policy' => __('Cookie Policy'),
           'terms_and_condition' => __('Terms & Condition'),
           'refund_policy' => __('Refund Policy'),
        ];
        if (is_null($input)) {
            return $output;
        } else {
            return $output[$input] ?? '';
        }
    }
}


function getThemes($input = null)
{
    $output = [
        THEME_DEFAULT => __('Default'),
        THEME_TWO => __('Classic'),
        THEME_THREE => __('Modern'),
    ];

    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}
