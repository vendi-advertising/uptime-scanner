<?php

namespace App\InspectionResults;

interface InspectionResultInterface
{

    public const INSPECTION_RESULT_PASS = 'pass';
    public const INSPECTION_RESULT_FAIL = 'fail';
    public const INSPECTION_RESULT_INDETERMINATE = 'indeterminate';

    public function getInspectionType(): string;

    public function didInspectionPass(): bool;

    public function didInspectionFail(): bool;

    public function getInspectionStatus(): string;

    public function getInspectionMessage(): string;
}
