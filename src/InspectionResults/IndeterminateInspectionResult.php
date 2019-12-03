<?php

namespace App\InspectionResults;

class IndeterminateInspectionResult extends InspectionResultBase
{
    public function __construct(string $inspectionType, string $message)
    {
        parent::__construct(self::INSPECTION_RESULT_INDETERMINATE, $inspectionType, $message);
    }
}
