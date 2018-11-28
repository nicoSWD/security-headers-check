<?php

/**
 * @license  http://opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/nicoSWD
 * @author   Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\SecHeaderCheck\Domain\ResultPrinter;

use nicoSWD\SecHeaderCheck\Domain\Result\ResultSet;

interface ResultPrinterInterface
{
    public function getOutput(ResultSet $resultSet): string;
}
