paypal.Buttons({
  //set details of transaction
  createOrder: function(data, actions){
    return actions.order.create({
        purchase_units: [{
            amount:{
                value: '0.1'
            }
        }]
    }
      
    );
},
onApprove:function(data, actions){
    return actions.order.capture().then(function(details){
        alert("Successfully booked!");
        //document.bookingForm.submit();
        document.getElementById("submit_book").click(); 

    })
},
onCancel:function(data){
    alert("Failed Transaction");
}

}
  
).render('#card-input-box');
