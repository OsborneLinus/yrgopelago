<?php
class CurlHandling
{ // save the totalcost in a variable to make sure we can update and use it in multiple functions
    private $totalCost;
    // function for the transfer validation, need arguments $transfercode, $dates and $roomType to be able to calculate the correct cost for the booking
    public function transferCode($transferCode, $dates, $roomType)
    { // if statement to make sure that the totalcost is based of the correct room type
        $baseCost = 0;
        if ($roomType === 'standard') {
            $baseCost = 8;
        } elseif ($roomType === 'deluxe') {
            $baseCost = 12;
        } elseif ($roomType === 'superior') {
            $baseCost = 15;
        };

        $features = $_POST['features'];
        $featureCost = $this->calculateFeatureCost($features);

        // calculate the totalcost for the stay based on the customers amount of days booked and what room they have chosen, and if they have chosen any addons
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
                // Customize the error message for the end user if the transfercode is invalid
                $formattedErrorMessage = '<div class=" text-red-500 mt-20">Error: ' . $errorMessage . '</div>';
                echo $formattedErrorMessage;
                $input = '<a id="homepage-btn" href="index.php">Back to Homepage</a>';
                echo $input;
                exit;
            }
        } else {
            // error message if the fetch to centralbank didn't succeed.
            echo "The fetch failed. HTTP ERROR:" . $httpCode;
        }
    }
    public function calculateFeatureCost($features)
    {
        // if statement to make sure that if the customer have chosen an feature to add in the booking it will be added in the call to the centralbank
        $featureCost = 0;
        if ($features === 'vineyard') {
            $featureCost = 8;
        } else if ($features === 'skydiving') {
            $featureCost = 6;
        } else if ($features === 'massage') {
            $featureCost = 5;
        } else {
            $featureCost = 0;
        }
        return $featureCost;
    }
    // have the totalcost for the stay saved in a function for easier use in other functions
    public function getTotalCost()
    {
        return $this->totalCost;
    }
    // deposit to hotel managers account
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
