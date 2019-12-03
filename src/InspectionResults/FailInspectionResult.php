<?php

namespace App\InspectionResults;

class FailInspectionResult extends InspectionResultBase
{
    public function __construct(string $inspectionType, string $message)
    {
        parent::__construct(self::INSPECTION_RESULT_FAIL, $inspectionType, $message);
    }
}
