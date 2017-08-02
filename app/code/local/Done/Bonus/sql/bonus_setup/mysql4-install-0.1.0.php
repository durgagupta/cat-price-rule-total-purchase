<?php

$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('salesrule'), 'store_views','varchar(255) NULL DEFAULT NULL');

$installer->endSetup();