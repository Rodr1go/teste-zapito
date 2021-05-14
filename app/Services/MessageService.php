<?php

namespace App\Services;

use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Support\Facades\Http;
use App\Models\Subscriber;

class MessageService
{
    public static function sendMessage()
    {
        $subscribers = Subscriber::where('status', 1)->get();
        
        if(!empty($subscribers))
        {
            $i = 0;
            $feed = FeedReader::read(env('FEED_URL'));
            
            if(!empty($feed)) {
                $message = $feed->get_items()[0]->get_title();
            }
            
            foreach($subscribers as $subscriber)
            {
                $data[$i]['phone'] = $subscriber['phone'];
                $data[$i]['message'] = $subscriber['name']." \n\n".$message;    
                $i++;
            }
            
            $response = Http::withToken(env('ZAPITO_API_KEY'))->post(env('ZAPITO_API_URL').'/messages', [
                "test_mode" => true,
                "data" => $data
            ]);
        }
    }
}