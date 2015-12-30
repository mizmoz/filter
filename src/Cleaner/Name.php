<?php
/**
 * All rights reserved. No part of this code may be reproduced, modified,
 * amended or retransmitted in any form or by any means for any purpose without
 * prior written consent of Mizmoz Limited.
 * You must ensure that this copyright notice remains intact at all times
 *
 * @package Mizmoz
 * @copyright Copyright (c) Mizmoz Limited 2015. All rights reserved.
 */

namespace Mizmoz\Filter\Cleaner;

use Mizmoz\Filter\Contract\Filter;

/**
 * Filter a string and return it's forename and surname parts
 */
class Name implements Filter
{
    /**
     * @inheritdoc
     */
    public function filter($value)
    {
        $parts = explode(' ', $value);

        $parts = array_map(function ($part) {
            return mb_convert_case($part, MB_CASE_TITLE);
        }, $parts, array_keys($parts));

        $forename = $parts[0];

        unset($parts[0]);
        $surname = (count($parts) ? implode(' ', $parts) : '');

        return [
            'forename' => $forename,
            'surname' => $surname
        ];
    }
}
