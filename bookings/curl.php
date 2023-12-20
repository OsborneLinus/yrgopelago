<?php
class CurlHandling
{
    public function transferCode($transferCode, $totalcost)
    {
        $data = [
            'transferCode' => $transferCode,
            'totalcost' => $totalcost
        ];


        $curlTransfer = curl_init();
        curl_setopt($curlTransfer, CURLOPT_URL, 'https://www.yrgopelag.se/centralbank/transferCode');
        curl_setopt($curlTransfer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlTransfer, CURLOPT_POST, true);
        curl_setopt($curlTransfer, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curlTransfer);
        $httpCode = curl_getinfo($curlTransfer, CURLINFO_HTTP_CODE);
        curl_close($curlTransfer);

        /*         if ($httpCode === 200) {
            return 'cURL fetch was successfull!';
        } else {
            return 'cURL fetch failed!';
        } */
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
