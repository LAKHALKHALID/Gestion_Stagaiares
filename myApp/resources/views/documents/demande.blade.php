@extends('layout.app')


@section('content')
    

    <style>
        /* Global Page Styling for Screen Viewing */
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            /* padding: 40px 20px; */
            color: #111111;
            line-height: 1.6;
        }

        .document-container {
            background-color: #ffffff;
            max-width: 820px;
            /* margin: 0 auto; */
            padding: 30px 70px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 4px;
            position: relative;
            box-sizing: border-box;
        }

        /* Header / Logo Style */
        .header-logo {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .header-logo .arabic-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .header-logo .ofppt-main {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }

        .header-logo .french-sub {
            font-size: 0.85rem;
            color: #444444;
        }

        .institute-title {
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 40px;
            border-bottom: 1px solid #111111;
            padding-bottom: 10px;
        }

        /* Date & Recipient Destination (Shifted Right) */
        .recipient-block {
            margin-left: auto;
            max-width: 320px;
            text-align: left;
            margin-bottom: 40px;
            padding-right: 20px;
        }

        .recipient-block .date-line {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .recipient-block .dots-line {
            letter-spacing: 2px;
            color: #666666;
        }

        /* Reference & Object metadata */
        .meta-info {
            margin-bottom: 30px;
            font-size: 1.05rem;
        }

        .meta-info p {
            margin: 6px 0;
        }

        /* Main Body Content */
        .salutation {
            font-weight: normal;
            margin-bottom: 15px;
            font-size: 1.05rem;
        }

        .content-paragraph {
                text-align: justify;
                text-justify: inter-word;
                margin-bottom: 25px;
                font-size: 15px;
                

        }

        /* Student Specific Credentials */
        .student-credentials {
            margin: 30px 0;
            font-size: 1.05rem;
        }

        .student-credentials p {
            margin: 10px 0;
        }

        /* Highlighted Centered Date Range */
        .date-range-box {
            text-align: center;
            font-size: 1.1rem;
            margin: 30px 0;
        }

        .fw-bold {
            font-weight: bold;
        }

        /* Footer Layout Structure */
        .footer-container {
            margin-top: 20px;
            border-top: 1px solid #dddddd;
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: #444444;
        }

        .footer-left {
            width: 35%;
            font-weight: bold;
        }

        .footer-right {
            width: 60%;
            text-align: center;
            line-height: 1.5;
        }

        .footer-right .comp-title {
            font-weight: bold;
            color: #111111;
            font-size: 0.85rem;
            margin-bottom: 4px;
        }

        /* Clean Layout Settings for Direct Printing */
        @media print {
            body {
                background-color: #ffffff;
                padding: 0;
                margin: 0;
            }
            .document-container {
                box-shadow: none;
                padding: 40px 50px;
                max-width: 100%;
            }
            .footer-container {
                position: absolute;
                bottom: 40px;
                left: 50px;
                right: 50px;
            }
        }
    </style>


<div class="document-container">

    <div class="header-logo">
        <div class="arabic-title">مكتب التكوين المهني وإنعاش الشغل</div>
        <div class="ofppt-main">OFPPT</div>
        <div class="french-sub">Office de la Formation Professionnelle et de la Promotion du Travail</div>
    </div>

    <div class="institute-title">
        INSTITUT SPECIALISE DE TECHNOLOGIE APPLIQUEE HAY AL ADARISSA FES
    </div>

    <div class="recipient-block">
        <div class="date-line">Fès, le : ...........................................</div>
        <div>Madame, Monsieur</div>
        <div class="dots-line">............................................................</div>
    </div>

    <div class="meta-info">
        <p><span class="fw-bold">Réf :</span> CFP AD / ISTA AD / {{$stagiaire->groupes[0]->nom_g}} / {{$stagiaire->cef}} / {{date('Y')}} </p>
        <p><span class="fw-bold">Objet :</span> demande de stage en milieu professionnel</p>
    </div>

    <div class="salutation">Madame, Monsieur</div>
    
    <p class="content-paragraph">
        Le stage en milieu professionnel constitue pour nos stagiaires le meilleur moyen d'adaptation aux exigences des métiers, des professions et d'insertion dans le marché du travail. C'est dans ce contexte que nous vous prions de bien vouloir accepter le(a) stagiaire :
    </p>
    @php
        $fullName = $stagiaire->nom_francais.' '.$stagiaire->prenom_francais
    @endphp
    <div class="student-credentials">
        <p class="fw-bold"><span >Nom et Prénom :</span> {{strtoupper($fullName)}} </p>
        <p class="fw-bold"><span >Filière :</span> {{$stagiaire->filieres[0]->nom_filiere_francais}} </p>
        <p class="fw-bold"><span >N° CEF :</span> {{$stagiaire->cef}} </p>
    </div>
        pour effectuer un stage au sein de votre entreprise pendant la période allant :
    </p>

    <div class="date-range-box">
        du <span class="fw-bold">21/05/2026</span> au <span class="fw-bold">21/05/2026</span>
    </div>

    <p class="content-paragraph">
        Nous rappelons que nos stagiaires seront soumis à la réglementation en vigueur dans votre entreprise, et que l'OFPPT les assure contre les risques d'accident durant la période de stage.
    </p>
    <p class="content-paragraph">
        En vous remerciant vivement de votre collaboration au développement de la qualité de la formation de nos stagiaires, nous vous prions d'agréer, Madame, Monsieur, l'expression de nos salutations distinguées.
    </p>

    <div class="footer-container">
        <div class="footer-left">
            Direction Régionale<br>
            Centre Nord
        </div>
        <div class="footer-right">
            <div class="comp-title">Complexe de Formation Professionnelle Al Adarissa</div>
            Hay Al Adarissa, Route Ain Smen, B.P. 2590 - 30 000 - Fès.<br>
            📞 (05) 35 60 19 76 — (05) 35 60 72 57 — 📠 Fax (05) 35 61 03 33
        </div>
    </div>

</div>



@endsection