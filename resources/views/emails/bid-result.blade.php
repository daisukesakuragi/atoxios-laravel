<x-mail::message>
# 落札確定メール

{{ $user_name }} 様

平素は大変お世話になっております。

ATOXIOS株式会社です。

この度は、{{ $member_name }}とのイベントにて無事落札されたことをご報告致します。

ご入札頂き誠にありがとうございます。

下記にて、当日までの流れを記載致しております。ご確認の上、お手続きの程を宜しくお願い致します。

## 【STEP 1 本人確認】

本人確認のご提出を下記のリンク(Google フォーム)より本日中迄に何卒宜しくお願い致します。

<x-mail::button :url="'https://docs.google.com/forms/d/e/1FAIpQLSdhTmpE9c6uc7pk-hXjauA6GRQ6RtJCNCLudwyqznds4Wzysg/formrestricted'">本人確認申請フォーム</x-mail::button>

※本人確認のご提出が1日経っても確認できない場合は、イベント権利が別のユーザーへ移りますのでご留意ください。

## 【STEP 2 お支払い】

落札金額のご入金をお願い致します。

<x-mail::table>
|  |  |
| ------------- |:--------:|
| 金額 | {{ $price }}円（税込） |
| 支払期日 | {{ $due_date }} |
| 振込方法 | 銀行振込み |
| 銀行名 | GMOあおぞらネット銀行(0310) |
| 支店名 | 法人営業部(101) |
| 口座種別 | 普通 |
| 口座番号 | 1402185 |
| 口座名義 | ｱﾄｼｵｽ（ｶ |
</x-mail::table>

*お振込み手数料はお客様負担となりますので、予めご了承ください。

*キャンセル又は期日までにご入金が確認できない場合は、食事イベント及び対談する権利が移転する恐れがございますのでご留意下さい。

## 【STEP 3 当日案内】

<x-mail::table>
|  |  |
| ------------- |:--------:|
| 開始日時 | {{ $event_held_at }} |
| 会場 | {{ $event_location }} |
| 出品者 | {{ $member_name }} |
| 集合場所 | {{ $event_meeting_location }} |
| 集合時間 | {{ $event_meeting_time }} |
</x-mail::table>

*お支払い頂く前に、下記の利用規約及びキャンセルポリシーを必ずお読みください。

<x-mail::button :url="$app_url . '/terms-of-use'">ATOXIOS | 利用規約</x-mail::button>

*ご入金後にキャンセルされた場合は、ご返金することは出来かねます。

ご返金の代わりに"バウチャー"を発行致します。

<x-mail::button :url="$app_url . '/terms-of-use'">バウチャーとは？「キャンセルについて」をご参照ください</x-mail::button>

ご不明な点やご質問等はお気軽にお問い合わせください。

何卒よろしくお願い申し上げます。

ATOXIOS株式会社

メールアドレス <a href="mailto:info@atoxios.com">info@atoxios.com</a>
電話番号 <a href="tel:03-6823-2457">03-6823-2457</a>

</x-mail::message>