  <!-- Feedback Modal-->
  <div class="modal fade" id="feedbackModalEventos" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header bg-gradient-primary-to-secondary p-4">
                  <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Agregar eventos</h5>
                  <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body border-0 p-4">
                 
                  <form id="contactForm" action="<?php echo constant("URL");?>Empresario/agregarEvento" method="POST" >
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="tituloevento" name="tituloevento" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese titulo del evento</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                                <textarea class="form-control" name="descripcionevento" id="descripcionevento" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Descripcion del evento</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="inicioevento" id="inicioevento" type="datetime-local"
                                placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Fecha de inicio del evento</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="finevento" id="finevento" type="datetime-local"
                                placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Fecha de finalizacion del evento</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-control" name="categoriaevento" id="categoriaevento" >
                                <?php
                                foreach($this->listaCategorias as $lista ){
                                    ?>
                                    <option value="<?php echo $lista->getIdCategoria(); ?>"><?php echo $lista->getCategoria(); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <label for="name">Asigne una categoria</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                      
                      
                        <div class="d-grid"><input class="btn btn-primary rounded-pill btn-lg" id="submitButton"
                                type="submit" /></div>
                    </form>
                 
              </div>
          </div>
      </div>
  </div>