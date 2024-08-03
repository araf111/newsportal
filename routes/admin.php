<?php

use App\Models\HomeVideo;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EpaperController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\VersionUpdateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewsTypeController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeVideoController;
use App\Http\Controllers\Admin\LiveStreamController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\NewsHeadingController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\ContactUsIssueController;

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// news heading management
Route::prefix('news-heading')->group(function () {
    Route::get('/', [NewsHeadingController::class, 'index'])->name('news-heading.index');
    Route::get('create', [NewsHeadingController::class, 'create'])->name('news-heading.create');
    Route::post('store', [NewsHeadingController::class, 'store'])->name('news-heading.store');
    Route::get('edit/{newsHeading}', [NewsHeadingController::class, 'edit'])->name('news-heading.edit');
    Route::post('update/{newsHeading}', [NewsHeadingController::class, 'update'])->name('news-heading.update');
    Route::get('delete/{newsHeading}', [NewsHeadingController::class, 'delete'])->name('news-heading.delete');
});

// news management
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('create', [NewsController::class, 'create'])->name('news.create');
    Route::post('store', [NewsController::class, 'store'])->name('news.store');
    Route::get('edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::get('delete/{news}', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('draft/', [NewsController::class, 'draftNews'])->name('news.draft');
});

// home video management
Route::prefix('home-video')->group(function () {
    Route::get('/', [HomeVideoController::class, 'index'])->name('home-video.index');
    Route::get('create', [HomeVideoController::class, 'create'])->name('home-video.create');
    Route::post('store', [HomeVideoController::class, 'store'])->name('home-video.store');
    Route::get('edit/{homeVideo}', [HomeVideoController::class, 'edit'])->name('home-video.edit');
    Route::post('update/{homeVideo}', [HomeVideoController::class, 'update'])->name('home-video.update');
    Route::get('delete/{homeVideo}', [HomeVideoController::class, 'delete'])->name('home-video.delete');
});

// advertisement management
Route::prefix('advertisement')->group(function () {
    Route::get('/', [AdvertisementController::class, 'index'])->name('advertisement.index');
    Route::get('create', [AdvertisementController::class, 'create'])->name('advertisement.create');
    Route::post('store', [AdvertisementController::class, 'store'])->name('advertisement.store');
    Route::get('edit/{advertisement}', [AdvertisementController::class, 'edit'])->name('advertisement.edit');
    Route::post('update/{advertisement}', [AdvertisementController::class, 'update'])->name('advertisement.update');
    Route::get('delete/{advertisement}', [AdvertisementController::class, 'delete'])->name('advertisement.delete');
});

// live stream management
Route::prefix('live-stream')->group(function () {
    Route::get('/', [LiveStreamController::class, 'index'])->name('live-stream.index');
    Route::get('create', [LiveStreamController::class, 'create'])->name('live-stream.create');
    Route::post('store', [LiveStreamController::class, 'store'])->name('live-stream.store');
    Route::get('edit/{liveStream}', [LiveStreamController::class, 'edit'])->name('live-stream.edit');
    Route::post('update/{liveStream}', [LiveStreamController::class, 'update'])->name('live-stream.update');
    Route::get('delete/{liveStream}', [LiveStreamController::class, 'delete'])->name('live-stream.delete');
});

// epaper management
Route::prefix('epaper')->group(function () {
    Route::get('/', [EpaperController::class, 'index'])->name('epaper.index');
    Route::get('create', [EpaperController::class, 'create'])->name('epaper.create');
    Route::post('store', [EpaperController::class, 'store'])->name('epaper.store');
    Route::get('edit/{epaper}', [EpaperController::class, 'edit'])->name('epaper.edit');
    Route::post('update/{epaper}', [EpaperController::class, 'update'])->name('epaper.update');
    Route::get('delete/{epaper}', [EpaperController::class, 'delete'])->name('epaper.delete');
});

// photo gallery management
Route::prefix('photo-gallery')->group(function () {
    Route::get('/', [PhotoGalleryController::class, 'index'])->name('photo-gallery.index');
    Route::get('create', [PhotoGalleryController::class, 'create'])->name('photo-gallery.create');
    Route::post('store', [PhotoGalleryController::class, 'store'])->name('photo-gallery.store');
    Route::get('edit/{photoGallery}', [PhotoGalleryController::class, 'edit'])->name('photo-gallery.edit');
    Route::post('update/{photoGallery}', [PhotoGalleryController::class, 'update'])->name('photo-gallery.update');
    Route::get('delete/{photoGallery}', [PhotoGalleryController::class, 'delete'])->name('photo-gallery.delete');
});

// video gallery management
Route::prefix('video-gallery')->group(function () {
    Route::get('/', [VideoGalleryController::class, 'index'])->name('video-gallery.index');
    Route::get('create', [VideoGalleryController::class, 'create'])->name('video-gallery.create');
    Route::post('store', [VideoGalleryController::class, 'store'])->name('video-gallery.store');
    Route::get('edit/{videoGallery}', [VideoGalleryController::class, 'edit'])->name('video-gallery.edit');
    Route::post('update/{videoGallery}', [VideoGalleryController::class, 'update'])->name('video-gallery.update');
    Route::get('delete/{videoGallery}', [VideoGalleryController::class, 'delete'])->name('video-gallery.delete');
});

// news type management
Route::prefix('news-type')->group(function () {
    Route::get('/', [NewsTypeController::class, 'index'])->name('news-type.index');
    Route::get('create', [NewsTypeController::class, 'create'])->name('news-type.create');
    Route::post('store', [NewsTypeController::class, 'store'])->name('news-type.store');
    Route::get('edit/{newsType}', [NewsTypeController::class, 'edit'])->name('news-type.edit');
    Route::post('update/{newsType}', [NewsTypeController::class, 'update'])->name('news-type.update');
    Route::get('delete/{newsType}', [NewsTypeController::class, 'delete'])->name('news-type.delete');
});

// email template

Route::group(['prefix' => 'email-template', 'as' => 'email-template.'], function () {
    Route::get('/', [EmailTemplateController::class, 'index'])->name('index');
    Route::get('create', [EmailTemplateController::class, 'create'])->name('create');
    Route::post('store', [EmailTemplateController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [EmailTemplateController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [EmailTemplateController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [EmailTemplateController::class, 'delete'])->name('delete');

    Route::get('send-email', [EmailTemplateController::class, 'sendEmail'])->name('send-email');
    Route::post('send-email-to-user', [EmailTemplateController::class, 'sendEmailToUser'])->name('send-email-to-user');
});

// Start:: user management
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('create', [RoleController::class, 'create'])->name('create');
    Route::post('store', [RoleController::class, 'store'])->name('store');
    Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
    Route::get('delete/{id}', [RoleController::class, 'delete'])->name('delete');
});


// End:: user management
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('update/{uuid}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('delete/{uuid}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('sorting-form', [CategoryController::class, 'categorySortingForm'])->name('category.sorting.form');
    Route::post('sorting-update', [CategoryController::class, 'categorySortingUpdate'])->name('category.sorting.update');
});

Route::prefix('subcategory')->group(function () {
    Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('create', [SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('edit/{uuid}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('update/{uuid}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('delete/{uuid}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
});

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('create', [TagController::class, 'create'])->name('tag.create');
    Route::post('store', [TagController::class, 'store'])->name('tag.store');
    Route::get('edit/{uuid}', [TagController::class, 'edit'])->name('tag.edit');
    Route::patch('update/{uuid}', [TagController::class, 'update'])->name('tag.update');
    Route::get('delete/{uuid}', [TagController::class, 'delete'])->name('tag.delete');
});

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('create', [BlogController::class, 'create'])->name('create');
    Route::post('store', [BlogController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [BlogController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [BlogController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [BlogController::class, 'delete'])->name('delete');
    Route::get('blog-comment-list', [BlogController::class, 'blogCommentList'])->name('blog-comment-list');
    Route::post('change-blog-comment-status', [BlogController::class, 'changeBlogCommentStatus'])->name('changeBlogCommentStatus');
    Route::get('blog-comment-delete/{id}', [BlogController::class, 'blogCommentDelete'])->name('blogComment.delete');

    Route::get('blog-category-index', [BlogCategoryController::class, 'index'])->name('blog-category.index');
    Route::post('blog-category-store', [BlogCategoryController::class, 'store'])->name('blog-category.store');
    Route::patch('blog-category-update/{uuid}', [BlogCategoryController::class, 'update'])->name('blog-category.update');
    Route::get('blog-category-delete/{uuid}', [BlogCategoryController::class, 'delete'])->name('blog-category.delete');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('admin.change-password');
    Route::post('change-password', [ProfileController::class, 'changePasswordUpdate'])->name('admin.change-password.update');
    Route::post('update', [ProfileController::class, 'update'])->name('admin.profile.update');
});


Route::prefix('language')->group(function () {
    Route::get('/', [LanguageController::class, 'index'])->name('language.index');
    Route::get('create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('store', [LanguageController::class, 'store'])->name('language.store');
    Route::get('edit/{id}/{iso_code?}', [LanguageController::class, 'edit'])->name('language.edit');
    Route::post('update/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::get('translate/{id}', [LanguageController::class, 'translateLanguage'])->name('language.translate');
    Route::post('update-translate/{id}', [LanguageController::class, 'updateTranslate'])->name('update.translate');
    Route::get('delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
    Route::post('import',[LanguageController::class, 'import'])->name('language.import');
    Route::post('update-language/{id}',[LanguageController::class, 'updateLanguage'])->name('update-language');
});

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::get('contact-us-list', [ContactUsController::class, 'contactUsIndex'])->name('index');
    Route::delete('contact-us-delete/{id}', [ContactUsController::class, 'contactUsDelete'])->name('delete');
    Route::resource('issue', ContactUsIssueController::class);
});

//Start:: Page
Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('create', [PageController::class, 'create'])->name('create');
    Route::post('store', [PageController::class, 'store'])->name('store');
    Route::get('edit/{uuid}', [PageController::class, 'edit'])->name('edit');
    Route::post('update/{uuid}', [PageController::class, 'update'])->name('update');
    Route::get('delete/{uuid}', [PageController::class, 'delete'])->name('delete');
});
//End:: Page

//Start:: Menu
Route::group(['prefix' => 'menus', 'as' => 'menu.'], function () {
    Route::get('static-menu', [MenuController::class, 'staticMenu'])->name('static');
    Route::patch('static-menu/{slug}', [MenuController::class, 'staticMenuUpdate'])->name('static.update');
    Route::get('dynamic-menu', [MenuController::class, 'dynamicMenu'])->name('dynamic');
    Route::post('dynamic-menu-store', [MenuController::class, 'dynamicMenuStore'])->name('dynamic.store');
    Route::patch('dynamic-menu-update/{id}', [MenuController::class, 'dynamicMenuUpdate'])->name('dynamic.update');
    Route::get('dynamic-menu-delete/{id}', [MenuController::class, 'dynamicMenuDelete'])->name('dynamic.delete');
    Route::get('footer-company-menu', [MenuController::class, 'footerCompanyMenu'])->name('footer-company');
    Route::post('footer-company-menu-store', [MenuController::class, 'footerCompanyMenuStore'])->name('footer-company.store');
    Route::patch('footer-company-menu-update/{id}', [MenuController::class, 'footerCompanyMenuUpdate'])->name('footer-company.update');
    Route::get('footer-company-menu-delete/{id}', [MenuController::class, 'footerCompanyMenuDelete'])->name('footer-company.delete');
    Route::get('footer-support-menu', [MenuController::class, 'footerSupportMenu'])->name('footer-support');
    Route::post('footer-support-menu-store', [MenuController::class, 'footerSupportMenuStore'])->name('footer-support.store');
    Route::patch('footer-support-menu-update/{id}', [MenuController::class, 'footerSupportMenuUpdate'])->name('footer-support.update');
    Route::get('footer-support-menu-delete/{id}', [MenuController::class, 'footerSupportMenuDelete'])->name('footer-support.delete');
});
//End:: Menu

Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
    //Start:: General Settings
    Route::get('general-settings', [SettingController::class, 'GeneralSetting'])->name('general_setting');
    Route::post('general-settings-update', [SettingController::class, 'GeneralSettingUpdate'])->name('general_setting.cms.update');

    Route::get('metas', [SettingController::class, 'metaIndex'])->name('meta.index');
    Route::get('meta/edit/{uuid}', [SettingController::class, 'editMeta'])->name('meta.edit');
    Route::post('meta/update/{uuid}', [SettingController::class, 'updateMeta'])->name('meta.update');

    // Route::get('site-share-content', [SettingController::class, 'siteShareContent'])->name('site-share-content');
    Route::get('map-api-key', [SettingController::class, 'mapApiKey'])->name('map-api-key')->middleware('isDemo');
    Route::get('re-captcha-key', [SettingController::class, 'reCaptchaKey'])->name('re-captcha-key')->middleware('isDemo');
    Route::get('google-analytics', [SettingController::class, 'googleAnalytics'])->name('google-analytics')->middleware('isDemo');
    Route::get('generate-site-map', [SettingController::class, 'generateSiteMap'])->name('generate.site_map')->middleware('isDemo');
    Route::get('color-settings', [SettingController::class, 'colorSettings'])->name('color-settings');
    Route::get('font-settings', [SettingController::class, 'fontSettings'])->name('font-settings');
    //End:: General Settings

    //Start:: Device Control Mode
    // Route::get('private-mode-changes', [SettingController::class, 'privateMode'])->name('private_mode')->middleware('isDemo');
    // Route::post('private-mode-changes', [SettingController::class, 'privateModeChange'])->name('private_mode.change')->middleware('isDemo');
    //End:: Device Control Modehttp://127.0.0.1:8000/admin/instructor/pending

    //Start:: Social Login Settings
    Route::get('social-login-settings', [SettingController::class, 'socialLoginSettings'])->name('social-login-settings');
    Route::post('social-settings-update', [SettingController::class, 'socialLoginSettingsUpdate'])->name('social-login-settings.update');

    //Start:: Cookie Settings
    Route::get('cookie-settings', [SettingController::class, 'cookieSettings'])->name('cookie-settings');
    Route::post('cookie-settings-update', [SettingController::class, 'cookieSettingsUpdate'])->name('cookie-settings.update');

    //Start:: AWS S3 Settings
    Route::get('storage-settings', [SettingController::class, 'storageSettings'])->name('storage-settings');
    Route::post('storage-settings-update', [SettingController::class, 'storageSettingsUpdate'])->name('storage-settings.update');

    //Start:: Vimeo Settings
    Route::get('vimeo-settings', [SettingController::class, 'vimeoSettings'])->name('vimeo-settings');
    Route::post('vimeo-settings-update', [SettingController::class, 'vimeoSettingsUpdate'])->name('vimeo-settings.update');

    //Start:: Home Settings
    Route::get('theme-settings', [HomeSettingController::class, 'themeSettings'])->name('theme-setting');
    Route::get('section-settings', [HomeSettingController::class, 'sectionSettings'])->name('section-settings');
    Route::post('sectionSettingsStatusChange', [HomeSettingController::class, 'sectionSettingsStatusChange'])->name('sectionSettingsStatusChange');
    Route::get('banner-section-settings', [HomeSettingController::class, 'bannerSection'])->name('banner-section');
    Route::post('banner-section-settings', [HomeSettingController::class, 'bannerSectionUpdate'])->name('banner-section.update');
    Route::get('special-feature-section-settings', [HomeSettingController::class, 'specialFeatureSection'])->name('special-feature-section');
    Route::get('course-section-settings', [HomeSettingController::class, 'courseSection'])->name('course-section');
    Route::get('category-course-section-settings', [HomeSettingController::class, 'categoryCourseSection'])->name('category-course-section');
    Route::get('upcoming-course-section-settings', [HomeSettingController::class, 'upcomingCourseSection'])->name('upcoming-course-section');
    Route::get('product-section-settings', [HomeSettingController::class, 'productSection'])->name('product-section');
    Route::get('bundle-course-section-settings', [HomeSettingController::class, 'bundleCourseSection'])->name('bundle-course-section');
    Route::get('top-category-section-settings', [HomeSettingController::class, 'topCategorySection'])->name('top-category-section');
    Route::get('top-instructor-section-settings', [HomeSettingController::class, 'topInstructorSection'])->name('top-instructor-section');
    Route::get('become-instructor-video-section-settings', [HomeSettingController::class, 'becomeInstructorVideoSection'])->name('become-instructor-video-section');
    Route::get('customer-say-section-settings', [HomeSettingController::class, 'customerSaySection'])->name('customer-say-section');
    Route::get('achievement-section-settings', [HomeSettingController::class, 'achievementSection'])->name('achievement-section');
    //End:: Home Settings

    //Start:: Mail Config
    Route::get('mail-configuration', [SettingController::class, 'mailConfiguration'])->name('mail-configuration');
    Route::post('send-test-mail', [SettingController::class, 'sendTestMail'])->name('send.test.mail');
    Route::post('save-setting', [SettingController::class, 'saveSetting'])->name('save.setting');
    //End:: Mail Config

    //Start:: FAQ Question & Answer
    Route::get('faq-settings', [SettingController::class, 'faqCMS'])->name('faq.cms');
    Route::get('faq-tab', [SettingController::class, 'faqTab'])->name('faq.tab');
    Route::get('faq-question-settings', [SettingController::class, 'faqQuestion'])->name('faq.question');
    Route::post('faq-question-settings', [SettingController::class, 'faqQuestionUpdate'])->name('faq.question.update');
    //End:: FAQ Question & Answer


    // Start:: Contact Us
    Route::get('contact-us-cms', [ContactUsController::class, 'contactUsCMS'])->name('contact.cms');
    // End:: Contact Us

    // Start:: About Us
    Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
        Route::get('about-us-gallery-area', [AboutUsController::class, 'galleryArea'])->name('gallery-area');
        Route::post('about-us-gallery-area', [AboutUsController::class, 'galleryAreaUpdate'])->name('gallery-area.update');

        Route::get('about-us-our-history', [AboutUsController::class, 'ourHistory'])->name('our-history');
        Route::post('about-us-our-history', [AboutUsController::class, 'ourHistoryUpdate'])->name('our-history.update');

        Route::get('about-us-upgrade-skill', [AboutUsController::class, 'upgradeSkill'])->name('upgrade-skill');
        Route::post('about-us-upgrade-skill', [AboutUsController::class, 'upgradeSkillUpdate'])->name('upgrade-skill.update');

        Route::get('about-us-team-member', [AboutUsController::class, 'teamMember'])->name('team-member');
        Route::post('about-us-team-member', [AboutUsController::class, 'teamMemberUpdate'])->name('team-member.update');

        Route::get('about-us-instructor-support', [AboutUsController::class, 'instructorSupport'])->name('instructor-support');
        Route::post('about-us-instructor-support', [AboutUsController::class, 'instructorSupportUpdate'])->name('instructor-support.update');

        Route::get('about-us-client', [AboutUsController::class, 'client'])->name('client');
        Route::post('about-us-client', [AboutUsController::class, 'clientUpdate'])->name('client.update');
    });
    // End:: About Us

    //Migrate, Cache
    Route::get('cache-settings', [SettingController::class, 'cacheSettings'])->name('cache-settings');
    Route::get('cache-update/{id}', [SettingController::class, 'cacheUpdate'])->name('cache-update');
    Route::get('migrate-settings', [SettingController::class, 'migrateSettings'])->name('migrate-settings');
    Route::get('migrate-update', [SettingController::class, 'migrateUpdate'])->name('migrate-update');

});

Route::get('privacy-policy', [PolicyController::class, 'privacyPolicy'])->name('admin.privacy-policy');
Route::post('privacy-policy', [PolicyController::class, 'privacyPolicyStore'])->name('admin.privacy-policy.store');

Route::get('terms-conditions', [PolicyController::class, 'termConditions'])->name('admin.terms-conditions');
Route::post('terms-conditions', [PolicyController::class, 'termConditionsStore'])->name('admin.terms-conditions.store');

Route::get('cookie-policy', [PolicyController::class, 'cookiePolicy'])->name('admin.cookie-policy');
Route::post('cookie-policy', [PolicyController::class, 'cookiePolicyStore'])->name('admin.cookie-policy.store');

Route::get('refund-policy', [PolicyController::class, 'refundPolicy'])->name('admin.refund-policy');
Route::post('refund-policy', [PolicyController::class, 'refundPolicyStore'])->name('admin.refund-policy.store');