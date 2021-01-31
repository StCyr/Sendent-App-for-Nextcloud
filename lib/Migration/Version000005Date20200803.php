<?php

namespace OCA\Sendent\migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version000005Date20200803 extends SimpleMigrationStep {

  /**
   * @param IOutput $output
   * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
   * @param array $options
   * @return null|ISchemaWrapper
   */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		if (!$schema->hasTable('sndnt_stngky')) {
			$table = $schema->createTable('sndnt_stngky');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);


			$table->addColumn('key', 'string', [
				'notnull' => true,
				'length' => 254,
			]);
			$table->addColumn('name', 'string', [
				'notnull' => true,
				'length' => 254,
			]);
			$table->addColumn('templateid', 'integer', [
				'notnull' => true
			]);
			$table->addColumn('valuetype', 'string', [
				'notnull' => true,
				'length' => 254,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['key', 'name', 'templateid'], 'sendent_key_templateid_index');
		} else {
			$table = $schema->getTable('sndnt_stngky');
			$table->dropColumn('value');
		}








		if (!$schema->hasTable('sndnt_stnggrval')) {
			$table = $schema->createTable('sndnt_stnggrval');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);

			$table->addColumn('settingkeyid', 'integer', [
				'notnull' => true
			]);
			$table->addColumn('groupid', 'integer', [
				'notnull' => true
			]);
			$table->addColumn('value', 'string', [
				'notnull' => true
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['settingkeyid', 'groupid'], 'sendent_keygroup_index');
		}





		if (!$schema->hasTable('sndnt_stngtmplt')) {
			$table = $schema->createTable('sndnt_stngtmplt');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);

			$table->addColumn('templatename', 'string', [
				'notnull' => true
			]);
			$table->setPrimaryKey(['id']);
		} else {
			$table = $schema->getTable('sndnt_stngtmplt');
			$table->dropColumn('templateName');
			$table->addColumn('templatename', 'string', [
				'notnull' => true
			]);
		}

		//new since licensing feature - connecteduser
		if (!$schema->hasTable('sndnt_connuser')) {
			$table = $schema->createTable('sndnt_connuser');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);

			$table->addColumn('userid', 'string', [
				'notnull' => true
			]);
			$table->addColumn('dateconnected', 'string', [
				'notnull' => true
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['userid'], 'sendent_connuserid_index');
		}
		return $schema;
	}
}
