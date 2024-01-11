<?php

declare(strict_types=1);

class CurlHandling
{
    private $totalCost;

    public function transferCode(string $transferCode, array $dates, string $roomType): void
    {
        $baseCost = 0;
        if ($roomType === 'standard') {
            $baseCost = 8;
        } elseif ($roomType === 'deluxe') {
            $baseCost = 12;
        } elseif ($roomType === 'superior') {
            $baseCost = 15;
        }

        $features = $_POST['features'];
        $featureCost = $this->calculateFeatureCost($features);

        $this->totalCost = count($dates) * $baseCost + $featureCost;

        $data = [
            'transferCode' => $transferCode,
            'totalcost' => $this->totalCost
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
            if (isset($responseData['error'])) {
                $errorMessage = $responseData['error'];
                $formattedErrorMessage = '<div class="text-red-500 mt-20">Error: ' . $errorMessage . '</div>';
                echo $formattedErrorMessage;
                $input = '<a id="homepage-btn" href="index.php">Back to Homepage</a>';
                echo $input;
                exit;
            }
        } else {
            echo "The fetch failed. HTTP ERROR:" . $httpCode;
        }
    }

    public function calculateFeatureCost(string $features): int
    {
        $featureCost = 0;
        if ($features === 'vineyard') {
            $featureCost = 8;
        } elseif ($features === 'skydiving') {
            $featureCost = 6;
        } elseif ($features === 'massage') {
            $featureCost = 5;
        } else {
            $featureCost = 0;
        }
        return $featureCost;
    }

    public function getTotalCost(): int
    {
        return $this->totalCost;
    }

    public function deposit(string $transferCode): void
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
    }
}
