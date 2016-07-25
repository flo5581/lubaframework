<?php

namespace Luba\Framework;

class Log
{
	public static function write($content)
	{
		if (!is_dir(base_path('storage/logs')))
			mkdir(base_path('storage/logs'));

		$name = date("Y-m-d_H-i-s") . '.log';

		dd(file_put_contents(base_path("storage/logs/$name"), $content));
	}

	public static function exception($exception)
	{
		static::write($exception->getTraceAsString());
	}
}