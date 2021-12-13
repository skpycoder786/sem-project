function Add_OTP_div() {
    document.getElementById('GiveOTP').style.display="block";
  }

function Remove_OTP_div() {
    document.getElementById('GiveOTP').style.display="none";
  }  
  
document.addEventListener( 'DOMContentLoaded', function() {

  // for testimonial section
    var splide1 = new Splide( '.splide1',{
      type   : 'loop',
      padding: { left: 10, right: 10 },
      autoplay: true,  
    } );
    splide1.mount();

    // for developer section
    var splide2 = new Splide( '.splide2',{
      type   : 'loop',
      perPage: 2,
      perMove: 1,
      margin: { left: 50, right: 50 },
      autoplay: true,
      breakpoints: {
        800: {
          perPage: 1,
        }
      }
    } );
    splide2.mount();

} );  

