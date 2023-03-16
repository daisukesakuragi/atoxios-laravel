<footer class="tw-footer tw-footer-center tw-p-10 tw-bg-base-100 tw-text-base-content">
    <ul class="tw-flex tw-flex-col tw-items-center lg:tw-flex-row tw-gap-6">
        <li>
            <a class="tw-link tw-link-hover" href="https://docs.google.com/forms/d/e/1FAIpQLSd2VdyNhecExPmiLRxpU0ESJaq05lD7upcdyvW199CN65IR3A/viewform" target="_blank
            " rel="noopener">出品を希望される方へ</a>
        </li>
        <li>
            <a href="{{ route('about-us') }}" class="tw-link tw-link-hover">
                {{ __('会社概要') }}
            </a>
        </li>
        <li>
            <a href="{{ route('terms-of-use') }}" class="tw-link tw-link-hover">
                {{ __('利用規約') }}
            </a> 
        </li>
        <li>
            <a href="{{ route('privacy') }}" class="tw-link tw-link-hover">
                {{ __('プライバシーポリシー') }}
            </a> 
        </li>
        <li>
            <a href="{{ route('tokushoho') }}" class="tw-link tw-link-hover">
                {{ __('特定商取引法に基づく表記') }}
            </a>
        </li>
        <li>
            <a class="tw-link tw-link-hover" href="mailto:info@atoxios.com" >お問い合わせ</a>
        </li>
    </ul>
    <div>
        <div class="tw-grid tw-grid-flow-col tw-gap-4">
            <a href="https://twitter.com/ATOXIOS_PR" rel="noopener" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="tw-fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
            </a> 
            <a href="https://www.instagram.com/atoxios_pr" rel="noopener" target="_blank">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-6 tw-h-6" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
            </a> 
            <a href="https://www.facebook.com/profile.php?id=100079335878656" rel="noopener" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="tw-fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg>
            </a>
        </div>
    </div> 
    <div>
        <p>Copyright © {{ date('Y') }} - All right reserved by ATOXIOS Inc</p>
    </div>
</footer>