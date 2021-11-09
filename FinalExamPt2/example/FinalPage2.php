<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Display Results</title>
  </head>
  <body>
    <?php
    $monthlyCalc = $_SESSION["monthly"];
  	$investment = $_SESSION["investment"];
  	$interest = $_SESSION["interestRate"];
  	$periodLength = $_SESSION["periodLength"];

    $newInterestRate = $interest/100;
    if($monthlyCalc)
    {

      $interestRate = 1 + ($newInterestRate/12);
      $interestRate = pow($interestRate, 12*$periodLength);
      $futureValue = $investment * $interestRate;
      $futureValue = number_format($futureValue, 2);


      echo "Ivestment amount: $" . $investment . "<br />";
      echo "Annual interest rate: " . $interest . "% <br />";
      echo "Number of years: " . $periodLength . "<br />";
      echo "Future Value: $" . $futureValue . "<br />";
    }
    else
    {

      $interestRate = 1 + ($newInterestRate);
      $interestRate = pow($interestRate,$periodLength);
      $futureValue = $investment * $interestRate;
      $futureValue = number_format($futureValue, 2);

      echo "Ivestment amount: $" . $investment . "<br />";
      echo "Yearly interest rate: " . $interest . "% <br />";
      echo "Number of years: " . $periodLength . "<br />";
      echo "Future Value: $" . $futureValue . "<br />";
    }

    session_destroy();
    ?>

  </body>
</html>
