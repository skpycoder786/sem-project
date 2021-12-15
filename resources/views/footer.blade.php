

<!-- Contact and Map -->
    <section class="p-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md">
            <h2> Any Query ?</h2><br>
            <form id="Query_form" action="/action_page.php" method="get">
              <div class="mb-3">
                <input name="Name_inp" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
              </div>
              <div class="mb-3">
                <input name="Email_inp" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <textarea 
                  class="form-control" 
                  form="Query_form"
                  name="Query_inp"
                  id="exampleFormControlTextarea1" 
                  rows="3" 
                  placeholder="Write your query here">
                </textarea>
              </div>
              <button id="Query_submit_btn" type="button" class="btn btn-warning">
                <a class="ModelLink" href="#"> 
                  Submit
                </a>
              </button>  
            </form>       
          </div>
          <div class="col-md">
            <h2>Find Us Here</h2><br>
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d451.47698427302345!2d75.8071423!3d25.1419151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x18fd9a07f084bb2b!2sComputer%20Center!5e0!3m2!1sen!2sin!4v1638540508697!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div><br>
            <div id="Address" class="d-sm">
              <h6>
                <i class="material-icons IconD">&#xe55f;</i> 
                Room No.205, Computer Center, UD-RTU, Kota(Rajasthan)
              </h6>
              <h6>
                <i class="material-icons IconD">&#xe0e1;</i>
                StudentSuport@rtu.ac.in
              </h6>
              <h6>
                <i class="material-icons IconD">&#xe0b0;</i>
                0744 4586257
              </h6><br><br> 
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- Footer -->
    <footer class="p-2 mt-2 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Made with <i class="material-icons IconD">&#xe87d;</i> and 
          <a target="blank" 
            href="https://getbootstrap.com/docs/5.1/getting-started/introduction/" 
            style="text-decoration: none;" 
            class="IconD">
            Bootstrap
          </a>
        </p>
        <a href="#" class="position-absolute bottom-0 end-0 p-3">
          <i class="bi bi-arrow-up-circle h2 arrow-color"></i>
        </a>
      </div>
    </footer>