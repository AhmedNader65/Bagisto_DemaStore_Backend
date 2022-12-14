<?php

/**
 * JSONPath implementation for PHP.
 *
 * @license https://github.com/SoftCreatR/JSONPath/blob/main/LICENSE  MIT License
 */

declare(strict_types=1);

namespace Flow\JSONPath\Filters;

use ArrayAccess;
use Flow\JSONPath\{JSONPath, JSONPathToken};

abstract class AbstractFilter
{
    protected JSONPathToken $token;

    protected bool $magicIsAllowed = false;

    public function __construct(JSONPathToken $token, int|bool $options = false)
    {
        $this->token = $token;
        $this->magicIsAllowed = (bool)($options & JSONPath::ALLOW_MAGIC);
    }

    abstract public function filter(array|ArrayAccess $collection): array;
}
