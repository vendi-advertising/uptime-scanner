<?php

namespace App\InspectionResults;

final class PassInspectionResult extends InspectionResultBase
{
    public function __construct(string $inspectionType, string $message)
    {
        parent::__construct(self::INSPECTION_RESULT_PASS, $inspectionType, $message);
    }
}
