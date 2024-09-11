@extends('layoutsFourniseur.master')
@section('titre')
Listes Payment
@endsection
@section('contenue')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                  <!-- Page-body start -->
                  <div class="page-body">
                    <!-- Inverse table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Listes Du payment</h5>
                            <div
                                class="card-header-right">
                                <ul
                                    class="list-unstyled card-option">
                                    <li><i
                                            class="icofont icofont-simple-left "></i></li>
                                    <li><i
                                            class="icofont icofont-maximize full-card"></i></li>
                                    <li><i
                                            class="icofont icofont-minus minimize-card"></i></li>
                                    <li><i
                                            class="icofont icofont-refresh reload-card"></i></li>
                                    <li><i
                                            class="icofont icofont-error close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="card-block table-border-style">
                            <div
                                class="table-responsive">
                                <table
                                    class="table table-inverse">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>date de payment</th>
                                            <th>Mois</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tr">
                                        @if ($hotels)
                                        @foreach ($payment_fournisseurs  as $payment_fournisseur)
                                        <tr >
                                            <th
                                                scope="row">{{ $payment_fournisseur->id_pf }}</th>
                                            <td>{{ $payment_fournisseur->mois_paye }}</td>
                                            <td>{{ $payment_fournisseur->created_at }}</td>


                                        </tr>

                                        @endforeach

                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Inverse table card end -->

                </div>
                <!-- Page-body end -->

                <input type="text" id="inputDateInscription" value="{{ $hotels->created_at }}">
               <script>
                let tr = document.querySelector('.tr');
                if (!tr.children[0]) {
                    let inputDateInscription = document.querySelector('#inputDateInscription');
                    let tabInputDate = inputDateInscription.value.split('-');
                    console.log(tabInputDate);
                    let tabInputDernier = tabInputDate[2].split(' ');
                    console.log(tabInputDernier);

                    let jour = tabInputDernier[0];
                    let mois = tabInputDate[1];
                    let ans = tabInputDate[0];
                    console.log(jour,mois,ans);
                    let date_payer =document.querySelector('.date_payer');
                    function dateReboure() {
                        const d = new Date();
                        jourNow =d.getDate();
                        moisNow =d.getMonth() + 1;
                        ansNow =d.getFullYear();
                    //    console.log(jourNow);
                       let intMois = +(mois);
                       let intJour = +(jour);
                       let intAns = +(ans);
                       if (intMois < 12) {
                           intMois = intMois+1;
                           if (intMois == 1) {
                              if (intJour < 31) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 2;
                              }
                           }else if (intMois == 2) {
                             if (intJour < 28) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 3;
                              }
                           }else if (intMois == 3) {
                            if (intJour < 31) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 4;
                              }
                           }else if (intMois == 4) {
                            if (intJour < 30) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 5;
                              }
                           }else if (intMois == 5) {
                             if (intJour < 31) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 6;
                              }
                           }else if (intMois==6) {
                               if (intJour < 30) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 7;
                              }
                           }else if (intMois==7) {
                              if (intJour < 31) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 8;
                              }
                           }else if (intMois==8) {
                             if (intJour < 31) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 9;
                              }
                           }else if (intMois==9) {
                            if (intJour < 30) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 10;
                              }
                           }else if(intMois==10){
                               if (intJour < 31) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 11;
                              }
                           }else if (intMois==11) {
                             if (intJour < 30) {
                                intJour=intJour+1;
                              }else{
                                intJour=1;
                                intMois = 12;
                              }
                           }
                       }else{
                           if (intMois < 31) {
                            intJour=intJour+1;
                            intMois = intMois+1;
                           }else{
                               intJour=1;
                               intMois = 1;
                               intAns = intAns+1;
                           }
                       }

                       console.log(intJour,intMois,intAns);

                       if (intJour == jourNow && intMois == moisNow && intAns === ansNow) {

                       }
                       $zero = "0";
                       date_payer.textContent = `Date de payment : ${intJour<10?$zero.intJour:intJour}/${intMois<10?$zero+intMois:intMois}/${intAns}`
                    }
                    setInterval(() => {
                        dateReboure();
                    }, 100);

                }
               </script>

            </div>
        </div>
        <!-- Main-body end -->

        <div id="styleSelector">

        </div>
    </div>
</div>
@endsection
