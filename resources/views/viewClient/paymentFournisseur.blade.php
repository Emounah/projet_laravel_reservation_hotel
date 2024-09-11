@extends('layoutsClient.master')
@section('titre')
Page de payment Fournisseur
@endsection
@section('contenue')
<section class="section_container">
    <div class="containere">
        <form action="{{ Route('ajoutFournisseurPayer') }}" method="post" id="validationForm">
          @csrf
            <div class="form">
                <h2>Payment Fournisseur</h2>
                <p class="sms"></p>
                @if (isset($error))
                <p>
                    {{  $error }}
                </p>

                @endif
                @if ($errors)
                <p class="sms" style="color:red;">
                    @foreach ($errors->all() as $item)
                            {{ $item }}
                    @endforeach
                </p>
                @endif

                @if (isset($message))
                <p style="color:red;">
                    {{ $message }}
                </p>
                @endif
                <div class="form_block">
                    <div class="inputBox">
                        <input type="text" name="nom" required="required" id="firstname">
                        <i class="fas fa-user"></i>
                        <span>Nom</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenom" required="required" id="name">
                        <i class="far fa-user"></i>
                        <span>Prénom</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="text" name="adresse" required="required" id="adresse">
                        <i class="fas fa-user"></i>
                        <span>Adresse</span>
                    </div>
                    <div class="inputBox">
                        <input type="month" required="required" id="card-expiry-month">
                        <i class="far fa-user"></i>
                        <span class="inputDate">Mois d'expiration</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="number" required="required" id="card-expiry-year">
                        <i class="fas fa-user"></i>
                        <span>Année d'expiration</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" required="required" id="card-name">
                        <i class="far fa-user"></i>
                        <span>Nom du carte</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="text" required="required" id="card-number">
                        <i class="far fa-envelope"></i>
                        <span>Numero de carte</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" required="required" id="card-cvc">
                        <i class="far fa-user"></i>
                        <span>CVC</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="hidden" name="stripeToken" id="tokenkey">
                    </div>
                </div>

                <div class="inputBox inputBoxSubmit">
                    <input type="submit" id="button-pay"  value="Payer">
                </div>
                <p><i class="fas fa-arrow-right"></i> <a href="inscriptionFournisseur.html" class="login">Retour</a>
                </p>
            </div>
        </form>

    </div>
</section>

<script src="https://js.stripe.com/v2/"></script>
<script>
  Stripe.setPublishableKey('pk_test_51MsiE8JzTh5SguAcdq8WVsEsKTk6dN8TFBXTl3tIbxq467f6Efv2DMDIigmHQ5Cs6eJb9Oy1WuufVjTnwfCvbn5F00WAdJ4M30');//clé public no atao eto

  let form = document.querySelector('#validationForm')
  let submits = document.querySelector("#button-pay")


 submits.addEventListener("click", (e) => {
    e.preventDefault();


  let exp_mm_yyyy = document.querySelector("#card-expiry-month").value;
  let mm = exp_mm_yyyy.split("-")[1];

  let btns = document.querySelectorAll('button');
  btns.forEach(btn => {
      btn.disabled = true;
  });

  console.log(`
  number: ${document.querySelector("#card-number").value},
  cvc: ${document.querySelector("#card-cvc").value},
  exp_month: ${mm},
  exp_year: ${document.querySelector("#card-expiry-year").value},
  name: ${document.querySelector("#card-name").value}
  `)


  Stripe.createToken({
      number: document.querySelector("#card-number").value,
      cvc: document.querySelector("#card-cvc").value,
      exp_month: mm,
      exp_year: document.querySelector("#card-expiry-year").value,
      name: document.querySelector("#card-name").value
  }, stripeResponseHandler);
});

function stripeResponseHandler(satuts,response) {

  if (response.error) {

      document.querySelector('.sms').textContent = response.error.message;
      let btns = document.querySelectorAll('button');
      btns.forEach(btn => {
          btn.disabled = false;
      });
  } else {

    console.log(response.id);
    document.querySelector("#tokenkey").value = response.id
    document.querySelector("#validationForm").submit();
  }
}
</script>
@endsection
