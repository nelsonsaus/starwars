<?php

namespace App\Console\Commands;

use App\Models\Nave;
use App\Models\Piloto;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class InsertarNaveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nave:insertar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para Insertar las naves de la api';

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
     * @return int
     */
    public function handle()
    {

        Artisan::call('migrate:fresh --seed');


        // Schema::disableForeignKeyConstraints();

        // Piloto::truncate();


        // Schema::enableForeignKeyConstraints();


        //son 9 paginas lo que ocupa el recurso de naves asi que:

        for($x = 1; $x<=9; $x++){

            $datos2 = json_decode(file_get_contents("https://swapi.dev/api/people/?page={$x}&format=json", true));
            for ($i = 0; $i < sizeof($datos2->results); $i++) {
                $piloto = new Piloto();
                $piloto->nombre = $datos2->results[$i]->name;
                
                $url = $datos2->results[$i]->url;

                $tex = str_replace("https://swapi.dev/api/people/", "http://localhost/starwars/api/pilotos/", $url);
                $tex = substr($tex, 0, -1);
                $nume = substr($tex, 38);


                if($nume>=18){
                    $nume--;
                }

                $tex = substr($tex, 0, 38) . $nume;

                $piloto->url = $tex;
                $piloto->save();
            }

        }


        // Schema::disableForeignKeyConstraints();

        // Nave::truncate();


        // Schema::enableForeignKeyConstraints();


        //son 4 paginas lo que ocupa el recurso de naves asi que:

        for($x = 1; $x <=4; $x++){

            $datos = json_decode(file_get_contents("https://swapi.dev/api/starships/?page={$x}&format=json", true));
            for ($i = 0; $i < sizeof($datos->results); $i++) {
                $nave = new Nave();
                $nave->nombre = $datos->results[$i]->name;
                if(!empty($datos->results[$i]->pilots)){
                    $nave->pilotos = $datos->results[$i]->pilots;
                }else{
                    $nave->pilotos = null;
                }

                if($datos->results[$i]->cost_in_credits=="unknown"){
                    $nave->precio = null;
                }else{
                    $nave->precio = $datos->results[$i]->cost_in_credits;
                }


                $nave->save();

                if(!empty($datos->results[$i]->pilots)){
                    foreach($nave->pilotos as $pi){
                        $id = substr($pi, 29, -1);
                        //$this->info("id =>".$id);
                        $nave->pilotos()->attach($id);
                    }
                }
           }

        }



        $this->info("DONE");








    }
}
