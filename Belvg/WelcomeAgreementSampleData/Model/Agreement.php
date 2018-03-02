<?php
/**
 * BelVG LLC.
 *
 *  NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt
 *
 *  ********************************************************************
 * @category   Belvg
 * @package    Belvg_WelcomeAgreementSampleData
 * @copyright  Copyright (c) 2010 - 2018 BelVG LLC. (https://belvg.com/)
 * @author     Alexander Simonchik <support@belvg.com>
 * @license    https://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt
 *
 *
 */

namespace Belvg\WelcomeAgreementSampleData\Model;

use Magento\Framework\Setup\SampleData\Context as SampleDataContext;

class Agreement
{
    /**
     * @var \Magento\Framework\Setup\SampleData\FixtureManager
     */
    private $fixtureManager;

    /**
     * @var \Magento\Framework\File\Csv
     */
    protected $csvReader;

    /**
     * @var \Belvg\WelcomeAgreement\Model\AgreementFactory
     */
    protected $agreementFactory;

    /**
     * Agreement constructor.
     * @param SampleDataContext $sampleDataContext
     * @param \Belvg\WelcomeAgreement\Model\AgreementFactory $agreementFactory
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        \Belvg\WelcomeAgreement\Model\AgreementFactory $agreementFactory
    ) {
        $this->fixtureManager = $sampleDataContext->getFixtureManager();
        $this->csvReader = $sampleDataContext->getCsvReader();
        $this->agreementFactory = $agreementFactory;
    }

    /**
     * @param array $fixtures
     * @throws \Exception
     */
    public function install(array $fixtures)
    {
        foreach ($fixtures as $fileName) {
            $fileName = $this->fixtureManager->getFixture($fileName);
            if (!file_exists($fileName)) {
                continue;
            }

            $rows = $this->csvReader->getData($fileName);
            $header = array_shift($rows);

            foreach ($rows as $row) {
                $data = [];
                foreach ($row as $key => $value) {
                    $data[$header[$key]] = $value;
                }
                $row = $data;

$aggr = $this->agreementFactory->create()
    //->load($row['identifier'], 'identifier')
    ->addData($row)
    ->setStores([
        \Magento\Store\Model\Store::DEFAULT_STORE_ID,
        \Magento\Store\Model\Store::DISTRO_STORE_ID
    ])
    ->save();
print_r([
    $row,
    $aggr->getData()
]);
                $this->agreementFactory->create()
                    //->load($row['identifier'], 'identifier')
                    ->addData($row)
                    ->setStores([
                        \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                        \Magento\Store\Model\Store::DISTRO_STORE_ID
                    ])
                    ->save();
            }
        }
    }
}
