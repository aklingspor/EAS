<?php
$queryString = http_build_query([
  'access_key' => '08d9a9c3b45bf0be7f7627fbc557f953', 'symbols' => 'TSLA'
]);

$ch = curl_init(sprintf('%s?%s', 'http://api.marketstack.com/v1/tickers/aapl/eod', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$apiResult = json_decode($json, true);

foreach ($apiResult['data'] as $stocksData) {
  echo sprintf('Ticker %s has a day high of %s on %s', $stockData['symbol'], $stockData['high'], $stockData['date'] )
}
?>
