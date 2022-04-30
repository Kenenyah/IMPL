<?php
 
 

require('fpdf184/fpdf.php');

//Student INFO
    $stFirstName = stripslashes($_POST['stFirstName']);
    $stFirstName = iconv('UTF-8', 'windows-1252', $stFirstName);
    $stLastName = stripslashes($_POST['stLastName']);
    $stLastName = iconv('UTF-8', 'windows-1252', $stLastName);

//Setup INFO
    $TitleProf = stripslashes($_POST['TitleProf']);
    $TitleProf = iconv('UTF-8', 'windows-1252', $TitleProf);
    $FNProf = stripslashes($_POST['FNProf']);
    $FNProf = iconv('UTF-8', 'windows-1252', $FNProf);
    $LNProf = stripslashes($_POST['LNProf']);
    $LNProf = iconv('UTF-8', 'windows-1252', $LNProf);
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

//Company INFO
    $CompanyName = stripslashes($_POST['CompanyName']);
    $CompanyName = iconv('UTF-8', 'windows-1252', $CompanyName);
    $OwnerPosition = stripslashes($_POST['OwnerPosition']);
    $OwnerPosition = iconv('UTF-8', 'windows-1252', $OwnerPosition);
    $CompOwnerFN = stripslashes($_POST['CompOwnerFN']);
    $CompOwnerFN = iconv('UTF-8', 'windows-1252', $CompOwnerFN);
    $CompOwnerLN = stripslashes($_POST['CompOwnerLN']);
    $CompOwnerLN = iconv('UTF-8', 'windows-1252', $CompOwnerLN);
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



    $pdf = new FPDF();

    $pdf ->AddPage();
    $pdf->SetLeftMargin(15);
    

    $pdf->SetFont('Times', 'I', 16);

    $pdf->Write(7,$NameUni);
    $pdf->Ln();
    $pdf->Write(7,'Recinto de '.$CityUni);
    $pdf->Ln();

    $image1 = "img/logo.jpg";

    
    $pdf->Write(7,$DeptUni);
    $pdf-> Image(''.$image1,165,13,15,15);
    $pdf->Cell(-50,10,'','B');
    $pdf->Cell(170,10,'','B');
    
    $pdf->Ln(); 
    $pdf->Ln();
    
     
    $pdf->SetFont('Times', '', 12);
    
    $pdf->Write(6, $CompOwnerFN.' '.$CompOwnerLN.', '.$OwnerPosition);
    $pdf->Ln();
    $pdf->Write(6, $CompanyName);
    $pdf->Ln();
    $pdf->Write(6, $CompAdress);
    $pdf->Ln();
    $pdf->Write(6, $CompCity);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->Write(6, 'Estimado(a) '.$CompOwnerLN.':');

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetRightMargin(20);
    $p = stripslashes('Atentamente me dirijo a usted para presentar al estudiante '.$stFirstName.' '.$stLastName.', quien interesa cumplir con su Curso de Internado en Ciencias de Computadoras trabajando en su empresa.  El requisito del curso es cumplir con un mínimo de 135 horas de trabajo en un empleo relacionado con computadoras y sus aplicaciones hasta la última semana de clases del semestre en curso.');
    $p = iconv('UTF-8', 'windows-1252', $p);
    
    $pdf->Write(6,$p);
    $pdf->Ln();
    $pdf->Ln();

    $p2 = stripslashes('Las horas para practicar semanalmente serán acordadas entre el estudiante y el supervisor inmediato de su empresa.  El estudiante disfrutará de cubiertas de pólizas de Seguro contra Accidentes sufragadas por la '.$NameUni.' durante el periodo arriba mencionado.  Para ello, necesitamos una carta de su parte dirigida a la '.$NameUni.' donde exprese la aceptación del estudiante en su empresa.  Dicha carta se la puede entregar al estudiante para que nos la haga llegar y así tramitar inmediatamente el seguro antes mencionado.  Cualquier remuneración económica que se desee ofrecer al estudiante es opcional.');
    $p2 = iconv('UTF-8', 'windows-1252', $p2);

    $pdf->Write(6, $p2);
    $pdf->Ln();
    $pdf->Ln();

    $p3 = stripslashes('De parte de la Universidad, estaré a cargo de supervisar y ayudar al estudiante en cualquier dificultad que surja durante su trabajo.  Para cualquier duda o aclaración adicional, puede comunicarse con nosotros al teléfono ');
    $p3 = iconv('UTF-8', 'windows-1252', $p3);

    $p4 = stripslashes('Oportunamente me comunicaré con ustedes para solicitar una descripción del trabajo realizado por el estudiante y la evaluación del mismo.');
    $p4 = iconv('UTF-8', 'windows-1252', $p4);

    $pdf->Write(6, $p3.' '.$PhoneUni.'. '.$p4);
    $pdf->Ln();
    $pdf->Ln();

    $p5 = stripslashes('Agradezco profundamente toda la colaboración y apoyo que pueda prestar a la formación de este estudiante y su cooperación con el éxito de este programa de Internado de la Universidad.');
    $p5 = iconv('UTF-8', 'windows-1252', $p5);

    $pdf->Write(6,$p5);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->Write(6, 'Respetuosamente,');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->Write(6, 'Prof. '.$FNProf.' '.$LNProf.', '.$TitleProf);
    $pdf->Ln();
    $pdf->Write(6, $DeptUni);
    $pdf->Ln();
    $pdf->Write(6, $NameUni);
    $pdf->Ln();
    $pdf->Write(6, 'Recinto de '.$CityUni);
    $pdf->Ln();

  
    $pdf->Output();
