<?php

$files = glob(base_path('storage/temp/*'));

foreach ($files as $file)
{
	if (is_file($file))
		unlink($file);
}