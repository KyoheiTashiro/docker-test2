
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateMylistsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("mylists", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('user_id')->nullable()->unsigned();
						$table->integer('event_id')->nullable()->unsigned();
                        $table->timestamps();
                        $table->softDeletes();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("event_id")->references("id")->on("events");



						// ----------------------------------------------------
						// -- SELECT [mylists]--
						// ----------------------------------------------------
						// $query = DB::table("mylists")
						// ->leftJoin("users","users.id", "=", "mylists.user_id")
						// ->leftJoin("events","events.id", "=", "mylists.event_id")
						// ->get();
						// dd($query); //For checking



                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("mylists");
            }
        }
    