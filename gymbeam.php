<?php
//autoload of all composer packages, including text sentiment analyzer
require_once '_inc/vendor/autoload.php';

//open file with product name and description
$file = fopen("gymbeam.csv", "r");

if ($file !== false) 
{
    //adding data from csv file to array row by row while the end of file is reached
    while (!feof($file)) 
    {
        $data = fgetcsv($file);
        $arrayProd[] = $data;
    }
}

//remove first element of array ('name' and 'description')
array_shift($arrayProd);

//remove last element of array because it is empty due to end of file
array_pop($arrayProd);

//text sentiment analyzer
Use Sentiment\Analyzer;
$analyzer = new Analyzer();
$sentiment = new Sentiment\Analyzer();

//update sentiment analyzer with new words and score
$newWords = file_get_contents('newWords.txt');
$newWords = json_decode($newWords, true) ?: [];
$sentiment->updateLexicon($newWords);

//make sentiment analysis for every product description and return compound score
foreach ($arrayProd as $product) {
    $compoundScore = $analyzer->getSentiment($product[1]);
    $arrayScore[] = $compoundScore;
}

//make array with only compound score
foreach ($arrayScore as $score) {
    $productScore[] = $score['compound'];
}

//search for key of the most positive product
$max = array_search(max($productScore), $productScore);

//create variables to display in index.php
$mostPositiveName = $arrayProd[$max][0];
$mostPositiveDescription = $arrayProd[$max][1];


//search for key of the most negative product
$min = array_search(min($productScore), $productScore);

//create variables to display in index.php
$mostNegativeName = $arrayProd[$min][0];
$mostNegativeDescription = $arrayProd[$min][1];