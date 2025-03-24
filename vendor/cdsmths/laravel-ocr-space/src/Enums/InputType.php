<?php

namespace Codesmiths\LaravelOcrSpace\Enums;

enum InputType: string
{
    case Base64 = 'base64';
    case File = 'file';
    case Url = 'url';
    case Binary = 'binary';
}
