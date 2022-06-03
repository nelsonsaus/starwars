<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use App\Models\Nave;

class PdfNavesController extends Controller
{

    protected $fpdf;
    protected $col = 0; // Columna actual
    protected $y0;      // Ordenada de comienzo de la columna

    protected $B;
    protected $I;
    protected $U;
    protected $HREF;
    protected $fontList;
    protected $issetfont;
    protected $issetcolor;
 
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index() 
    {
        
        $naves = Nave::all();
         
        $title = 'Fichero Naves';
        // $this->SetTitle($title);
        $this->cuerpo($naves);
        $this->Footer();
        $this->fpdf->Output();

        exit;
    }


    public function WriteHTML($html)
    {
        //HTML parser
        $html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote>"); //supprime tous les tags sauf ceux reconnus
        $html=str_replace("\n",' ',$html); //remplace retour à la ligne par un espace
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //éclate la chaîne avec les balises
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->fpdf->Write(5,stripslashes(txtentities($e)));
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract attributes
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $attr=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    public function OpenTag($tag, $attr)
    {
        //Opening tag
        switch($tag){
            case 'STRONG':
                $this->SetStyle('B',true);
                break;
            case 'EM':
                $this->SetStyle('I',true);
                break;
            case 'B':
            case 'I':
            case 'U':
                $this->SetStyle($tag,true);
                break;
            case 'A':
                $this->HREF=$attr['HREF'];
                break;
            case 'IMG':
                if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                    if(!isset($attr['WIDTH']))
                        $attr['WIDTH'] = 0;
                    if(!isset($attr['HEIGHT']))
                        $attr['HEIGHT'] = 0;
                    $this->fpdf->Image($attr['SRC'], $this->fpdf->GetX(), $this->fpdf->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
                }
                break;
            case 'TR':
            case 'BLOCKQUOTE':
            case 'BR':
                $this->fpdf->Ln(5);
                break;
            case 'P':
                $this->fpdf->Ln(10);
                break;
            case 'FONT':
                if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                    $coul=hex2dec($attr['COLOR']);
                    $this->fpdf->SetTextColor($coul['R'],$coul['V'],$coul['B']);
                    $this->issetcolor=true;
                }
                if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                    $this->fpdf->SetFont(strtolower($attr['FACE']));
                    $this->issetfont=true;
                }
                break;
        }
    }

    public function CloseTag($tag)
    {
        //Closing tag
        if($tag=='STRONG')
            $tag='B';
        if($tag=='EM')
            $tag='I';
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='FONT'){
            if ($this->issetcolor==true) {
                $this->fpdf->SetTextColor(0);
            }
            if ($this->issetfont) {
                $this->fpdf->SetFont('arial');
                $this->issetfont=false;
            }
        }
    }

    public function SetStyle($tag, $enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
        {
            if($this->$s>0)
                $style.=$s;
        }
        $this->fpdf->SetFont('',$style);
    }

    public function PutLink($URL, $txt)
    {
        //Put a hyperlink
        $this->fpdf->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->fpdf->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->fpdf->SetTextColor(0);
    }

    
    public function Header()
    {
        // Cabacera
    
        $this->fpdf->Ln(10);
        // Guardar ordenada
        $this->y0 = $this->fpdf->GetY();
    }
    
    public function Footer()
    {
        // Pie de página
        $this->fpdf->SetY(-15);
        $this->fpdf->SetFont('Arial','I',8);
        $this->fpdf->SetTextColor(8,112,33);
        $this->fpdf->Cell(0,10,'Proyecto de star wars realizado por Nelson Sanchez Usero',0,1,'R');
        $this->fpdf->SetX(123.5);
        $this->fpdf->Cell(0,3,'Correo-e: nelsonsaus2@gmail.com ',0,0,'L');

    }
    
    public function SetCol($col)
    {
        // Establecer la posición de una columna dada
        $this->col = $col;
        $x = 10+$col*65;
        $this->fpdf->SetLeftMargin($x);
        $this->fpdf->SetX($x);
    }
    
    public function AcceptPageBreak()
    {
        // Método que acepta o no el salto automático de página
        if($this->col<2)
        {
            // Ir a la siguiente columna
            $this->SetCol($this->col+1);
            // Establecer la ordenada al principio
            $this->fpdf->SetY($this->y0);
            // Seguir en esta página
            return false;
        }
        else
        {
            // Volver a la primera columna
            $this->SetCol(0);
            // Salto de página
            return true;
        }
    }



    function BasicTable($naves)
    {



            // Cabecera
            $this->fpdf->SetFont('Arial','BIU', 13);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->setY(45);
            $this->fpdf->Cell(30,5,utf8_decode("Datos Naves"),0, 1);
            $this->fpdf->SetFont('Arial','BI', 11);
            $this->fpdf->SetTextColor(6,117,50);
            $this->fpdf->setFillColor(6,117,50); 
            $this->fpdf->setY(50);
            $this->fpdf->Cell(0,1,'',0, 1, 'L',true);
            $this->fpdf->Ln();
            $this->fpdf->setY(55);
            $this->fpdf->Cell(1);
            $this->fpdf->Cell(20,2,"ID",0, 1);
            $this->fpdf->setY(56);
            $this->fpdf->SetFont('Arial','BI', 9);
            $this->fpdf->Cell(20);
            $this->fpdf->Cell(30,0,"NOMBRE NAVE",0, 1);
            $this->fpdf->setY(53.5);
            $this->fpdf->Cell(70);
            $this->fpdf->setFillColor(6,117,50); 
            $this->fpdf->SetTextColor(250,250,250);
            $this->fpdf->SetFont('Arial','BI', 9);
            $this->fpdf->Cell(55,5,"IMAGEN NAVE URL",0, 1, 'C', true);
            $this->fpdf->SetTextColor(6,117,50);
            $this->fpdf->setY(56);
            $this->fpdf->Cell(146);
            $this->fpdf->Cell(20,0,"PRECIO",0, 1);
            $this->fpdf->setY(53);
            $this->fpdf->Cell(170);
            $this->fpdf->setY(60);
            $this->fpdf->setFillColor(6,117,50); 
            $this->fpdf->Cell(0,1,'',0, 1, 'L',true);
            $this->fpdf->Ln();
            // Datos

            $this->fpdf->SetTextColor(0,0,0);
            $this->fpdf->SetFont('Arial','', 9);
            $this->fpdf->setY(68);

            $cont=0;



            $importetotal=0;

            foreach($naves as $nave)
            {




                        $this->fpdf->SetTextColor(0,0,0);
                        $this->fpdf->Cell(1);
                        $this->fpdf->Cell(10,5,$nave->id,0);
                        $this->fpdf->Cell(10);
                        $this->fpdf->Cell(30,5,utf8_decode($nave->nombre),0);
                        $this->fpdf->Cell(25);
                        $this->fpdf->Cell(5,5,$nave->logo,0);
                        // $this->Cell(2);
                        // $this->Cell(5,5,$nave->puntuacion_iniciativa,0);
                        // $this->Cell(2);
                        // $this->Cell(5,5,$pnaveo->puntuacion_asistencia,0);
                        // $this->Cell(2);
                        // $this->Cell(5,5,$nave->puntuacion_disponibilidad,0);
                        // $this->Cell(2);
                        // $this->Cell(5,5,$nave->puntuacion_formacion,0);
                        // $this->Cell(20);
                        // $this->Cell(5,5,$nave->dias_trabajados,0);
                        $this->fpdf->Cell(67);
                        $this->fpdf->Cell(5,5,$nave->precio,0,1);
                        $this->fpdf->Cell(45);
                        // $this->fpdf->Cell(5,2,$nave->created_at . " - " . $nave->updated_at,0,1);
                        $this->fpdf->Ln();
                        $this->fpdf->SetTextColor(6,117,50);
                        $this->fpdf->setFillColor(6,117,50); 
                        $this->fpdf->Cell(0,0.2,'',0, 1, 'L',true);
                        $this->fpdf->Ln();


      
                

                $cont++;
                $importetotal+=$nave->precio;
            }


            $this->fpdf->SetFont('Arial','BIU', 11);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->Cell(183,12,utf8_decode("TOTAL (". $cont . ") ". "NAVES" . "       PRECIO TOTAL => $". $importetotal),0, 1, 'R');


            // $this->fpdf->AddPage();

        
    }





    public function cuerpo($naves){
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->Cell(0,12,'STARWARS',0,1);
        $this->fpdf->Cell(0,10,utf8_decode("NUESTRAS NAVES"),0,1);
        $this->fpdf->SetFont('Arial','B', 17);
        $this->fpdf->SetTextColor(207, 189, 27);
        $this->fpdf->SetY(12);
        $this->fpdf->Cell(100);
        $this->fpdf->Cell(50, 5, utf8_decode("[ SWAPI ]"), 0, 1);
        $this->fpdf->SetY(20);
        $this->fpdf->Cell(100);
        $this->fpdf->SetFont('Arial','', 12);
        $this->fpdf->Cell(50, 5, "API DE STARWARS", 0, 1);

        $this->BasicTable($naves);



    }


}
