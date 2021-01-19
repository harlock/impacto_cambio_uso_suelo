<?php

namespace App\Http\Controllers;
use App\ResultadosTotales;
use App\DatosProyectos;
use App\FactorAmbiental;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Validator;
class ResultadosTotalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preparacion=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  preparación"))
            ->where("etapa","=","Preparación")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();

        $construccion=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  construcciòn"))
            ->where("etapa","=","Construcción")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();

        $mantenimiento=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  mantenimiento"))
            ->where("etapa","=","Mantenimiento")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();

        $abandono=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  abandono"))
            ->where("etapa","=","Abandono")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();

        $total=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("SUM(valor) AS totalconabandono"))
            ->groupBy("id_proyecto","id_factor")
            ->where("id_proyecto",$id)
            ->get();

        $totalsin=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("SUM(valor) AS totalsinabandono"))
            ->where("etapa","!=","Abandono")
            ->where("id_proyecto",$id)
            ->groupBy("id_proyecto","id_factor")
            ->get();

        $datos_proyecto=DatosProyectos::find($id);

        $preparacion=($preparacion->pluck('preparación')->toArray());
        $construccion=($construccion->pluck('construcciòn')->toArray());
        $mantenimiento=($mantenimiento->pluck('mantenimiento')->toArray());
        $abandono=($abandono->pluck('abandono')->toArray());
        $total=($total->pluck('totalconabandono')->toArray());
        $totalsin=($totalsin->pluck('totalsinabandono')->toArray());
        $datos_proyecto=($datos_proyecto->nombreproyecto);

        $datos = array(
            "preparacion"=>$preparacion,
            "construccion"=>$construccion,
            "mantenimiento"=>$mantenimiento,
            "abandono"=>$abandono,
            "total"=>$total,
            "totalsin"=>$totalsin,
            "datos_proyecto"=>$datos_proyecto,
        );
        return ($datos);
    }

    public function pdf_all($id,Request $request)
    {
        // "FPDF" librería para crear el pdf
        //codigo para graficas
        $dataURI= $request->imgGraphic;
        $img = explode(',',$dataURI,2);
        $pic = 'data://text/plain;base64,'. $img[1];

        $dataURI= $request->imgGraphic2;
        $img = explode(',',$dataURI,2);
        $pic2 = 'data://text/plain;base64,'. $img[1];

        //Consultas ORM para la obtención de los datos del proyecto
        $datos_proyecto = DatosProyectos::get()->where("id_proyecto", $id);
        $factores=FactorAmbiental::get();
        $preparacion=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  preparación"))
            ->where("etapa","=","Preparación")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();
        $construccion=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  construcciòn"))
            ->where("etapa","=","Construcción")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();
        $mantenimiento=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  mantenimiento"))
            ->where("etapa","=","Mantenimiento")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();
        $abandono=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("(valor) AS  abandono"))
            ->where("etapa","=","Abandono")
            ->where("id_proyecto",$id)
            ->orderBy("id_factor")
            ->get();
        $total=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("SUM(valor) AS totalconabandono"))
            ->groupBy("id_proyecto","id_factor")
            ->where("id_proyecto",$id)
            ->get();
        $totalsin=ResultadosTotales::select("id_proyecto","id_factor",DB::RAW("SUM(valor) AS totalsinabandono"))
            ->where("etapa","!=","Abandono")
            ->where("id_proyecto",$id)
            ->groupBy("id_proyecto","id_factor")
            ->get();

        //creación del pdf
        $pdf = new Fpdf();
        $pdf->AddPage();
        //Encabezado del PDF
        foreach ($datos_proyecto as $datos) {
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(190, 10, "Fecha: " . utf8_decode(mb_strtoupper($datos->fecha)), 0, 0, "R");
            $pdf->Ln(7);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode(mb_strtoupper($datos->nombreproyecto)), 0, 1, "C");
            $pdf->SetFont('Times', '', 12);

            $pdf->Cell(22, 12, utf8_decode(ucwords("Descripción: ")));
            $pdf->SetTextColor(11,70,160);
            $pdf->Cell(100, 12, utf8_decode(ucwords($datos->descripción)).utf8_decode(ucwords(".")));
            $pdf->Ln(7);

            $pdf->SetTextColor(7,7,7);
            $pdf->Cell(12, 12, utf8_decode("Autor: "));
            $pdf->SetTextColor(11,70,160);
            $pdf->Cell(16, 12, utf8_decode(ucwords($datos->promovente)).utf8_decode(ucwords(" ")).utf8_decode(ucwords($datos->appromovente)).utf8_decode(ucwords(" ")).utf8_decode(ucwords($datos->ampromovente)).utf8_decode(ucwords(".")));
            $pdf->Ln(7);

            $pdf->SetTextColor(7,7,7);
            $pdf->Cell(20, 12, utf8_decode("Compañia: "));
            $pdf->SetTextColor(11,70,160);
            $pdf->Cell(90, 12, utf8_decode(ucwords($datos->nomcompania)).utf8_decode(ucwords(".")));
            $pdf->Ln(7);

            $pdf->SetTextColor(7,7,7);
            $pdf->Cell(19, 12, utf8_decode("Dirección: "));
            $pdf->SetTextColor(11,70,160);
            $pdf->Cell(45, 12, utf8_decode(ucwords($datos->colonia)).utf8_decode(ucwords(", ")).utf8_decode(ucwords($datos->municipio)).utf8_decode(ucwords(", ")).utf8_decode(ucwords($datos->estado)).utf8_decode(ucwords(".")));
            $pdf->Ln();
        }
        //Graficas
        $pdf->Image($pic,15,80,175,130,'png');
        $pdf->AddPage();
        $pdf->Image($pic2,4,-15,200,180,'png');

        $pdf->AddPage();

        //tabla de resultados de la evaluación
        $pdf->SetTextColor(7,7,7);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(190, 10, utf8_decode(mb_strtoupper("Impacto de factores Ambientales")),0, 0, "C");
        $pdf->Ln(10);

        $pdf->SetFontSize(10);
        $pdf->SetFont('Times', 'B', 8);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(40,40,40);
        $pdf->SetDrawColor(88,88,88);
        $pdf->Cell(75, 10, utf8_decode(mb_strtoupper("Factores")), 0, 0, "C",1);
        $pdf->Cell(18, 10, utf8_decode("Preparación"), 0, 0, "C",1);
        $pdf->Cell(19, 10, utf8_decode("Construcción"), 0, 0, "C",1);
        $pdf->Cell(21, 10, utf8_decode("Mantenimiento"), 0, 0, "C",1);
        $pdf->Cell(15, 10, utf8_decode("Abandono"), 0, 0, "C",1);
        $pdf->Cell(15, 10, utf8_decode("Total"), 0, 0, "C",1);
        $pdf->Cell(23, 10, utf8_decode("Sin Abandono"), 0, 0, "C",1);

        $pdf->SetDrawColor(34,185,130);
        $pdf->SetLineWidth(1);
        $pdf->Line(10,29,84,29);
        $pdf->Line(86,29,102,29);
        $pdf->Line(104,29,121,29);
        $pdf->Line(123,29,142,29);
        $pdf->Line(144,29,157,29);
        $pdf->Line(159,29,172,29);
        $pdf->Line(174,29,196,29);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetFillColor(240,240,240);
        $pdf->SetTextColor(40,40,40);
        $pdf->SetDrawColor(255,255,255);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Ln();

        //Resultados de la evaluación
        foreach ($factores as $index=> $fac){
            $pdf->Cell(75, 10, utf8_decode($fac->nombre_factor),1,0,"",1);
            $pdf->Cell(18, 10, utf8_decode($preparacion[$index]->preparación),1,0,"C",1);
            $pdf->Cell(19, 10, utf8_decode($construccion[$index]->construcciòn), 1,0,"C",1);
            $pdf->Cell(21, 10, utf8_decode($mantenimiento[$index]->mantenimiento), 1,0,"C",1);
            $pdf->Cell(15, 10, utf8_decode($abandono[$index]->abandono), 1,0,"C",1);
            $pdf->Cell(15, 10, utf8_decode($total[$index]->totalconabandono), 1,0,"C",1);
            $pdf->Cell(23, 10, utf8_decode($totalsin[$index]->totalsinabandono), 1,0,"C",1);
            $pdf->Ln();
        }
        $pdf->Output('','Resultados Evaluacion');
        exit();
    }


}
