  <!-- Feedback Modal-->
  <div class="modal fade" id="feedbackModalCat" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header bg-gradient-primary-to-secondary p-4">
                  <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Agregar categorias</h5>
                  <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body border-0 p-4">
                  <!-- * * * * * * * * * * * * * * *-->
                  <!-- * * SB Forms Contact Form * *-->
                  <!-- * * * * * * * * * * * * * * *-->
                  <!-- This form is pre-integrated with SB Forms.-->
                  <!-- To make this form functional, sign up at-->
                  <!-- https://startbootstrap.com/solution/contact-forms-->
                  <!-- to get an API token!-->
                  <form id="contactForm" action="<?php echo constant("URL");?>Empresario/agregarCategoria" method="POST" >
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="titulo" name="titulo" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Titulo categoria</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating mb-3">
                                <textarea class="form-control" name="descripcion" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Descripcion de la categoria</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                      
                        <div class="d-grid"><input class="btn btn-primary rounded-pill btn-lg" id="submitButton"
                                type="submit" /></div>
                    </form>
                 
              </div>
          </div>
      </div>
  </div>