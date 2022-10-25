
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateCoursesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("courses", function (Blueprint $table) {

						$table->increments('id');
						$table->string('name')->nullable();
						$table->string('location')->nullable();
                        $table->string('keyword')->nullable();
                        $table->string('api_keyword')->nullable();
                        $table->timestamps();
                        $table->softDeletes();



						// ----------------------------------------------------
						// -- SELECT [courses]--
						// ----------------------------------------------------
						// $query = DB::table("courses")
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
                Schema::dropIfExists("courses");
            }
        }
    