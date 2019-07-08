<?php

namespace App\Lib\API;

class Wikipedia 
{

    public function __construct()
    {
        $this->baseURL = "https://wikipedia.org/w/api.php";
    }

    /**
     * Function to get List of Random Articles
     * @param Integer Amount of wanted articles defaults to 5
     * @return Array List of returned articles titles and ids 
     */
    public function getRandomArticlesList($amount = 5) : array
    {
        if (!is_int($amount) || $amount < 1 || is_null($amount) || empty($amount)) {
            throw new \InvalidArgumentException('Please provide a valid number for amount of Articles you wish to receive');
        }
        $url = '?action=query&format=json&list=random&rnnamespace=0&rnlimit=' . $amount;
        $content = file_get_contents($this->baseURL . $url);
        $content = json_decode($content, true);
        $content = $content['query']['random'];

        return $content;
    }

    public function getArticle($id)
    {
        
    }
}