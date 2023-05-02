

<script>
$(document).ready(function() {
    for(i=1;i<=4;i++)
    {
      for(j=1;j<=10;j++)
      {
        <div class="col-md-2 mt-2 mb-2 ml-2 mr-2 text-center" style="background-color:grey;color:white"><input type="checkbox" id="seat" value="R'+(i+'S'+j)+'" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();" ></input>R'+(i+'S'+j)+'</div>;
      }

    }
});



function change_option(mvalue)
{

    sessionStorage.setItem("movie_id_of_option", mvalue.value);
    alert(sessionStorage.getItem('movie_id_of_option'));

   
}
 



function checkboxtotal()
{
   var seat=[];
   $('input[name="seat_chart[]"]:checked').each(function(){
       seat.push($(this).val());
   });

   var st=seat.length;
   document.getElementById('no_ticket').value=st;
   var total="Rs. "+(st*600);
   $('#price_details').text(total);

  // $('#seat_details').text(seat.join(", "));
   $('#seat_dt').val(seat.join(", "));
}

</script>

<section class="mt-5">
    <h3 class="text-center"  style="color:maroon;">Book Your Ticket Now</h3>
   <div class="container">
       <div class="row">
           <div class="col-md-7">
                <div id="seat-map" id="seatCharts">
                    <h3 class="text-center mt-5"  style="color:maroon;">Select Seat</h3>
                    <hr>
                    <label class="text-center" style="width:100%;background-color:maroon;color:white;padding:2%"> 
                        SCREEN
                    </label>

                    <div class="row" id="seat_chart">                   
                    </div>

                </div>
                <h6 class="mt-5"  style="color:maroon;">Cinema Name</h6>
                <p class="mt-1" id="cinema_name"></p>


                <h6 class="mt-3"  style="color:maroon;">Movie Show (Date and Timing)</h6>
                <p class="mt-1" id="show_date_time"></p>

                <h6 class="mt-3"  style="color:maroon;">Ticket Price</h6>
                <p class="mt-1" id="price"></p>

                <h6 class="mt-3"  style="color:maroon;">Total Ticket Price</h6>
                <p class="mt-1" id="price_details"></p>
           </div>
           <div class="col-md-5">
                <form method="post" class="mt-5">
                    <div class="container" style="color:maroon;">
                        <center>
                            <p>Please fill this form to book your ticket.</p>
                        </center>
                    <hr>
                        </div>

                        <label for="psw"><b>No. of Tickets</b></label>
                        <input type="number" style="border-radius:30px;" id="no_ticket" name="no_ticket"  required>

                        <label for="psw-repeat"><b>Seat Deatils</b></label>
                        <input type="text" style="border-radius:30px;" name="seat_dt" id="seat_dt" required>

                        <label for="number"><b>Booking Date</b></label>
                        <input type="date" style="border-radius:30px;" name="booking_date"  required>
                            
                        <button type="submit" name="btn_booking" class="btn" style="background-color:maroon;color:white;">Confirm Booking</button>
                        <hr>
                    </div>

                

                </form>
           </div>
       </div>
   </div>
</section>

