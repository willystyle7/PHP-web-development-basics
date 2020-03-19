<?php
$html = '<!DOCTYPE html><html><head><title>Report Grid Table</title><style>table {border-collapse: collapse;}table, th, td {border: 1px solid black;}tr:hover {background-color: #f5f5f5;}tr:nth-child(even) {background-color: #f2f2f2;}</style></head><body><h3 class="report-title">Application: Network Browser | Period: 12.03.2020 00:00 - 12.03.2020 23:59</h3><table><tbody><tr><th>DateTime</th><th>NB Gateways:Number of messages<br>[statsrhel7r4_devlab_opencode_com]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, 100, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, 101, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, 123, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, 555, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, 1000, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, WebsimApi, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, solomyr, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, default_metric, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[statsrhel7r4_devlab_opencode_com, v1_copy, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, 100, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, 101, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, 123, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, 555, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, 1000, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, WebsimApi, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, solomyr, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, default_metric, VXML]</th><th>NB Service Metrics:Avg Service Duration (sec)<br>[nb1, v1_copy, VXML]</th></tr>
<tr><td>2020-03-12</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>
</tbody></table></body></html>';
$regex = '/<h3 class="report-title">(.+)<\/h3>/';

// preg_match($regex, $html, $matches);
// var_dump($matches);
if (preg_match($regex, $html, $matches)) {
    $title = $matches[1];
} else {
    $title = 'Report Title';
}
echo $title . PHP_EOL;
