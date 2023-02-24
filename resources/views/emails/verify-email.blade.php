@component('mail::message')
この度は、弊社オークションサービスのユーザー登録に申請いただき、誠にありがとうございます。

下記の認証ボタンより登録メールアドレスの認証をお願い致します。

@component('mail::button', ['url' => $verify_url])
メールアドレスを認証する
@endcomponent

アカウントを作成済みでない場合は、お手数をおかけしますが、弊社ホームページよりアカウント作成をお願い致します。

このメールにお心あたりの無い場合は、ご放念ください。

今後ともATOXIOS株式会社を宜しくお願い致します。

ATOXIOS株式会社<br>
メールアドレス: <a href="mailto:info@atoxios.com">info@atoxios.com</a><br>
電話番号: <a href="tel:03-6823-2457">03-6823-2457</a>

<hr>

*上記の"メールアドレスを認証する"ボタンがクリックできない場合は、以下のURLに直接アクセスしてください。

<a href="{{ $verify_url }}" target="_blank" rel="noopener">{{ $verify_url }}</a>

@endcomponent