<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\Result\Result;

use nicoSWD\SecHeaderCheck\Domain\Result\AbstractParsedHeader;

final class XContentTypeOptionsHeaderResult extends AbstractParsedHeader
{
    private $isNoSniff = false;

    public function isSecure(): bool
    {
        return $this->isNoSniff();
    }

    public function setIsNoSniff(bool $isNoSniff): self
    {
        $this->isNoSniff = $isNoSniff;

        return $this;
    }

    public function isNoSniff(): bool
    {
        return $this->isNoSniff;
    }
}
