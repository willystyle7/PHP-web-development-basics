<?php
$n = intval(readline());
$fileDirectory = [];
for ($i = 0; $i < $n; $i++) {
    $path = readline();
    $info = explode("\\", $path);
    $rootDir = $info[0];
    $fileInfo = explode(";", $info[count($info) - 1]);
    $filename = $fileInfo[0];
    $size = $fileInfo[1];
    $fileParts = explode(".", $filename);
    $extention = $fileParts[count($fileParts) - 1];
    if (!key_exists($rootDir, $fileDirectory)) {
        $fileDirectory[$rootDir] = [];
    }
    if (!key_exists($extention, $fileDirectory[$rootDir])) {
        $fileDirectory[$rootDir][$extention] = [];
    }
    $fileDirectory[$rootDir][$extention][$filename] = $size;
}
$query = explode(" ", readline());
$whereToSearch = $query[2];
$extentionToSearch = $query[0];
if (!key_exists($whereToSearch, $fileDirectory)
    || !key_exists($extentionToSearch, $fileDirectory[$whereToSearch])) {
    echo "No\n";
    return;
}
$dict = $fileDirectory[$whereToSearch][$extentionToSearch];
uksort($dict, function ($a, $b) use ($dict) {
    if ($dict[$a] === $dict[$b]) return strcasecmp($a, $b);
    return $dict[$b] - $dict[$a];
});
foreach ($dict as $filename => $size) {
    echo "$filename - $size KB\n";
}