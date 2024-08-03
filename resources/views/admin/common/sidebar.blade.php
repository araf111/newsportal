<div class="sidebar__area">
    <div class="sidebar__close">
        <button class="close-btn">
            <i class="fa fa-close"></i>
        </button>
    </div>

    <div class="sidebar__brand">
        <a href="{{ route('admin.dashboard') }}">
            @if(get_option('app_logo') != '')
                <img src="{{getImageFile(get_option('app_logo'))}}" alt="">
            @else
                <img src="" alt="">
            @endif
        </a>
    </div>
    <ul id="sidebar-menu" class="sidebar__menu">

        <li class=" {{ active_if_full_match('admin/dashboard') }} ">
            <a href="{{route('admin.dashboard')}}">
                <span class="iconify" data-icon="bxs:dashboard"></span>
                <span>{{__('Dashboard')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/news-heading') }}">
            <a href="{{route('news-heading.index')}}">
                <span class="iconify" data-icon="jam:blogger-square"></span>
                <span>{{__('News Headline')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/news-type') }}">
            <a href="{{route('news-type.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('News Type')}}</span>
            </a>
        </li>

        <li>
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>
                <span>{{__('News')}}</span>
            </a>
            <ul>

                <li class="{{ active_if_match('admin/news/create') }}">
                    <a href="{{route('news.create')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Add News')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/news') }}">
                    <a href="{{route('news.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('All Published News')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/news/draft') }}">
                    <a href="{{route('news.draft')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('All Draft News')}}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="codicon:references"></span>
                <span>{{__('Category')}}</span>
            </a>
            <ul>
                <li class="{{ active_if_match('admin/category') }}">
                    <a href="{{route('category.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Add Category')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/category') }}">
                    <a href="{{route('category.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('All Category')}}</span>
                    </a>
                </li>
                <li class="{{ active_if_match('admin/category/sorting-form') }}">
                    <a href="{{route('category.sorting.form')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Category Sorting')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/subcategory') }}">
                    <a href="{{route('subcategory.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Subcategory')}}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ active_if_match('admin/home-video') }}">
            <a href="{{route('home-video.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('Home Video')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/live-stream') }}">
            <a href="{{route('live-stream.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('Live Stream(Sports)')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/advertisement') }}">
            <a href="{{route('advertisement.create')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('Advertisements')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/epaper') }}">
            <a href="{{route('epaper.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('EPaper Image')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/photo-gallery') }}">
            <a href="{{route('photo-gallery.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('Photo Gallery')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/video-gallery') }}">
            <a href="{{route('video-gallery.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('Video Gallery')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/instructor/pending') }}">
            <a href="#">
                <i class="fa fa-circle"></i>
                <span>{{__('Writer')}}</span>
            </a>
        </li>

        <li class="{{ active_if_match('admin/tag') }}">
            <a href="{{route('tag.index')}}">
                <i class="fa fa-circle"></i>
                <span>{{__('News Tag')}}</span>
            </a>
        </li>

	    <li>
		<a class="has-arrow" href="#">
		    <span class="iconify" data-icon="fa6-solid:language"></span>
		    <span>{{__('Manage Language')}}</span>
		</a>
		<ul>
		    <li class="{{ active_if_match('admin/language') }}">
		        <a href="{{route('language.index')}}">
		            <i class="fa fa-circle"></i>
		            <span>{{__('Language Settings')}}</span>
		        </a>
		    </li>
		</ul>
	    </li>
 
        <li class="{{ @$navUserParentActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="bxs:user-account"></span>
                <span>{{__('Admin Management')}}</span>
            </a>
            <ul class="{{ @$navUserParentShowClass }}">
                <li class="{{ @$subNavUserCreateActiveClass }}">
                    <a href="{{route('user.create')}}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Add User')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavUserActiveClass }}">
                    <a href="{{route('user.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('All Users')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavUserRoleActiveClass }}">
                    <a href="{{route('role.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Roles')}}</span>
                    </a>
                </li>


            </ul>
        </li>

        {{-- <li class="{{ @$navEmailActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="dashicons:email"></span>
                <span>{{__('Email Management')}}</span>
            </a>
            <ul class="{{ @$navEmailParentShowClass }}">
                <li class="{{ @$subNavEmailTemplateActiveClass }}">
                    <a href="{{route('email-template.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Email Template')}}</span>
                    </a>
                </li>

                <li class="{{ @$subNavSendMailActiveClass }}">
                    <a href="{{route('email-template.send-email')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Send Email')}}</span>
                    </a>
                </li>

            </ul>
        </li> --}}

        <li class="{{ @$navPageParentActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="dashicons:edit-page"></span>
                <span>{{__('Manage Page')}}</span>
            </a>
            <ul class="">
                <li class="{{ @$subNavPageAddActiveClass }}">
                    <a href="{{route('page.create')}}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Add Page')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavPageIndexActiveClass }}">
                    <a href="{{route('page.index')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('All Pages')}}</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="{{ @$navMenuParentActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="bi:menu-up"></span>
                <span>{{__('Manage Menu')}}</span>
            </a>
            <ul class="">
                <li class="{{ @$subNavStaticMenuIndexActiveClass }}">
                    <a href="{{route('menu.static')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Nav Menu')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavDynamicMenuIndexActiveClass }}">
                    <a href="{{route('menu.dynamic')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Nav Dynamic Menu')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavFooterCompanyMenuIndexActiveClass }}">
                    <a href="{{route('menu.footer-company')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Footer Left')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavFooterSupportMenuIndexActiveClass }}">
                    <a href="{{route('menu.footer-support')}}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Footer Right')}}</span>
                    </a>
                </li>

            </ul>
        </li>

        {{-- <li class="{{ @$navApplicationSettingParentActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="mdi:application-cog-outline"></span>
                <span>{{__('Application Settings')}}</span>
            </a>
            <ul class="">
                <li class="{{ @$subNavGlobalSettingsActiveClass }}">
                    <a href="{{ route('settings.general_setting') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Global Settings')}}</span>
                    </a>
                </li>

                <li class="{{ @$subNavHomeSettingsActiveClass }}">
                    <a href="{{ route('settings.theme-setting') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Home Settings')}}</span>
                    </a>
                </li>

                <li class="{{ @$subNavMailConfigSettingsActiveClass }}">
                    <a href="{{ route('settings.mail-configuration') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Mail Configuration')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavFAQSettingsActiveClass }}">
                    <a href="{{ route('settings.faq.cms') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('FAQ')}}</span>
                    </a>
                </li>

                <li class="{{ @$subNavContactUsSettingsActiveClass }}">
                    <a href="{{ route('settings.contact.cms') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Contact Us')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavCacheActiveClass }}">
                    <a href="{{ route('settings.cache-settings') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Cache Settings')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavMigrateActiveClass }}">
                    <a href="{{ route('settings.migrate-settings') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Migrate Settings')}}</span>
                    </a>
                </li>

            </ul>
        </li> --}}
        <li class="{{ @$navPolicyActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="dashicons:privacy"></span>
                <span>{{__('Policy Setting')}}</span>
            </a>
            <ul>
                <li class="{{ @$subNavTermConditionsActiveClass }}">
                    <a href="{{ route('admin.terms-conditions') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Terms Conditions')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavPrivacyPolicyActiveClass }}">
                    <a href="{{ route('admin.privacy-policy') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Privacy Policy')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavRefundPolicyActiveClass }}">
                    <a href="{{ route('admin.refund-policy') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Refund Policy')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavCookiePolicyActiveClass }}">
                    <a href="{{ route('admin.cookie-policy') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('Cookie Policy')}} </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ @$navContactUsParentActiveClass }}">
            <a class="has-arrow" href="#">
                <span class="iconify" data-icon="fluent:contact-card-32-regular"></span>
                <span>{{__('Contact Us')}}</span>
            </a>
            <ul class="{{ @$navContactUsParentShowClass }}">
                <li class="{{ @$subNavContactUsIndexActiveClass }}">
                    <a href="{{ route('contact.index') }}">
                        <i class="fa fa-circle"></i>
                        <span> {{__('All Contact Us')}} </span>
                    </a>
                </li>
                <li class="{{ @$subNavContactUsIssueIndexActiveClass }}">
                    <a href="{{ route('contact.issue.index') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('All Contact Us Issue')}}</span>
                    </a>
                </li>
                <li class="{{ @$subNavContactUsIssueAddActiveClass }}">
                    <a href="{{ route('contact.issue.create') }}">
                        <i class="fa fa-circle"></i>
                        <span>{{__('Add Contact Us Issue')}}</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="{{ @$subNavVersionUpdateActiveClass }}">
            <a href="#">
                <i class="fa fa-circle"></i>
                <span>{{__('Version Update')}}</span>
            </a>
        </li>

        <li class="mb-5 text-center">
            <a href="#">
                <span>
                    <h3>{{ __('Software Version') }} {{ get_option('current_version', 2.4) }}</h3>
                </span>
            </a>
        </li>
    </ul>
</div>
