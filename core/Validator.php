<?php

namespace Core;

class Validator {
  public static function required($value) {
    return strlen(trim($value)) > 0;
  }

  public static function isNumber($value) {
    if(is_int($value)) {
      return true;
    }
    return false;
  }
}