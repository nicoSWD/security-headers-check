<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\Result\Warning;

use nicoSWD\SecHeaderCheck\Domain\Result\Warning;

final class CookieWithMissingSecureFlagWarning extends Warning
{
    protected $message = 'Missing Secure flag';
}
