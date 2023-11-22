<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulário Mamutes</title>
    <link rel="icon" href="images\mamute-png.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@1,200;1,900&family=Ubuntu:wght@300&display=swap"
      rel="stylesheet"
    />

    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('https://www.ironberg.com.br/assets/images/ironberg-sp-12.jpeg');
            background-size: cover;
            background-position: center center;
        }
        .step {
            display: none;
        }
        .display-4 {
            font-family: "Montserrat", sans-serif;
            font-weight: bold;
        }
        label {
            font-family: "Montserrat", sans-serif;
        }
        #step2 {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-12 col-md-6 d-none d-md-flex bg-image"></div>

            <!-- The content half -->
            <div class="col-12 col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <!-- Step 1 -->
                                <form id="contactForm" class="mt-3" action="send_email.php" method="post" enctype="multipart/form-data">
                                    <div class="step" id="step1">
                                        <h3 class="display-4">Cadastro</h3>
                                        <div class="form-group">
                                            <label for="name">Nome Completo</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="surname">Peso/Altura</label>
                                            <input type="text" class="form-control" id="surname" name="surname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="age">Idade</label>
                                            <input type="text" class="form-control" id="age" name="age" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Número de telefone (WhatsApp)</label>
                                            <input type="text" class="form-control" id="experience" name="experience" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="file">Foto</label>
                                            <input type="file" class="form-control-file" id="file" name="file" accept="image/*" required>
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="goBack1">Voltar</button>
                                        <button type="button" class="btn btn-danger" id="nextButton1">Próximo</button>
                                    </div>

                                    <!-- Step 2 -->
                                    <div class="step" id="step2">
                                        <h3 class="display-4"> QR Code</h3>
                                        <p class="text-muted mb-4">Escaneie o QR code do código PIX para proceder.</p>
                                        <img class="mb-3" src="https://randomqr.com/assets/images/randomqr-256.png" alt="QR Code" id="qrCode">
                                        <button type="button" class="btn btn-secondary" id="goBack2">Voltar</button>
                                        <button type="button" class="btn btn-danger" id="nextButton2">Próximo</button>
                                    </div>

                                    <!-- Step 3 -->
                                    <div class="step" id="step3">
                                        <h3 class="display-4">Comprovante</h3>
                                        <p class="text-muted mb-4">Confirmation message goes here.</p>
                                        <div class="form-group">
                                            <label for="recibo">Print do comprovante</label>
                                            <input type="file" class="form-control-file" id="recibo" name="recibo" accept="image/*" required>
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="goBack3">Voltar</button>
                                        <button type="submit" class="btn btn-danger" id="submitButton">Finalizar a Assinatura</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- ... Your HTML code above ... -->

    <script>
        var step = 1;

        // Show the first step initially
        document.getElementById("step1").style.display = "block";

        // Step 1: Hide step 1 and show step 2 when "Next" button 1 is clicked
        document.getElementById("nextButton1").addEventListener("click", function() {
            if (validateStep1()) {
                document.getElementById("step1").style.display = "none";
                document.getElementById("step2").style.display = "block";
                step = 2;
            }
        });

        // Step 2: Hide step 2 and show step 3 when "Next" button 2 is clicked
        document.getElementById("nextButton2").addEventListener("click", function() {
            document.getElementById("step2").style.display = "none";
            document.getElementById("step3").style.display = "block";
            step = 3;
        });

        // "Go Back" button 1
        document.getElementById("goBack1").addEventListener("click", function() {
            window.location.href = "index";
        });

        // "Go Back" button 2
        document.getElementById("goBack2").addEventListener("click", function() {
            document.getElementById("step1").style.display = "block";
            document.getElementById("step2").style.display = "none";
            step = 2;
        });

        // "Go Back" button 3
        document.getElementById("goBack3").addEventListener("click", function() {
            document.getElementById("step2").style.display = "block";
            document.getElementById("step3").style.display = "none";
            step = 2;
        });


        function validateStep1() {
            var name = document.getElementById("name").value;
            var surname = document.getElementById("surname").value;
            var age = document.getElementById("age").value;
            var experience = document.getElementById("experience").value;
            var file = document.getElementById("file").value;

            if (name === "") {
                alert("Nome Completo é obrigatório.");
                return false;
            }

            if (surname === "") {
                alert("Peso/Altura é obrigatório.");
                return false;
            }

            if (age === "") {
                alert("Idade é obrigatório.");
                return false;
            }

            if (experience === "") {
                alert("Número de telefone (WhatsApp) é obrigatório.");
                return false;
            }

            if (file === "") {
                alert("Você deve fazer o upload de uma foto 3x4.");
                return false;
            }

            return true;
        }
    </script>

</body>
</html>
