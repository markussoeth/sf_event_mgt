<?php

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace DERHANSEN\SfEventMgt\Tests\Functional\Repository;

use DERHANSEN\SfEventMgt\Domain\Repository\OrganisatorRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Repository\OrganisatorRepository
 */
class OrganisatorRepositoryTest extends FunctionalTestCase
{
    /** @var \DERHANSEN\SfEventMgt\Domain\Repository\OrganisatorRepository */
    protected $organisatorRepository;

    /** @var array */
    protected $testExtensionsToLoad = ['typo3conf/ext/sf_event_mgt'];

    /**
     * Setup
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->organisatorRepository = GeneralUtility::makeInstance(OrganisatorRepository::class);

        $this->importDataSet(__DIR__ . '/../Fixtures/tx_sfeventmgt_domain_model_organisator.xml');
    }

    /**
     * Test if startingpoint is ignored
     *
     * @test
     */
    public function findRecordsByUid()
    {
        $locations = $this->organisatorRepository->findAll();
        self::assertEquals(2, $locations->count());
    }
}
