<?php

namespace App\Inspections;

use App\InspectionResults\InspectionResultInterface;

interface InspectionInterface
{
    public function performInspection(): void;

    public function getInspectionResult(): InspectionResultInterface;
}
