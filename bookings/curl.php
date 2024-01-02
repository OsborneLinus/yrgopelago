<?php
class CurlHandling
{
    public function transferCode($transferCode, $dates, $roomType)
    {
        $baseCost = 0;
        if ($roomType === 'standard') {
            $baseCost = 8;
        } elseif ($roomType === 'deluxe') {
            $baseCost = 12;
        } elseif ($roomType === 'superior') {
            $baseCost = 15;
        };
        $totalCost = count($dates) * $baseCost;

        $data = [
            'transferCode' => $transferCode,
            'totalcost' => $totalCost
        ];



        $curlTransfer = curl_init();
        curl_setopt($curlTransfer, CURLOPT_URL, 'https://www.yrgopelag.se/centralbank/transferCode');
        curl_setopt($curlTransfer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlTransfer, CURLOPT_POST, true);
        curl_setopt($curlTransfer, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curlTransfer, CURLOPT_VERBOSE, true);
        $response = curl_exec($curlTransfer);
        $httpCode = curl_getinfo($curlTransfer, CURLINFO_HTTP_CODE);
        curl_close($curlTransfer);

        if ($httpCode === 200) {
            $responseData = json_decode($response, true);
        } else {
            echo "The fetch failed. HTTP ERROR:" . $httpCode;
        }
    }

    public function deposit($transferCode)
    {
        $username = 'Linus';


        $data = [
            'user' => $username,
            'transferCode' => $transferCode
        ];


        $curlDeposit = curl_init();
        curl_setopt($curlDeposit, CURLOPT_URL, 'https://www.yrgopelag.se/centralbank/deposit');
        curl_setopt($curlDeposit, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlDeposit, CURLOPT_POST, true);
        curl_setopt($curlDeposit, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curlDeposit);
        $httpCode = curl_getinfo($curlDeposit, CURLINFO_HTTP_CODE);
        curl_close($curlDeposit);

        /*         if ($httpCode === 200) {
            return 'cURL fetch was successfull!';
        } else {
            return 'cURL was not successfull.';
        } */
    }
}
