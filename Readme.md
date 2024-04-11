# SiValidator2

Creator: Shun Itoh by Spiral Inc.

このプログラムはスパイラル社のSpiral v1で利用できます。
## SiValidation2

SiValidator2クラスを使用してバリデーションを行います。以下は基本的な使い方の一例です。

```php
//<!-- SMP_DYNAMIC_PAGE DISPLAY_ERRORS=ON NAME=xxx -->
require_once 'SiValidator2/require.php';

$values = ['event_date' => '2022-01-02'];
$rules = ['event_date' => ['before:2022-01-03']];
$validator = SiValidator2::make($values, $rules);

if ($validator->isError()) {
    echo "エラーがあります。";
    print_r($validator->getResults());
} else {
    echo "バリデーションに成功しました。";
}

```
配列のバリデーションも可能です。

```php
//<!-- SMP_DYNAMIC_PAGE DISPLAY_ERRORS=ON NAME=xxx -->
require_once 'SiValidator2/require.php';

$values = [
    ['event_date' => '2022-01-02'],
    ['event_date' => '2022-01-03'],
    ['event_date' => '2022-01-04'],
];
$rules = ['items.*.event_date' => ['before:2022-01-03']];
$validator = SiLibrary\SiValidator2::make(['items' => $values], $rules);

if ($validator->isError()) {
    echo "エラーがあります。";
    print_r($validator->getResults());
} else {
    echo "バリデーションに成功しました。";
}
```

#バリデーションルール

```
required: 値が必須であることを確認します。

accepted: 値が「yes」、「on」、「1」、または「true」であることを確認します。

accepted_if: 指定した他のフィールドが特定の値の場合に、このフィールドが受け入れられることを確認します。

active_url: 値が有効なURLであることを確認します。

after: 値が指定した日付より後であることを確認します。

after_or_equal: 値が指定した日付と同じ、またはそれより後であることを確認します。

alpha: 値が英字のみで構成されていることを確認します。

alphadash: 値が英字、数字、ダッシュ (-)、アンダースコア () のみで構成されていることを確認します。

alpha_num: 値が英字と数字のみで構成されていることを確認します。

before: 値が指定した日付より前であることを確認します。

before_or_equal: 値が指定した日付と同じ、またはそれより前であることを確認します。

date_equals: 値が指定した日付と等しいことを確認します。

date_format: 値が指定したフォーマットの日付であることを確認します。

date: 値が有効な日付であることを確認します。

between: 値が指定した最小値と最大値の間にあることを確認します。

boolean: 値がブール値（true または false）であることを確認します。

confirmed: 対応する確認フィールドと値が一致していることを確認します。

declined: 値が「no」、「off」、「0」、または「false」であることを確認します。

declined_if: 指定した他のフィールドが特定の値の場合に、このフィールドが拒否されることを確認します。

different: 指定したフィールドと値が異なることを確認します。

digits: 値が指定した数の数字であることを確認します。

digits_between: 値の長さが指定した最小値と最大値の間であることを確認します。

email: 値が有効なメールアドレスであることを確認します。

exclude_if: 指定した他のフィールドが特定の値の場合に、このフィールドを除外します。

exclude_unless: 指定した他のフィールドが特定の値でない場合に、このフィールドを除外します。

exclude_without: 指定した他のフィールドが存在しない場合に、このフィールドを除外します。

exists: 指定したデータベーステーブルの指定したカラムに値が存在することを確認します。

unique: 値が指定したデータベーステーブルの指定したカラムに存在しないことを確認します。

timezone: 値が有効なタイムゾーンであることを確認します。

string: 値が文字列であることを確認します。

regex: 値が指定した正規表現に一致することを確認します。

not_regex: 値が指定した正規表現に一致しないことを確認します。

numeric: 値が数字であることを確認します。

min: 値が指定した最小値以上であることを確認します。

max: 値が指定した最大値以下であることを確認します。

max_bytes: 値のバイト数が指定した最大値以下であることを確認します。

json: 値が有効なJSON文字列であることを確認します。

integer: 値が整数であることを確認します。

```

# エラーメッセージの取得
getResultsメソッドを使用して、バリデーションの結果やエラーメッセージを取得することができます。

```php
$validator = SiValidator2::make($values, $rules);
$results = $validator->getResults();

foreach ($results as $key => $result) {
    if ($result->isError()) {
        echo $key . ": " . $result->message() . "\n";
    }
}

```