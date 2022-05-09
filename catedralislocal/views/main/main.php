<!DOCTYPE html>

<?php require "templates/head.php"; ?>


<body>
    <?php require "templates/nav.php"; ?>
    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">Organiza tus eventos empresariales.</h1>
                        <p class="lead fw-normal text-muted mb-5">Registrate ya! y organiza tus eventos de forma
                            ordenada.</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge"
                                    src="<?php echo constant("URL")?>public/assets/img/gmail.png" alt="..." /></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Masthead device mockup feature-->
                    <div class="masthead-device-mockup">
                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                <div class="screen bg-black">
                                    <!-- PUT CONTENTS HERE:-->
                                    <!-- * * This can be a video, image, or just about anything else.-->
                                    <!-- * * Set the max width of your media to 100% and the height to-->
                                    <!-- * * 100% like the demo example below.-->
                                    <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                        <source src="<?php echo constant("URL")?>public/assets/img/video.mp4"
                                            type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Quote/testimonial aside-->
    <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-4">"¡Una solución intuitiva a un problema común que todos
                        enfrentamos, envuelto en una sola aplicación!"</div>
                    <img src="<?php echo constant("URL")?>public/assets/img/tnw-logo.svg" alt="..."
                        style="height: 3rem" />
                </div>
            </div>
        </div>
    </aside>
    <!-- App features section-->
    <section id="features">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Diseño responsivo</h3>
                                    <p class="text-muted mb-0">Adaptable a todos los dispositivos.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-archive icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Guarda informacion</h3>
                                    <p class="text-muted mb-0">Podras guardar en un solo lugar toda la informacion.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Uso gratuito</h3>
                                    <p class="text-muted mb-0">Puedes utilizar todos nuestros servicio de forma gratuita
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Facil verificacion</h3>
                                    <p class="text-muted mb-0">Registro inmediato, sin tantas vueltas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-0">
                    <!-- Features section device mockup-->
                    <div class="features-device-mockup">
                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                <div class="screen bg-black">
                                    <!-- PUT CONTENTS HERE:-->
                                    <!-- * * This can be a video, image, or just about anything else.-->
                                    <!-- * * Set the max width of your media to 100% and the height to-->
                                    <!-- * * 100% like the demo example below.-->
                                    <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                        <source src="<?php echo constant("URL")?>public/assets/img/video.mp4"
                                            type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic features section-->
    <section class="bg-light">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <h2 class="display-4 lh-1 mb-4">Especifica las fechas</h2>
                    <p class="lead fw-normal text-muted mb-5 mb-lg-0">Ahora podras organizar de mejor manera los eventos
                        laborales internos de tu empresa u organizacion. No volveras a olvidar una fecha y tampoco tus
                        empleados.</p>
                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle"
                            src="<?php echo constant("URL")?>public/assets/img/calendar.jpg" alt="..." /></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to action section-->
    <section class="cta" id="download">
        <div class="cta-content">
            <div class="container px-5">
                <h2 class="text-white display-1 lh-1 mb-4">
                    Deja los papeles antiguos.
                    <br />
                    Organiza en la nueva era digital.
                </h2>
                <div class="modal-body border-0 p-4 w-50 p-3">
                    <form id="contactForm" action="<?php echo constant("URL");?>Main/agregarEmpresario" method="POST" enctype="multipart/form-data">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="nombre" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese Nombre completo</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="correo" id="email" type="email"
                                placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Ingrese el correo electronico</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="telefono" id="phone" type="tel"
                                placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Ingresa un numero telefonico</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="usuario" id="name" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese un nombre de usuario</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" name="contrasenia" id="name" type="password"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese una contraseña</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="organizacion" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Ingrese el nombre de su organización</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class=" mb-3">
                        <label for="phone" style="color: white;">Logo de la organizacion</label>
                            <input class="form-control" name="archivo" id="phone" type="file"
                                data-sb-validations="required" />
                           
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                                <textarea class="form-control" name="descripcion" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Descripcion de la organizacion</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->

                        <div class="d-grid"><input class="btn btn-primary rounded-pill btn-lg" id="submitButton"
                                type="submit" /></div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <?php require "templates/footer.php"; ?>
</body>




<?php require "templates/modal.php"; ?>
<script>
            <?php if(isset($this->exito)){
               echo "alertify.success('$this->exito')";
            } ?>
            <?php if(isset($this->fracaso)){
               echo "alertify.error('$this->fracaso')";
            } ?>
</script>

</html>