<?php

namespace EugMerkeleon\Support\AutoDoc\Tests;

use EugMerkeleon\Support\AutoDoc\Http\Middleware\AutoDocMiddleware;
use EugMerkeleon\Support\AutoDoc\Services\SwaggerService;

trait AutoDocTestCaseTrait
{
    protected $docService;

    public function setUp(): void
    {
        parent::setUp();

        $this->docService = app(SwaggerService::class);
    }

    /**
     * Disabling documentation collecting on current test
     */
    public function skipDocumentationCollecting()
    {
        AutoDocMiddleware::$skipped = true;
    }

    public function tearDown(): void
    {
        if (!$this->isInIsolation())
        {
            $currentTestCount = $this->getTestResultObject()
                                     ->count();
            $allTestCount     = $this->getTestResultObject()
                                     ->topTestSuite()
                                     ->count();

            if (!$this->hasFailed() && ($currentTestCount === $allTestCount))
            {
                $this->docService->saveProductionData();
            }
        }


        parent::tearDown();
    }
}
