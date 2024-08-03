<?php

use Carbon\Carbon;
use App\Models\Meta;
use App\Models\User;
use App\Models\Setting;
use App\Models\Language;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

function staticMeta($id)
{
    $meta = \App\Models\Meta::find($id);
    $metaData = [];
    if ($meta) {
        $metaData['title'] = $meta->meta_title;
        $metaData['meta_description'] = $meta->meta_description;
        $metaData['meta_keyword'] = $meta->meta_keyword;
    }

    return $metaData;
}

function generateVideoEmbed($type, $video_code)
{
    switch ($type) {
        case 'youtube':
            return '<a href="'.YOUTUBE_URL.'/watch?v=' . $video_code . '" target="_blank"><img style="width:150px" src="https://i.ytimg.com/vi/' . $video_code . '/mqdefault.jpg"/></a>';
        case 'facebook':
            return '<div class="fb-video" data-href="'. FACEBOOK_URL .'/'. $video_code . '/" data-width="500" data-show-text="false"></div>';
        default:
            return '';
    }
}

function active_if_match($path)
{
    if (auth::user()->is_admin()) {
        return Request::is($path . '*') ? 'mm-active' : '';
    } else {
        return Request::is($path . '*') ? 'active' : '';
    }
}

function active_if_full_match($path)
{
    if (auth::user()->is_admin()) {
        return Request::is($path) ? 'mm-active' : '';
    } else {
        return Request::is($path) ? 'active' : '';
    }
}

function open_if_full_match($path)
{
    return Request::is($path) ? 'has-open' : '';
}


function toastrMessage($message_type, $message)
{
    Toastr::$message_type($message, '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
}

function get_option($option_key, $default = NULL)
{
    $system_settings = config('settings');

    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } elseif ($option_key && isset($system_settings[strtolower($option_key)])) {
        return $system_settings[strtolower($option_key)];
    } elseif ($option_key && isset($system_settings[strtoupper($option_key)])) {
        return $system_settings[strtoupper($option_key)];
    } else {
        return $default;
    }
}

function get_default_language()
{
    $language = Language::where('default_language', 'on')->first();
    if ($language) {
        $iso_code = $language->iso_code;
        return $iso_code;
    }

    return 'en';
}


function get_number_format($amount)
{
    return number_format($amount, 2, '.', '');
}

function decimal_to_int($amount)
{
    return number_format(number_format($amount, 2, '.', '') * 100, 0, '.', '');
}
function int_to_decimal($amount)
{
    return number_format($amount / 100, 2, '.', '');
}

function appLanguages()
{
    return Language::where('status', 1)->get();
}

function selectedLanguage()
{
    $language = Language::where('iso_code', config('app.locale'))->first();
    if (!$language) {
        $language = Language::find(1);
        if ($language) {
            $ln = $language->iso_code;
            session(['local' => $ln]);
            App::setLocale(session()->get('local'));
        }
    }

    return $language;
}

function getImageFile($file)
{
    if($file != ''){
        return asset($file);
    }
    else{
        return asset('frontend/assets/img/no-image.png');
    }
}

function getVideoFile($file)
{
    if ($file == '' || $file == null) {
        return null;
    }

    try {
        if (env('STORAGE_DRIVER') != "public") {
            if (Storage::disk(env('STORAGE_DRIVER'))->exists($file)) {
                $storage = Storage::disk(env('STORAGE_DRIVER'));
                return $storage->url($file);
            }
        }
        else{
            return asset($file);
        }
    } catch (Exception $e) {
    }

    return asset($file);
}

function notificationForUser()
{
    $instructor_notifications = \App\Models\Notification::where('user_id', auth()->user()->id)->where('user_type', 2)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
    $student_notifications = \App\Models\Notification::where('user_id', auth()->user()->id)->where('user_type', 3)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
    return array('instructor_notifications' => $instructor_notifications, 'student_notifications' => $student_notifications);
}

function adminNotifications()
{
    return \App\Models\Notification::where('user_type', 1)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->paginate(5);
}

if (!function_exists('getSlug')) {
    function getSlug($text)
    {
        if ($text) {
            $data = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $text);
            $slug = preg_replace("/[\/_|+ -]+/", "-", $data);
            return $slug;
        }
        return '';
    }
}


if (!function_exists('getUserRoleRelation')) {
    function getUserRoleRelation($user)
    {
        if ($user->role == USER_ROLE_INSTRUCTOR) {
            $return = 'instructor';
        } elseif ($user->role == USER_ROLE_ORGANIZATION) {
            $return = 'organization';
        } else {
            $return = 'student';
        }

        return $return;
    }
}

if (!function_exists('getCustomerCurrentBuildVersion')) {
    function getCustomerCurrentBuildVersion()
    {
        $buildVersion = get_option('app_version');

        if (is_null($buildVersion)) {
            return 1;
        }

        return (int)$buildVersion;
    }
}

if (!function_exists('setCustomerBuildVersion')) {
    function setCustomerBuildVersion($version)
    {
        $option = Setting::firstOrCreate(['option_key' => 'app_version']);
        $option->option_value = $version;
        $option->save();
    }
}

if (!function_exists('setCustomerCurrentVersion')) {
    function setCustomerCurrentVersion()
    {
        $option = Setting::firstOrCreate(['option_key' => 'current_version']);
        $option->option_value = config('app.current_version');
        $option->save();
    }
}

if (!function_exists('get_domain_name')) {
    function get_domain_name($url)
    {
        $parseUrl = parse_url(trim($url));
        if (isset($parseUrl['host'])) {
            $host = $parseUrl['host'];
        } else {
            $path = explode('/', $parseUrl['path']);
            $host = $path[0];
        }
        return  trim($host);
    }
}

if (!function_exists('updateEnv')) {
    function updateEnv($values)
    {
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                setEnvironmentValue($envKey,$envValue);
            }
            return true;
        }
    }
}
if (!function_exists('updateManifest')) {
    function updateManifest()
    {
        $manifest = [
            "name" => get_option('app_name', 'Dinkal'),
            "short_name" => get_option('app_name', 'Dinkal'),
            "start_url" => route('main.index'),
            "background_color" => get_option('app_theme_color', '#5e3fd7'),
            "description" => get_option('app_name', 'Dinkal'),
            "display" => "fullscreen",
            "theme_color" => get_option('app_theme_color', '#5e3fd7'),
            "icons" => [
                [
                    "src" => getImageFile(get_option('app_pwa_icon')),
                    "sizes" => "512x512",
                    "type" => "image/png",
                    "purpose" => "any maskable"
                ]
            ]
        ];

        file_put_contents(public_path("manifest.json"), json_encode($manifest));
    }
}
function setEnvironmentValue($envKey, $envValue)
{
    try {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$envKey}=");
        if($keyPosition) {
            if (PHP_OS_FAMILY === 'Windows') {
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
            } else {
                $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
            }
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
            $envValue = str_replace(chr(92), "\\\\", $envValue);
            $envValue = str_replace('"', '\"', $envValue);
            $newLine = "{$envKey}=\"{$envValue}\"";
            if ($oldLine != $newLine) {
                $str = str_replace($oldLine, $newLine, $str);
                $str = substr($str, 0, -1);
                $fp = fopen($envFile, 'w');
                fwrite($fp, $str);
                fclose($fp);
            }
        }else if(strtoupper($envKey) == $envKey){
            $envValue = str_replace(chr(92), "\\\\", $envValue);
            $envValue = str_replace('"', '\"', $envValue);
            $newLine = "{$envKey}=\"{$envValue}\"\n";
            $str .= $newLine;
            $str = substr($str, 0, -1);
            $fp = fopen($envFile, 'w');
            fwrite($fp, $str);
            fclose($fp);
        }
        return true;
    }catch (\Exception $e){
        return false;
    }


}

if (!function_exists('getTimeZone')) {
    function getTimeZone()
    {
        return DateTimeZone::listIdentifiers(
            DateTimeZone::ALL
        );
    }
}


if (!function_exists('getCustomerCurrentBuildVersion')) {
    function getCustomerCurrentBuildVersion()
    {
        $buildVersion = get_option('build_version');

        if (is_null($buildVersion)) {
            return 1;
        }

        return (int)$buildVersion;
    }
}

if (!function_exists('getCustomerAddonBuildVersion')) {
    function getCustomerAddonBuildVersion($code)
    {
        $buildVersion = get_option($code . '_build_version', 0);
        if (is_null($buildVersion)) {
            return 0;
        }
        return (int)$buildVersion;
    }
}

if (!function_exists('isAddonInstalled')) {
    function isAddonInstalled($code)
    {
        $buildVersion = get_option($code . '_build_version', 0);
        $codeBuildVersion = getAddonCodeBuildVersion($code);
        if ($buildVersion == 0 || $codeBuildVersion == 0) {
            return false;
        }
        return true;
    }
}

if (!function_exists('setCustomerAddonCurrentVersion')) {
    function setCustomerAddonCurrentVersion($code)
    {
        $option = Setting::firstOrCreate(['option_key' => $code . '_current_version']);
        $option->option_value = getAddonCodeCurrentVersion($code);
        $option->save();
    }
}

if (!function_exists('setCustomerAddonBuildVersion')) {
    function setCustomerAddonBuildVersion($code, $version)
    {
        $option = Setting::firstOrCreate(['option_key' => $code . '_build_version']);
        $option->option_value = $version;
        $option->save();
    }
}


if (!function_exists('getAddonCodeCurrentVersion')) {
    function getAddonCodeCurrentVersion($appCode)
    {
        Artisan::call("optimize:clear");
        return config('Addon.' . $appCode . '.current_version', 0);
    }
}

if (!function_exists('getAddonCodeBuildVersion')) {
    function getAddonCodeBuildVersion($appCode)
    {
        Artisan::call("optimize:clear");
        return config('Addon.' . $appCode . '.build_version', 0);
    }
}

if (!function_exists('getMeta')) {
    function getMeta($slug)
    {
        $metaData = [
            'meta_title' => null,
            'meta_description' => null,
            'meta_keyword' => null,
            'og_image' => null,
        ];

        $meta = Meta::where('slug', $slug)->select([
            'meta_title',
            'meta_description',
            'meta_keyword',
            'og_image',
        ])->first();

        if(!is_null($meta)){
                $metaData = $meta->toArray();
        }else{
            $meta = Meta::where('slug', 'default')->select([
                'meta_title',
                'meta_description',
                'meta_keyword',
                'og_image',
            ])->first();

            if(!is_null($meta)){
                $metaData = $meta->toArray();
            }
        }

        $metaData['meta_title'] = $metaData['meta_title'] != NULL ? $metaData['meta_title'] : get_option('app_name');
        $metaData['meta_description'] = $metaData['meta_description'] != NULL ? $metaData['meta_description'] : get_option('app_name');
        $metaData['meta_keyword'] = $metaData['meta_keyword'] != NULL ? $metaData['meta_keyword'] : get_option('app_name');
        $metaData['og_image'] = $metaData['og_image'] != NULL ? getImageFile($metaData['og_image']) : getImageFile(get_option('app_logo'));

        return $metaData;
    }
}

if (!function_exists('getThemePath')) {
    function getThemePath()
    {
        $theme = get_option('theme', THEME_DEFAULT);
        if($theme == THEME_DEFAULT){
            return 'frontend';
        }

        return 'frontend-theme-'.$theme;
    }
}
