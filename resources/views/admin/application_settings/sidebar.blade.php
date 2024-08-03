<div class="email__sidebar bg-style">
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h2>{{__('Global Settings')}}</h2>

            <li>
                <a href="{{ route('settings.general_setting') }}" class="list-item {{ @$generalSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{__('Global Settings')}}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.social-login-settings') }}" class="list-item {{ @$socialLoginSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{__('Social Login Settings')}}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.cookie-settings') }}" class="list-item {{ @$cookieSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{__('Cookie Settings')}}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('settings.storage-settings') }}" class="list-item {{ @$storageSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{__('Storage Settings')}}</span>
                </a>
            </li>


            <li>
                <a href="{{ route('settings.vimeo-settings') }}" class="list-item {{ @$vimeoSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Vimeo Settings') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.generate.site_map') }}" class="list-item">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Generate Sitemap') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.map-api-key') }}" class="list-item {{ @$siteMapApiKeyActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Geo Location Api Key') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.re-captcha-key') }}" class="list-item {{ @$siteRecaptchaKeyActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Re-Captcha Key') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.google-analytics') }}" class="list-item {{ @$siteGoogleAnalyticsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Google Analytics') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.color-settings') }}" class="list-item {{ @$colorActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Color Settings') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.font-settings') }}" class="list-item {{ @$fontActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Font Settings') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h2>{{ __('Mail Configuration') }}</h2>

            <li>
                <a href="{{ route('settings.mail-configuration') }}" class="list-item {{ @$mailConfigSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Mail Configuration') }}</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h2>{{ __('FAQ') }}</h2>

            <li>
                <a href="{{ route('settings.faq.cms') }}" class="list-item {{ @$faqCMSSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('FAQ CMS') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.faq.tab') }}" class="list-item {{ @$faqCMSTabActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('FAQ Tab') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.faq.question') }}" class="list-item {{ @$faqQuestionActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Question & Answer') }}</span>
                </a>
            </li>

        </ul>
    </div>

    {{-- <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h2>{{ __('About Us') }}</h2>

            <li>
                <a href="{{ route('settings.about.gallery-area') }}" class="list-item {{ @$subNavGalleryAreaActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Gallery Area') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.upgrade-skill') }}" class="list-item {{ @$subNavUpgradeSkillActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Upgrade Skills') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.team-member') }}" class="list-item {{ @$subNavTeamMemberActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Team Member') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.instructor-support') }}" class="list-item {{ @$subNavInstructorSupportActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Instructor Support') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.about.client') }}" class="list-item {{ @$subNavClientActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Client') }}</span>
                </a>
            </li>

        </ul>
    </div> --}}

    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h2>{{ __('Contact Us') }}</h2>

            <li>
                <a href="{{ route('settings.contact.cms') }}" class="list-item {{ @$contactUsSettingsActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Contact Us') }}</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidebar__item">
        <ul class="sidebar__mail__nav">
            <h2>{{ __('Others Settings') }}</h2>

            <li>
                <a href="{{ route('settings.cache-settings') }}" class="list-item {{ @$cacheActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Cache Settings') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.migrate-settings') }}" class="list-item {{ @$migrateActiveClass }}">
                    <img src="{{ asset('admin/images/heroicon/outline/cog.svg') }}" alt="icon">
                    <span>{{ __('Migrate Settings') }}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
