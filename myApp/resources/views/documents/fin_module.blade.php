{{-- @extends('layout.app')


@section('content')

    <style>
        /* Base page look for web viewing */
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            /* padding: 30px 15px; */
            color: #000000;
        }

        .pv-container {
            background-color: #ffffff;
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 35px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Top Institutional Header Elements */
        .header-section {
            text-align: center;
            margin-bottom: 25px;
            position: relative;
        }

        .logo-placeholder {
            font-size: 0.85rem;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .institute-name {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .academic-year {
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .pv-title {
            font-size: 1.05rem;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Module Metadata Field */
        .module-field {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .dots-line {
            font-weight: normal;
            letter-spacing: 1.5px;
            color: #555555;
        }

        /* General Table Framework Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000000;
            padding: 7px 8px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #fcfcfc;
            font-weight: bold;
            text-align: center;
        }

        /* Specific Metadata Top Table Config */
        .meta-table th {
            width: 25%;
        }
        .meta-table td {
            height: 24px;
            text-align: center;
        }

        /* Main Trainee List Table Layout Column Sizes */
        .students-table th {
            padding: 10px 5px;
        }

        .col-id { width: 4%; text-align: center; }
        .col-cef { width: 14%; text-align: center; }
        .col-name { width: 32%; }
        .col-sign1 { width: 20%; }
        .col-sign2 { width: 18%; }
        .col-obs { width: 12%; }

        .center-text {
            text-align: center;
        }

        /* Bottom Footer / Examiner Meta Fields */
        .examiner-table th {
            padding: 6px;
        }
        .examiner-table td {
            height: 75px; /* Creates identical spacious empty drawing boxes */
        }

        .footer-copies-count {
            font-size: 1rem;
            font-weight: bold;
            margin-top: 25px;
        }

        /* Native Paper Optimization Rules */
        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
                margin: 0;
            }
            .pv-container {
                box-shadow: none;
                padding: 15px 20px;
                max-width: 100%;
            }
            th {
                background-color: #ffffff !important;
            }
        }
    </style>
<button onclick="printDiv('printSection')" class="btn btn-primary mb-3">Print PV Sheet</button>

<div class="pv-container " id="printSection">

    <div class="header-section">
        <div class="logo-placeholder">OFPPT</div>
        <div class="institute-name">INSTITUT SPECIALISE DE TECHNOLOGIE APPLIQUEE HAY AL ADARISSA FES</div>
        <div class="academic-year">Année de Formation : 2025/2026</div>
        <div class="pv-title">PV de Présence Contrôle Continu</div>
    </div>

    <div class="module-field">
        Intitulé du Module : <span class="dots-line">........................................................................................................................</span>
    </div>

    <table class="meta-table">
        <thead>
            <tr>
                <th>Filière / Groupe</th>
                <th>Epreuve</th>
                <th>Date</th>
                <th>Heure de démarrage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-weight: bold;">DOWFS 203</td>
                <td>Théorique</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table class="students-table">
        <thead>
            <tr>
                <th class="col-id">N°</th>
                <th class="col-cef">CEF</th>
                <th class="col-name">Nom et prénom</th>
                <th class="col-sign1">Emargement au démarrage de l'épreuve</th>
                <th class="col-sign2">Emargement à la fin de l'épreuve</th>
                <th class="col-obs">Observation</th>
            </tr>
        </thead>
        <tbody>
            <tr><td class="center-text">1</td><td class="center-text">2005092800161</td><td>AMIRACHE SOUFYANE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">2</td><td class="center-text">2007010200182</td><td>BELAOULA LAILA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">3</td><td class="center-text">2002081000515</td><td>BEN YOUNES ANASS</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">4</td><td class="center-text">2002112600451</td><td>BENACHER SOFIYANE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">5</td><td class="center-text">2006010200376</td><td>BENHADDOU ZINEB</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">6</td><td class="center-text">2005080100177</td><td>BENNANI GABSI MOHAMED</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">7</td><td class="center-text">2006010800125</td><td>CHINOUN MOHAMED</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">8</td><td class="center-text">2002082300399</td><td>EL BOUCHRIFI OUSSAMA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">9</td><td class="center-text">2003021500502</td><td>EL BSIR MERYEM</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">10</td><td class="center-text">2004043000351</td><td>EL MOUSSAOUI MEHDI</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">11</td><td class="center-text">2006091700125</td><td>EL-ABBADI HALA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">12</td><td class="center-text">2004110800336</td><td>EL-ASRI FATIMA ZAHRAE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">13</td><td class="center-text">2006052500146</td><td>EL-JAZOULI HAFSA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">14</td><td class="center-text">2006101000209</td><td>ELJOKH AYA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">15</td><td class="center-text">2005061500203</td><td>ESSAKHI MOSTAFA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">16</td><td class="center-text">2005111500342</td><td>EZZAAT ACHRAF</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">17</td><td class="center-text">2005101700288</td><td>GOUJJAN MOHAMMED</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">18</td><td class="center-text">2000112000678</td><td>LAKHAL KHALID</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">19</td><td class="center-text">2006010100867</td><td>LAROUSSI AMINE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">20</td><td class="center-text">2007012900144</td><td>MOUDDAN ASMAE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">21</td><td class="center-text">2006092400134</td><td>RACHIK AYOUB</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">22</td><td class="center-text">2005051300140</td><td>SAMSAR SANAE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">23</td><td class="center-text">2002051000499</td><td>ZOUMI MOHAMMED</td><td></td><td></td><td></td></tr>
        </tbody>
    </table>

    <table class="examiner-table">
        <thead>
            <tr>
                <th style="width: 25%;">Matricule / CIN</th>
                <th style="width: 50%;">Nom et Prénom</th>
                <th style="width: 25%;">Emargement</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="footer-copies-count">
        Nombre de copies : <span class="dots-line">...................................................</span>
    </div>

</div>

function printDiv(divId) {
    // Get the HTML content inside your container
    const printContents = document.getElementById(divId).innerHTML;
    
    // Create a temporary iframe element
    const iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.width = '0px';
    iframe.style.height = '0px';
    iframe.style.border = 'none';
    
    document.body.appendChild(iframe);
    
    const doc = iframe.contentWindow.document;
    
    // Open the document stream and inject the content along with necessary styles
    doc.open();
    doc.write(`
        
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; color: #000; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px; }
                th, td { border: 1px solid #000; padding: 6px 8px; text-align: left; }
                th { background-color: #fcfcfc; font-weight: bold; text-align: center; }
                .center-text { text-align: center; }
                .header-section { text-align: center; margin-bottom: 25px; }
                .institute-name { font-weight: bold; font-size: 14px; }
                .pv-title { font-weight: bold; margin-top: 10px; font-size: 15px; }
                .module-field, .footer-copies-count { font-weight: bold; margin-top: 15px; }
                .examiner-table td { height: 60px; }
                
                /* Specific widths matching your design */
                .col-id { width: 4%; }
                .col-cef { width: 14%; }
                .col-name { width: 32%; }
                @media print { th { background-color: #fff !important; } }
            </style>
        
            ${printContents}
        
    `);
    doc.close();
    
    // Wait for content loading to process layout before firing printer prompt
    setTimeout(() => {
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
        // Remove the temporary element after printing dialog is managed
        document.body.removeChild(iframe);
    }, 500);
}

@endsection --}}


@extends('layout.app')

@section('content')

    <style>
        /* Base page look for web viewing */
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            color: #000000;
        }

        .pv-container {
            background-color: #ffffff;
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 35px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Top Institutional Header Elements */
        .header-section {
            text-align: center;
            margin-bottom: 25px;
            position: relative;
        }

        .logo-placeholder {
            font-size: 0.85rem;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .institute-name {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .academic-year {
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .pv-title {
            font-size: 1.05rem;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Module Metadata Field */
        .module-field {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .dots-line {
            font-weight: normal;
            letter-spacing: 1.5px;
            color: #555555;
        }

        /* General Table Framework Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000000;
            padding: 7px 8px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #fcfcfc;
            font-weight: bold;
            text-align: center;
        }

        /* Specific Metadata Top Table Config */
        .meta-table th {
            width: 25%;
        }
        .meta-table td {
            height: 24px;
            text-align: center;
        }

        /* Main Trainee List Table Layout Column Sizes */
        .students-table th {
            padding: 10px 5px;
        }

        .col-id { width: 4%; text-align: center; }
        .col-cef { width: 14%; text-align: center; }
        .col-name { width: 32%; }
        .col-sign1 { width: 20%; }
        .col-sign2 { width: 18%; }
        .col-obs { width: 12%; }

        .center-text {
            text-align: center;
        }

        /* Bottom Footer / Examiner Meta Fields */
        .examiner-table th {
            padding: 6px;
        }
        .examiner-table td {
            height: 75px; 
        }

        .footer-copies-count {
            font-size: 1rem;
            font-weight: bold;
            margin-top: 25px;
        }

        /* Native Paper Optimization Rules */
        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
                margin: 0;
            }
            .pv-container {
                box-shadow: none;
                padding: 15px 20px;
                max-width: 100%;
            }
            th {
                background-color: #ffffff !important;
            }
        }
    </style>

<button onclick="printDiv('printSection')" class="btn btn-primary mb-3">
    <i class="bi bi-printer"></i> Print PV Sheet
</button>

<div class="pv-container" id="printSection">

    <div class="header-section">
        <div class="logo-placeholder">OFPPT</div>
        <div class="institute-name">INSTITUT SPECIALISE DE TECHNOLOGIE APPLIQUEE HAY AL ADARISSA FES</div>
        <div class="academic-year">Année de Formation : 2025/2026</div>
        <div class="pv-title">PV de Présence Contrôle Continu</div>
    </div>

    <div class="module-field">
        Intitulé du Module : <span class="dots-line">........................................................................................................................</span>
    </div>

    <table class="meta-table">
        <thead>
            <tr>
                <th>Filière / Groupe</th>
                <th>Epreuve</th>
                <th>Date</th>
                <th>Heure de démarrage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-weight: bold;">DOWFS 203</td>
                <td>Théorique</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table class="students-table">
        <thead>
            <tr>
                <th class="col-id">N°</th>
                <th class="col-cef">CEF</th>
                <th class="col-name">Nom et prénom</th>
                <th class="col-sign1">Emargement au démarrage de l'épreuve</th>
                <th class="col-sign2">Emargement à la fin de l'épreuve</th>
                <th class="col-obs">Observation</th>
            </tr>
        </thead>
        <tbody>
            <tr><td class="center-text">1</td><td class="center-text">2005092800161</td><td>AMIRACHE SOUFYANE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">2</td><td class="center-text">2007010200182</td><td>BELAOULA LAILA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">3</td><td class="center-text">2002081000515</td><td>BEN YOUNES ANASS</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">4</td><td class="center-text">2002112600451</td><td>BENACHER SOFIYANE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">5</td><td class="center-text">2006010200376</td><td>BENHADDOU ZINEB</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">6</td><td class="center-text">2005080100177</td><td>BENNANI GABSI MOHAMED</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">7</td><td class="center-text">2006010800125</td><td>CHINOUN MOHAMED</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">8</td><td class="center-text">2002082300399</td><td>EL BOUCHRIFI OUSSAMA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">9</td><td class="center-text">2003021500502</td><td>EL BSIR MERYEM</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">10</td><td class="center-text">2004043000351</td><td>EL MOUSSAOUI MEHDI</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">11</td><td class="center-text">2006091700125</td><td>EL-ABBADI HALA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">12</td><td class="center-text">2004110800336</td><td>EL-ASRI FATIMA ZAHRAE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">13</td><td class="center-text">2006052500146</td><td>EL-JAZOULI HAFSA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">14</td><td class="center-text">2006101000209</td><td>ELJOKH AYA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">15</td><td class="center-text">2005061500203</td><td>ESSAKHI MOSTAFA</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">16</td><td class="center-text">2005111500342</td><td>EZZAAT ACHRAF</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">17</td><td class="center-text">2005101700288</td><td>GOUJJAN MOHAMMED</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">18</td><td class="center-text">2000112000678</td><td>LAKHAL KHALID</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">19</td><td class="center-text">2006010100867</td><td>LAROUSSI AMINE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">20</td><td class="center-text">2007012900144</td><td>MOUDDAN ASMAE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">21</td><td class="center-text">2006092400134</td><td>RACHIK AYOUB</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">22</td><td class="center-text">2005051300140</td><td>SAMSAR SANAE</td><td></td><td></td><td></td></tr>
            <tr><td class="center-text">23</td><td class="center-text">2002051000499</td><td>ZOUMI MOHAMMED</td><td></td><td></td><td></td></tr>
        </tbody>
    </table>

    <table class="examiner-table">
        <thead>
            <tr>
                <th style="width: 25%;">Matricule / CIN</th>
                <th style="width: 50%;">Nom et Prénom</th>
                <th style="width: 25%;">Emargement</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="footer-copies-count">
        Nombre de copies : <span class="dots-line">...................................................</span>
    </div>

</div>

<script>
function printDiv(divId) {
    const printContents = document.getElementById(divId).innerHTML;
    const iframe = document.createElement('iframe');
    
    // Hide iframe securely from display layouts
    iframe.style.position = 'absolute';
    iframe.style.width = '0px';
    iframe.style.height = '0px';
    iframe.style.border = 'none';
    
    document.body.appendChild(iframe);
    
    const doc = iframe.contentWindow.document;
    
    doc.open();
    doc.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Print PV Sheet</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 30px; color: #000; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px; }
                th, td { border: 1px solid #000; padding: 7px 8px; text-align: left; vertical-align: middle; }
                th { background-color: #fcfcfc; font-weight: bold; text-align: center; }
                .center-text { text-align: center; }
                .header-section { text-align: center; margin-bottom: 25px; }
                .institute-name { font-weight: bold; font-size: 14px; }
                .academic-year { font-size: 13px; margin-bottom: 4px; }
                .pv-title { font-weight: bold; margin-top: 10px; font-size: 15px; }
                .module-field, .footer-copies-count { font-weight: bold; margin-top: 15px; }
                .examiner-table td { height: 75px; }
                
                /* Layout structural widths */
                .col-id { width: 4%; }
                .col-cef { width: 14%; }
                .col-name { width: 32%; }
                .col-sign1 { width: 20%; }
                .col-sign2 { width: 18%; }
                .col-obs { width: 12%; }
                @media print { th { background-color: #fff !important; } }
            </style>
        </head>
        <body>
            <div class="pv-container">
                ${printContents}
            </div>
        </body>
        </html>
    `);
    doc.close();
    
    // Slight pause to ensure styling elements render safely inside the frame context
    setTimeout(() => {
        iframe.contentWindow.focus();
        iframe.contentWindow.print();
        document.body.removeChild(iframe);
    }, 400);
}
</script>

@endsection