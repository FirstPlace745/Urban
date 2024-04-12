<?php

namespace AnzahTools\Promote;

use XF\AddOn\AbstractSetup;
use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;

class Setup extends AbstractSetup
{
	public function install(array $stepParams = [])
	{
        $sm = $this->schemaManager();

        $sm->alterTable('xf_user_group', function (Alter $table)
        {
            $table->addColumn('at_promote_primaryGroupSelect', 'bool')->setDefault(0);
            $table->addColumn('at_promote_secondaryGroupSelect', 'bool' )->setDefault(0);
        });
	}

	public function upgrade(array $stepParams = [])
	{

	}

	public function uninstall(array $stepParams = [])
	{
        $sm = \XF::db()->getSchemaManager();

        $sm->alterTable('xf_user_group', function (Alter $table)
        {
            $table->dropColumns('at_promote_primaryGroupSelect');
            $table->dropColumns('at_promote_secondaryGroupSelect');
        });
	}




}