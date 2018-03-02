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
namespace Belvg\WelcomeAgreementSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \Belvg\WelcomeAgreementSampleData\Model\Agreement
     */
    private $agreement;


    public function __construct(
        \Belvg\WelcomeAgreementSampleData\Model\Agreement $agreement
    ) {
        $this->agreement = $agreement;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->agreement->install(['Belvg_WelcomeAgreementSampleData::fixtures/belvg_welcomeagreement_agreement.csv']);
    }
}
