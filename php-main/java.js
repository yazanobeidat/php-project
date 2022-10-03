
  function IsEmpty() {
    if (document.forms['frm'].firstname.value === "") {
        document.getElementById("full").style.borderBlockColor="red"
        document.getElementById("nameerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].firstname.value
    }
    if (document.forms['frm'].email.value === "") {
        document.getElementById("emaillabel").style.borderBlockColor="red"
        document.getElementById("emailerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].email.value
    }
    if (document.forms['frm'].address.value === "") {
        document.getElementById("addresslabel").style.borderBlockColor="red"
        document.getElementById("addresserror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].address.value
    }

    if (document.forms['frm'].city.value === "") {
        document.getElementById("citylabel").style.borderBlockColor="red"
        document.getElementById("cityerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].city.value
    }

    if (document.forms['frm'].state.value === "") {
        document.getElementById("statelabel").style.borderBlockColor="red"
        document.getElementById("stateerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].state.value
    }

    if (document.forms['frm'].zip.value === "") {
        document.getElementById("ziplabel").style.borderBlockColor="red"
        document.getElementById("ziperror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].zip.value
    }
    if (document.forms['frm'].cname.value === "") {
        document.getElementById("cnamelabel").style.borderBlockColor="red"
        document.getElementById("cnameerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].cname.value
    }
    if (document.forms['frm'].ccnum.value === "") {
        document.getElementById("ccnumlabel").style.borderBlockColor="red"
        document.getElementById("ccnumerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].ccnum.value
    }

    if (document.forms['frm'].expmonth.value === "") {
        document.getElementById("expmonthlabel").style.borderBlockColor="red"
        document.getElementById("expmontherror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].expmonth.value
    }

    if (document.forms['frm'].expyear.value === "") {
        document.getElementById("expyearlabel").style.borderBlockColor="red"
        document.getElementById("expyearerror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].expyear.value
    }


    if (document.forms['frm'].cvv.value === "") {
        document.getElementById("cvvlabel").style.borderBlockColor="red"
        document.getElementById("cvverror").innerHTML='<i class="fa fa-exclamation-triangle"</i>; "This field is required.';
    //   return false;
        let email=document.forms['frm'].cvv.value
    }



    else{
        window.open("index.php");
        alert ("Your order has been successfully sent");
    }




}