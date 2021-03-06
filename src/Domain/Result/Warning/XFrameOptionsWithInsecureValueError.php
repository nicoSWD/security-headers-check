<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\Result\Warning;

use nicoSWD\SecHeaderCheck\Domain\Result\Error;

final class XFrameOptionsWithInsecureValueError extends Error
{
    protected $message = "Either 'sameorigin', 'deny' or 'allow-from' are expected";
}
