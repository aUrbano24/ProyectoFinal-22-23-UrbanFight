<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute 必须被接受。',
'accepted_if' => '当 :other 为 :value 时，:attribute 必须被接受。',
'active_url' => ':attribute 不是一个有效的网址。',
'after' => ':attribute 必须是 :date 之后的日期。',
'after_or_equal' => ':attribute 必须是 :date 之后或等于该日期。',
'alpha' => ':attribute 只能包含字母。',
'alpha_dash' => ':attribute 只能包含字母、数字、破折号和下划线。',
'alpha_num' => ':attribute 只能包含字母和数字。',
'array' => ':attribute 必须是一个数组。',
'before' => ':attribute 必须是 :date 之前的日期。',
'before_or_equal' => ':attribute 必须是 :date 之前或等于该日期。',
'between' => [
'numeric' => ':attribute 必须介于 :min 和 :max 之间。',
'file' => ':attribute 必须介于 :min 和 :max 千字节之间。',
'string' => ':attribute 必须包含 :min 到 :max 个字符。',
'array' => ':attribute 必须包含 :min 到 :max 个项目。',
],
'boolean' => ':attribute 字段必须为真或假。',
'confirmed' => ':attribute 的确认不匹配。',
'current_password' => '密码不正确。',
'date' => ':attribute 不是一个有效的日期。',
'date_equals' => ':attribute 必须等于 :date。',
'date_format' => ':attribute 与格式 :format 不匹配。',
'declined' => ':attribute 必须被拒绝。',
'declined_if' => '当 :other 为 :value 时，:attribute 必须被拒绝。',
'different' => ':attribute 和 :other 必须不同。',
'digits' => ':attribute 必须为 :digits 位数字。',
'digits_between' => ':attribute 必须为介于 :min 和 :max 位数字。',
'dimensions' => ':attribute 图片尺寸无效。',
'distinct' => ':attribute 字段的值不能重复。',
'email' => ':attribute 必须是一个有效的电子邮件地址。',
'ends_with' => ':attribute 必须以以下值之一结尾：:values。',
'enum' => ':attribute 的选择无效。',
'exists' => '选定的 :attribute 无效。',
'file' => ':attribute 必须是一个文件。',
'filled' => ':attribute 字段必须有一个值。',
'gt' => [
'numeric' => ':attribute 必须大于 :value。',
'file' => ':attribute 必须大于 :value 千字节。',
'string' => ':attribute 必须大于 :value 个字符。',
'array' => ':attribute 必须包含多于 :value 个项目。',
],
'gte' => [
'numeric' => ':attribute 必须大于或等于 :value。',
'file' => ':attribute 必须大于或等于 :value 千字节。',
'string' => ':attribute 必须大于或等于 :value 个字符。',
'array' => ':attribute 必须包含 :value 个项目或更多。',
],
'image' => ':attribute 必须是一张图片。',
'in' => '选定的 :attribute 无效。',
'in_array' => ':attribute 字段不存在于 :other 中。',
'integer' => ':attribute 必须是一个整数。',
'ip' => ':attribute 必须是一个有效的 IP 地址。',
'ipv4' => ':attribute 必须是一个有效的 IPv4 地址。',
'ipv6' => ':attribute 必须是一个有效的 IPv6 地址。',
'json' => ':attribute 必须是一个有效的 JSON 字符串。',
'lt' => [
'numeric' => ':attribute 必须小于 :value。',
'file' => ':attribute 必须小于 :value 千字节。',
'string' => ':attribute 必须小于 :value 个字符。',
'array' => ':attribute 必须少于 :value 个项目。',
],
'lte' => [
'numeric' => ':attribute 必须小于或等于 :value。',
'file' => ':attribute 必须小于或等于 :value 千字节。',
'string' => ':attribute 必须小于或等于 :value 个字符。',
'array' => ':attribute 不能超过 :value 个项目。',
],
'mac_address' => ':attribute 必须是一个有效的 MAC 地址。',
'max' => [
'numeric' => ':attribute 不能大于 :max。',
'file' => ':attribute 不能大于 :max 千字节。',
'string' => ':attribute 不能大于 :max 个字符。',
'array' => ':attribute 不能超过 :max 个项目。',
],
'mimes' => ':attribute 必须是以下类型的文件: :values。',
'mimetypes' => ':attribute 必须是以下类型的文件: :values。',
'min' => [
'numeric' => ':attribute 必须至少为 :min。',
'file' => ':attribute 必须至少为 :min 千字节。',
'string' => ':attribute 必须至少为 :min 个字符。',
'array' => ':attribute 必须至少包含 :min 个项目。',
],
'multiple_of' => ':attribute 必须是 :value 的倍数。',
'not_in' => '选定的 :attribute 无效。',
'not_regex' => ':attribute 的格式无效。',
'numeric' => ':attribute 必须是一个数字。',
'password' => '密码不正确。',
'present' => ':attribute 字段必须存在。',
'prohibited' => ':attribute 字段是禁止的。',
'prohibited_if' => ':attribute 字段在 :other 为 :value 时被禁止。',
'prohibited_unless' => ':attribute 字段仅在 :other 不为 :values 时被禁止。',
'prohibits' => ':attribute 字段禁止 :other 存在。',
'regex' => ':attribute 的格式无效。',
'required' => ':attribute 字段是必需的。',
'required_if' => '当 :other 为 :value 时，:attribute 字段是必需的。',
'required_unless' => '除非 :other 为 :values，否则 :attribute 字段是必需的。',
'required_with' => '当 :values 存在时，:attribute 字段是必需的。',
'required_with_all' => '当 :values 存在时，:attribute 字段是必需的。',
'required_without' => '当 :values 不存在时，:attribute 字段是必需的。',
'required_without_all' => '当 :values 都不存在时，:attribute 字段是必需的。',
'same' => ':attribute 和 :other 必须匹配。',
'size' => [
'numeric' => ':attribute 必须为 :size。',
'file' => ':attribute 必须为 :size 千字节。',
'string' => ':attribute 必须包含 :size 个字符。',
'array' => ':attribute 必须包含 :size 个项目。',
],
'starts_with' => ':attribute 必须以以下值之一开头：:values。',
'string' => ':attribute 必须是一个字符串。',
'timezone' => ':attribute 必须是一个有效的时区。',
'unique' => ':attribute 已经存在。',
'uploaded' => ':attribute 上传失败。',
'url' => ':attribute 的格式无效。',
'uuid' => ':attribute 必须是一个有效的 UUID。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
