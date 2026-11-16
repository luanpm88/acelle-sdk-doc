<?php

namespace App\ApiReference;

/** The reference file lacks something this site reads, or holds it in another form. */
final class InvalidReference extends \RuntimeException
{
    public static function at(string $where, string $problem): self
    {
        return new self("API reference file, {$where}: {$problem}");
    }
}
