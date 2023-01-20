<?php

namespace OCA\Sendent;

class Constants {
	public const CONFIG_UPLOAD_TAG = 'tag:upload';
	public const CONFIG_REMOVED_TAG = 'tag:removed';
	public const CONFIG_EXPIRED_TAG = 'tag:expired';
	public const APPS_REQUIRED = ["core", "files", "dav", "ocm", "files_sharing", "password_policy", "theming"];
	public const APPS_RECOMMENDED = ["activity", "talk"];
}
