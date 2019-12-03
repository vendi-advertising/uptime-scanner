<?php

namespace App\InspectionResults;

abstract class InspectionResultBase implements InspectionResultInterface
{
    /* @var string */
    private $inspectionType;

    /* @var string */
    private $status;

    /* @var string */
    private $message;

    public function __construct(string $status, string $inspectionType, string $message = null)
    {
        $this->inspectionType = $inspectionType;
        $this->status = $status;
        $this->message = $message;
    }

    final public function getInspectionType(): string
    {
        return $this->inspectionType;
    }

    final public function didInspectionPass(): bool
    {
        return $this->getInspectionStatus() === InspectionResultBase::INSPECTION_RESULT_PASS;
    }

    final public function didInspectionFail(): bool
    {
        return $this->getInspectionStatus() === InspectionResultBase::INSPECTION_RESULT_FAIL;
    }

    final public function getInspectionStatus(): string
    {
        return $this->status;
    }

    final public function getInspectionMessage(): string
    {
        return $this->message;
    }
}
