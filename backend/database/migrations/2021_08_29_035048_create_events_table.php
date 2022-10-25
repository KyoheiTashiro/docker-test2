
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateEventsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("events", function (Blueprint $table) {

						$table->increments('id');
						$table->string('name')->nullable();
						$table->date('date')->nullable();
						$table->integer('entry_fee')->nullable();
						$table->string('session_time')->nullable();
						$table->integer('course_id')->nullable()->unsigned();
                        $table->string('source_url')->nullable();
                        $table->string('organizer')->nullable();
                        $table->timestamps();
                        $table->softDeletes();
						

                    //*********************************
                    // Foreign KEY [ Uncomment if you want to use!! ]
                    //*********************************
                        //$table->foreign("course_id")->references("id")->on("courses");



						// ----------------------------------------------------
						// -- SELECT [events]--
						// ----------------------------------------------------
						// $query = DB::table("events")
						// ->leftJoin("courses","courses.id", "=", "events.course_id")
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
                Schema::dropIfExists("events");
            }
        }
    