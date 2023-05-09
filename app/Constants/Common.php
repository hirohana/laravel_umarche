<?php

namespace App\Constants;

class Common
{
    public const PRODUCT_ADD = '1';
    public const PRODUCT_REDUCE = '2';

    public const PRODUCT_LIST = [
      'add' => self::PRODUCT_ADD,
      'reduce' => self::PRODUCT_REDUCE
    ];

    public const ORDER_RECOMMEND = '0';
    public const ORDER_HIGHER = '1';
    public const ORDER_LOWER = '2';
    public const ORDER_LATER = '3';
    public const ORDER_OLDER = '4';

    public const SORT_ORDER = [
      'recommend' => self::ORDER_RECOMMEND,
      'higherPrice' => self::ORDER_HIGHER,
      'lowerPrice' => self::ORDER_LOWER,
      'later' => self::ORDER_LATER,
      'older' => self::ORDER_OLDER
    ];
}
