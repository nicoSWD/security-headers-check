<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\Result;

use nicoSWD\SecHeaderCheck\Domain\Validator\ValidationError;

final class ScanResult
{
    /** @var float */
    private $score = .0;
    /** @var array */
    private $warnings = [];

    public function addWarnings(string $headerName, array $warnings): void
    {
        $this->warnings[$headerName] = $warnings;
    }

    public function sumScore(float $score): void
    {
        $this->score += $score;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function addDuplicateHeaderWarning(string $headerName): void
    {
        $this->addWarnings($headerName, [ValidationError::HEADER_DUPLICATE]);
    }

    public function addMissingHeaderWarning(string $headerName): void
    {
        $this->addWarnings($headerName, [ValidationError::HEADER_MISSING]);
    }
}
