<?php
 
 require_once("DBController.php");


require('fpdf184/fpdf.php');

//Setup INFO
    $NameUni = stripslashes($_POST['NameUni']);
    $NameUni = iconv('UTF-8', 'windows-1252', $NameUni);
    $DeptUni = stripslashes($_POST['DeptUni']);
    $DeptUni = iconv('UTF-8', 'windows-1252', $DeptUni);
    $PhoneUni = stripslashes($_POST['PhoneUni']);
    $PhoneUni = iconv('UTF-8', 'windows-1252', $PhoneUni);
    $AdressUni = stripslashes($_POST['AdressUni']);
    $AdressUni = iconv('UTF-8', 'windows-1252', $AdressUni);
    $CityUni = stripslashes($_POST['CityUni']);
    $CityUni = iconv('UTF-8', 'windows-1252', $CityUni);

    $Program = stripslashes($_POST['Program']);
    $Program = iconv('UTF-8', 'windows-1252', $Program);
    $CourseName = stripslashes($_POST['CourseName']);
    $CourseName = iconv('UTF-8', 'windows-1252', $CourseName);
    $CourseCode = stripslashes($_POST['CourseCode']);
    $CourseCode = iconv('UTF-8', 'windows-1252', $CourseCode);
    $Semester = stripslashes($_POST['Semester']);
    $Semester = iconv('UTF-8', 'windows-1252', $Semester);

//Company INFO
    $CompanyID = $_POST['CompanyID'];

    $CompanyName = stripslashes($_POST['CompanyName']);
    $CompanyName = iconv('UTF-8', 'windows-1252', $CompanyName);
    $CompAdress = stripslashes($_POST['CompAdress']);
    $CompAdress = iconv('UTF-8', 'windows-1252', $CompAdress);
    $CompCity = stripslashes($_POST['CompCity']);
    $CompCity = iconv('UTF-8', 'windows-1252', $CompCity);


    //$stFirstName = $_POST['stFirstName'];
    //$stLastName = $_POST['stLastName'];
    
    //$TitleProf = $_POST['TitleProf'];
    //$FNProf = $_POST['FNProf'];
    //$LNProf = $_POST['LNProf'];
    //$NameUni = $_POST['NameUni'];
    //$DeptUni = $_POST['DeptUni'];
    //$PhoneUni = $_POST['PhoneUni'];
    //$AdressUni = $_POST['AdressUni'];
    //$CityUni = $_POST['CityUni'];

    //$CompanyName = $_POST['CompanyName'];
    //$CompOwnerFN = $_POST['CompOwnerFN'];
    //$CompOwnerLN = $_POST['CompOwnerLN'];
    //$CompAdress = $_POST['CompAdress'];
    //$CompCity = $_POST['CompCity'];

    $db_handle = new DBController();
    
    // $result = $db_handle->runQuery("SELECT CONCAT(stFirstName,' ',stLastName),StudentNumber FROM tbl_students where stCompany='$CompanyID'");

    $result = $db_handle->runQuery("SELECT CONCAT(stFirstName,' ',stLastName)StudentName,StudentNumber, CompanyName, CompPostAddress,CompPostCity 
    FROM tbl_students 
    JOIN tbl_companies ON tbl_students.stCompany=tbl_companies.CompanyID 
    WHERE CompanyID='$CompanyID'");


    // $res = $db_handle->runQuery("SELECT GROUP_CONCAT(
    //     CompanyName,
    //  CompPostAddress,
    //  CompPostCity)  from tbl_companies where CompanyID='$CompanyID'");



    $pdf = new FPDF();

    $pdf ->AddPage();
    $pdf->SetFont('Arial','B',16);
    $image1 = "img/logo.jpg";
    // Move to 8 cm to the right
    $pdf->Cell(80);
    // Centered text in a framed 20*10 mm cell and line break
    $pdf->Cell(10,10,$pdf->Image('img/logo.jpg', $pdf->GetX()+5, $pdf->GetY(), 25), 0,0,'C');

    // $pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false);
    //$pdf->Image($image1, 5, $pdf->GetY(), $pdf->GetX());
    
    //$pdf-> Image(''.$image1,165,13,15,15);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Times', '', 16);


    $pdf->SetLeftMargin(65);
    $pdf->Write(15,$NameUni);
    $pdf->Ln();
    $pdf->SetLeftMargin(85);
    $pdf->SetFont('Times', '', 12);
    $pdf->Write(5,'Recinto de '.$CityUni);
    $pdf->Ln();

    
    $pdf->SetLeftMargin(35);

    $pdf->SetFont('Times', '', 12);

    $pdf->Ln();
    $p = stripslashes('SEGURO GRUPAL DE ACCIDENTES PARA ESTUDIANTES EN PRÁCTICA');
    $p = iconv('UTF-8', 'windows-1252', $p);
    
    $pdf->Write(6,$p);

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetLeftMargin(11);
    $pdf->Ln();

    
    $pdf->SetFont('Arial', 'B', 12);
    $p = stripslashes('Departamento Académico:');
    $p = iconv('UTF-8', 'windows-1252', $p);

    
    $pdf->Write(6, $p.' ');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(6, $DeptUni);

    // $pdf->Cell(-41,5,'','B');
    // $pdf->Cell(43,5,'','B');
    //$pdf->Ln();

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Write(6, 'Curso: ');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(6,$CourseCode.'                    ');
    
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Write(6, '  Programa: ');
    $pdf->SetFont('Arial', '', 12);

    $pdf->Write(6,$Program);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Write(6, 'Certificado requerido:                  ');
    

    
    
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5,5, $check, 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $p = stripslashes('Responsabilidad Pública                     ');
    $p = iconv('UTF-8', 'windows-1252', $p);
    $pdf->Write(6, $p);

    
    $pdf->Cell(5,5, '', 1);
    $p = stripslashes('Impericia Médica');
    $p = iconv('UTF-8', 'windows-1252', $p);
    $pdf->Write(6, $p);


    $pdf->Ln();
    $pdf->Ln();
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60,12, '    Nombre Estudiante',1);
    $p = stripslashes('    Número');
    $p = iconv('UTF-8', 'windows-1252', $p);
    $pdf->Cell(30,12, $p,1);
    $p = stripslashes('    Lugar de práctica y dirección postal');
    $p = iconv('UTF-8', 'windows-1252', $p);
    $pdf->Cell(99,12, $p,1);

    $pdf->SetFont('Arial', '', 12);

    foreach($result as $key=>$row) {

        $pdf->SetFont('Arial','',12);	
        $pdf->Ln();
        //$pdf->Write(6, 'Curso: ');
        // foreach($row as $column)
        //     $pdf->Cell(60,12,$column,1);
        //$pdf->Write(8, $row['Nombre Estudiante']);
        $pdf->Cell(60,12, ($key+1).'. '.$row['StudentName'],1);
        $pdf->Cell(30,12, $row['StudentNumber'],1);
        $CompanyLocation=$row['CompanyName'].', '.$row['CompPostAddress'].', '.$row['CompPostCity'];
        $pdf->cell(99,12, $CompanyLocation,1);
      
        
    }


    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Write(6, 'Curso: ');
    $pdf->SetFont('Arial', '', 12);

    
    $pdf->Write(6,$CourseName.'                                 ');
    
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Write(6, '  Periodo: ');
    $pdf->SetFont('Arial', '', 12);

    $pdf->Write(6,$Semester);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);

    $pdf->Write(6, 'Firma del Profesor: ');
    $pdf->SetFont('Arial', '', 12);

    $pdf->Cell(34,5,'','B');
   // $pdf->Cell(170,10,'','B');
    

    $pdf->Write(6, '          Firma del Director del Departamento: ');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(34,5,'','B');

    $pdf->Ln();
    $pdf->Ln();


  
    $pdf->Output();
