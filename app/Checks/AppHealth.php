<?php

namespace App\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class AppHealth extends Check
{
    public function run(): Result
    {
        $usedDiskSpacePercentage = $this->getDiskUsagePercentage();

        $result = Result::make();

        if ($usedDiskSpacePercentage > 90) {
            return $result->failed("The disk is almost full ({$usedDiskSpacePercentage} % used)");
        }

        if ($usedDiskSpacePercentage > 70) {
            return $result->warning("The disk getting full ({$usedDiskSpacePercentage}% used)");
        }

        dd($result);

        return $result->ok();
    }

    protected function getDiskUsagePercentage(): int
    {
        $totalDiskSpace = disk_total_space('/');
        $freeDiskSpace = disk_free_space('/');

        $usedDiskSpace = $totalDiskSpace - $freeDiskSpace;

        return round(($usedDiskSpace / $totalDiskSpace) * 100);
    }
}