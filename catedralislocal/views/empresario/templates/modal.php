  <!-- Feedback Modal-->
  <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header bg-gradient-primary-to-secondary p-4">
                  <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Agregar empleados</h5>
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
                  <form id="contactForm" action="<?php echo constant("URL");?>Empresario/agregarEmpleado" method="POST" >
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nombre" name="nombre" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese Nombre completo</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="correo" id="correo" type="email"
                                placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Ingrese el correo electronico</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="telefono" id="telefono" type="tel"
                                placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Ingresa un numero telefonico</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="usuario" id="usuario" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese un nombre de usuario</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" name="contrasenia" id="contrasenia" type="password"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese una contraseña</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                      
                      
                        <div class="d-grid"><input class="btn btn-primary rounded-pill btn-lg" id="submitButton"
                                type="submit" /></div>
                    </form>
                 
              </div>
          </div>
      </div>
  </div>