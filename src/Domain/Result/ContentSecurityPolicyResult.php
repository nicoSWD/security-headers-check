<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\Result;

final class ContentSecurityPolicyResult extends GenericHeaderAuditResult
{
    public function hasSecureFrameAncestorsDirective()
    {
        return true;
//        $this->headerValidator->warnings();
    }
}
