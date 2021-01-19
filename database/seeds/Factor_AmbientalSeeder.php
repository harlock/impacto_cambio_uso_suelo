<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Factor_AmbientalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a especies nativas Arbóreas',
            'id_variable'=>'1',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a nativas arbustivas',
            'id_variable'=>'1',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a nativas herbáceas',
            'id_variable'=>'1',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a nativas Epífitas',
            'id_variable'=>'1',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a especies NOM-059-SEMARNAT-2010 flora',
            'id_variable'=>'1',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Incremento flora exótica e invasora',
            'id_variable'=>'1',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a  mamíferos medianos',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a mamíferos pequeños',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a  aves residentes',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a  aves migratorias',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a reptiles',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a anfibios ',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Afectación a especies NOM-059-SEMARNAT -2010 fauna',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Fauna exótica e invasora',
            'id_variable'=>'2',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Alteración de cadenas alimenticias',
            'id_variable'=>'3',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Perdida de conectividad',
            'id_variable'=>'3',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Disminución de capacidad de resiliencia',
            'id_variable'=>'3',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Deterioro de cuerpos de agua',
            'id_variable'=>'4',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Contaminación de aguas subterráneas',
            'id_variable'=>'4',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Alteración de la temperatura',
            'id_variable'=>'5',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Disminución de la humedad',
            'id_variable'=>'5',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Incremento de partículas suspendidas',
            'id_variable'=>'6',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Ausencia de olores desagradables  y gases tóxico',
            'id_variable'=>'6',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Aumento de ruido antrópico',
            'id_variable'=>'6',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Incremento de erosión',
            'id_variable'=>'7',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Alteración de condiciones fisicoquímicas',
            'id_variable'=>'7',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Desestructuración de geomorfología',
            'id_variable'=>'7',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Integridad',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Calidad estética',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Originalidad',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Compatibilidad',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Vulnerabilidad',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Fragilidad',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Espacios naturales',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Presión Antropogénica',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Integridad ANP´s Federales',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Integridad ANP´s Estatales',
            'id_variable'=>'8',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Admiración,soledad',
            'id_variable'=>'9',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Aislamiento',
            'id_variable'=>'9',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Misterio',
            'id_variable'=>'9',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Integración con la naturaleza',
            'id_variable'=>'9',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Recreación',
            'id_variable'=>'9',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Índice de Marginación',
            'id_variable'=>'10',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Calidad de vida',
            'id_variable'=>'10',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Identidad cultural',
            'id_variable'=>'10',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Seguridad y tranquilidad',
            'id_variable'=>'10',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Dinamismo de la Economía local',
            'id_variable'=>'11',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Empleo',
            'id_variable'=>'11',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Ingresos',
            'id_variable'=>'11',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Crecimiento urbano ordenado',
            'id_variable'=>'12',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Diversidad de usos de suelo',
            'id_variable'=>'12',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Consolidación zona habitacional',
            'id_variable'=>'12',
        ]);
        DB::table('factores_ambientales')->insert([
            'nombre_factor'=>'Carreteras y caminos',
            'id_variable'=>'12',
        ]);


    }
}
