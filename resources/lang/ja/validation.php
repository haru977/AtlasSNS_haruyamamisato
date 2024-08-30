<?php
return [
    'required' => ':attribute は必須項目です',
    'mail' => ':attribute は有効なメールアドレスである必要があります',
    'min' => [
        'string' => ':attribute は最低 :min 文字必要です',
    ],
    'max' => [
        'string' => ':attribute は最大 :max 文字までです',
    ],
    'unique' => ':attribute は既に使用されています',
    // 他のバリデーションメッセージもここに追加できます
    'attributes' => [
        'username' => 'ユーザー名',
        'mail' => 'メールアドレス',
        'password' => 'パスワード',
    ],
];
