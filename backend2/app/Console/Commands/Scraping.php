<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Weidner\Goutte\GoutteFacade;

use App\Models\Event;

use App\Models\Course;
use DateTime;





class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   

       
        // ジャパンレーシングサービス イベント スクレイピング

        $goutte= GoutteFacade::request('GET', 'http://japan-racing.jp/moto/22/fujispeedw.html');
        $goutte->filter('div')->each(function ($a) {
            $a->filter('table.hpb-cnt-tb1')->each(function($b){
                $b->filter('tbody')->each(function($c){
                    $c->filter('tr')->each(function($d){
                        $d->filter('td.hpb-cnt-tb-cell2')->each(function($e){
                            $e->filter('table.hpb-cnt-tb1')->each(function($f){
                                $f->filter('tbody')->each(function($g){
                                    $g->filter('tr')->each(function($h){
                                        $h->filter('td.hpb-cnt-tb-cell1')->each(function($i){
                                            $i->filter('b')->each(function($j){
                                                $text=mb_convert_encoding($j->text(), "UTF-8");
                                                $count = mb_strlen($text);

                                                if($count<=9){
                                                    $explode=explode('月',$text);
                                                    $convert=preg_replace('/[^0-9]/','',$explode);
                                                    $year=date("Y");
                                                    $date=$year."-".$convert[0]."-".$convert[1];
                                                }elseif($count>=10){
                                                    $explode=explode('月',$text);
                                                    $year_month=explode('年',$explode[0]);
                                                    $year_month=preg_replace('/[^0-9]/','',$year_month);
                                                    $day=preg_replace('/[^0-9]/','',$explode[1]);
                                                    $date=$year_month[0]."-".$year_month[1]."-".$day;
                                                }
                                                $model=new Event;

                                                $model->date=$date;
                                                //開催日
                                                    
                                                $name='富士スピードウェイ走行会';
                                                $model->name=$name;
                                                //イベント名

                                                $courses = Course::all();
                                                foreach($courses as $course){
                                                    $keyWord = $course->keyword;
                                                    if(strpos($model->name,$keyWord) !== false){
                                                    $id=$course->id;
                                                    $model->course_id = $id;
                                                    }
                                                }
                                                //イベント名に含まれるコース名から、course_idを取得

                                                $url='http://japan-racing.jp/moto/22/fujispeedw.html';
                                                $model->source_url =$url;
                                                //イベントURL

                                                $organizer='ジャパンレーシングサービス';
                                                $model->organizer = $organizer;
                                                // 主催者情報


                                                $checkEvent=Event::where('name','=',$name)
                                                ->where('date','=',$date)
                                                ->where('organizer','=',$organizer)
                                                ->first();

                                                
                                                
                                                if($checkEvent){
                                                }else{
                                                    $model->save();
                                                }
                                                
                                                
                                            });
                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });


        // ナイジェル 筑波ジムカーナ イベント スクレイピング

        $goutte= GoutteFacade::request('GET', 'https://n-igeta.jp/content.aspx?pg=s2_s6');
        $goutte->filter('h4')->each(function($a){
            // dd($a);
            $text=mb_convert_encoding($a->text(), "UTF-8");
            $explode=explode('月',$text);
            $convert=preg_replace('/[^0-9]/','',$explode);
            $year=date("Y");
            $date=$year."-".$convert[0]."-".$convert[1];

            // dd($date);
            $model=new Event;
            $model->date=$date;

            $name='筑波ジムカーナ場 広場レッスン';
            $model->name=$name;
            //イベント名
            
            $courses = Course::all();
            foreach($courses as $course){
                $keyWord = $course->keyword;
                if(strpos($model->name,$keyWord) !== false){
                $id=$course->id;
                $model->course_id = $id;
                }
            }
            //イベント名に含まれるコース名から、course_idを取得

            $url='https://n-igeta.jp/content.aspx?pg=s2_s6';
            $model->source_url =$url;
            //イベントURL

            $organizer='ないじぇる';
            $model->organizer = $organizer;
            // 主催者情報


            $checkEvent=Event::where('name','=',$name)
            ->where('date','=',$date)
            ->where('organizer','=',$organizer)
            ->first();

    
                                                
            if($checkEvent){
            }else{
                $model->save();
                
            }
        });

     

        // プロクルーズ イベント スクレイピング(動作OK)

        $goutte= GoutteFacade::request('GET', 'https://www.procrews.co.jp/iframe_entry.html');
        $goutte->filter('div#entry')->each(function($a){
            $a->filter('table')->each(function($b){
                $b->filter('tr')->each(function($c){
                    $model_id=0;
                    $c->filter('td')->each(function($d,$i){
                        
                            if($i == 0){
                               
                                $text=mb_convert_encoding($d->text(), "UTF-8");

                                $model=new Event;
                                $explode=explode('/',$text);
                                $convert=preg_replace('/[^0-9]/','',$explode);
                                $year=date("Y");
                                $date=$year."-".$convert[0]."-".$convert[1];                                       
                                $model->date=$date;

                                $organizer='プロクルーズ';

                                $checkEventDate=Event::where('date','=',$date)
                                ->where('organizer','=',$organizer)
                                ->first();

                                if($checkEventDate){
                                }else{
                                    $model->save();
                                }
                                //開催日を保存


                            } elseif($i == 1){
                                
                                $name=mb_convert_encoding($d->text(), "UTF-8");
                                $model=Event::orderBy('id','desc')->first();
                                $model->name = $name;
                                // $model->save();
                                //イベント名
                                
                                $courses = Course::all();
                                foreach($courses as $course){
                                $keyWord = $course->keyword;
                                if(strpos($model->name,$keyWord) !== false){
                                    $id=$course->id;
                                    $model->course_id = $id;
                                 
                                    }
                                //イベント名に含まれるコース名から、course_idを取得
                                }

                                $url=$d->filter('a')->attr('href');
                                $model->source_url =$url;
                              
                                //イベントURL

                                $organizer='プロクルーズ';
                                $model->organizer = $organizer;
                                
                                // 主催者情報
                                
                                
                                $checkEvent=Event::where('name','=',$name)
                                ->where('organizer','=',$organizer)
                                ->first();

                             
                                        
                                if($checkEvent){
                                }else{
                                    $model->save();
                                }

                            };                    
                    });
                });
            });
        });

    \Log::info('スケジューラ:スクレイピング実行');   
    }
}


