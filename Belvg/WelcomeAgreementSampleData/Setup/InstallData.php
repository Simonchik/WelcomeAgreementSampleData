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

class InstallData implements Setup\InstallDataInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var Installer
     */
    protected $installer;

    public function __construct(Setup\SampleData\Executor $executor, Installer $installer)
    {
        $this->executor = $executor;
        $this->installer = $installer;
    }

    /**
     * {@inheritdoc}
     */
    public function install(Setup\ModuleDataSetupInterface $setup, Setup\ModuleContextInterface $moduleContext)
    {
        $this->executor->exec($this->installer);
    }
}
