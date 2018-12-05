<?php declare(strict_types=1);

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Infrastructure\ResultPrinter;

use nicoSWD\SecHeaderCheck\Domain\Result\ScanResult;
use nicoSWD\SecHeaderCheck\Domain\ResultPrinter\ResultPrinterInterface;

final class XMLResultPrinter implements ResultPrinterInterface
{
    public function getOutput(ScanResult $scanResults): string
    {
        return '<xml></xml>';
    }
}
