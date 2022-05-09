  <!-- Feedback Modal-->
  <div class="modal fade" id="feedbackVerEvento" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header bg-gradient-primary-to-secondary p-4">
                  <h5 class="modal-title font-alt text-white" id="vertituloevento"></h5>
                  <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body border-0 p-4">
                  <div id="containerver" style="display: none;">
                      <h4>descripcion:</h4>
                      <p id="lbldescripcion"></p>
                      <h4>fecha inicio:</h4>
                      <p id="lblfechaini"></p>
                      <h4>fecha Fin:</h4>
                      <p id="lblfechafin"></p>
                      <h4>Categoria:</h4>
                      <p id="lblcategoria"></p>
                  </div>
                  <form id="formmodificarevento" action="<?php echo constant("URL");?>Empresario/modificarEvento"
                      method="POST" style="display: none;">
                      <!-- Name input-->
                      <input  id="ideventomodi" name="ideventomodi" type="hidden" />
                      <div class="form-floating mb-3">
                          <input class="form-control" id="tituloeventomodi" name="tituloevento" type="text"
                              placeholder="Enter your name..." data-sb-validations="required" />
                          <label for="name">Ingrese titulo del evento</label>
                          <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                      </div>
                      <!-- Email address input-->
                      <div class="form-floating mb-3">
                          <textarea class="form-control" name="descripcionevento" id="descripcioneventomodi" type="text"
                              placeholder="Enter your message here..." style="height: 10rem"
                              data-sb-validations="required"></textarea>
                          <label for="message">Descripcion del evento</label>
                          <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                      </div>
                      <!-- Phone number input-->
                      <div class="form-floating mb-3">
                          <input class="form-control" name="inicioevento" id="inicioeventomodi" type="datetime-local"
                              placeholder="(123) 456-7890" data-sb-validations="required" />
                          <label for="phone">Fecha de inicio del evento</label>
                          <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                          </div>
                      </div>
                      <!-- Message input-->
                      <div class="form-floating mb-3">
                          <input class="form-control" name="finevento" id="fineventomodi" type="datetime-local"
                              placeholder="(123) 456-7890" data-sb-validations="required" />
                          <label for="phone">Fecha de finalizacion del evento</label>
                          <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                          </div>
                      </div>

                      <div class="form-floating mb-3">
                          <select class="form-control" name="categoriaevento" id="categoriaeventomodi">
                              <?php
                                foreach($this->listaCategorias as $lista ){
                                    ?>
                              <option value="<?php echo $lista->getIdCategoria(); ?>">
                                  <?php echo $lista->getCategoria(); ?></option>
                              <?php
                                }
                                ?>
                          </select>
                          <label for="name">Asigne una categoria</label>
                          <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                      </div>



                  </form>
                  <hr>
                  <div>
                      <div id="btnmodificarevento">
                          <button class="btn btn-primary" onclick="modificar()">Modificar</button>
                          <a class="btn btn-danger" onclick="eliminarbtn()">Eliminar</a>
                      </div>
                      <div id="btnenviarevento" style="display: none;">
                          <button class="btn btn-primary"   form="formmodificarevento">Enviar</button>
                          <button class="btn btn-warning" onclick="cancelar()" id="btncancelar">cancelar</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>