<?php

// copy-files.php

$sourceDir = __DIR__ . '/vendor/zhanyichen/dbt/assets/';
$destDir = __DIR__ . '/app/dbt/';

// 确保目标目录存在
if (!is_dir($destDir)) {
    mkdir($destDir, 0777, true);
}

// 使用递归复制函数复制文件
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

foreach ($iterator as $fileinfo) {
    $targetPath = $destDir . $iterator->getSubPathName();
    if ($fileinfo->isDir()) {
        mkdir($targetPath, 0777, true);
    } else {
        copy($fileinfo->getRealPath(), $targetPath);
    }
}
