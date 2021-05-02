<?php

namespace OCA\Sendent\migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version000010Date20210307 extends SimpleMigrationStep {

  /**
   * @param IOutput $output
   * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
   * @param array $options
   * @return null|ISchemaWrapper
   */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		//new since licensing feature - license
		if (!$schema->hasTable('sndnt_license')) {
			$table = $schema->createTable('sndnt_license');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);

			$table->addColumn('licensekey', 'string', [
				'notnull' => true
			]);
			$table->addColumn('email', 'string', [
				'notnull' => true
			]);
			$table->addColumn('maxusers', 'integer', [
				'notnull' => true
			]);
			$table->addColumn('maxgraceusers', 'integer', [
				'notnull' => true
			]);
			$table->addColumn('dategraceperiodend', 'string', [
				'notnull' => true
			]);
			$table->addColumn('datelicenseend', 'string', [
				'notnull' => true
			]);
			$table->addColumn('datelastchecked', 'string', [
				'notnull' => true
			]);
			$table->addColumn('level', 'string', [
				'notnull' => false
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['licensekey'], 'sendent_license_index');
		}else {
			$table = $schema->getTable('sndnt_license');
			// $table->dropColumn('key');
			// $table->addColumn('licensekey', 'string', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('email', 'string', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('level', 'string', [
			// 	'notnull' => false
			// ]);
			// $table->addColumn('maxusers', 'integer', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('maxgraceusers', 'integer', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('dategraceperiodend', 'string', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('datelicenseend', 'string', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('datelastchecked', 'string', [
			// 	'notnull' => true
			// ]);
			// $table->addColumn('licensekey', 'string', [
			// 	'notnull' => true
			// ]);
		}

		return $schema;
	}
}
