<template>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row mt-4">
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 py-4 text-center">
                <h1>Contacto</h1>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 border-start py-4">
                <ul>
                    <li>Ildo Marques Cuema</li>
                    <li><i class="fa-brands fa-facebook fa-lg text-primary"></i> Ildocuema</li>
                    <li><i class="fa-brands fa-whatsapp fa-lg text-success"></i> +244 921 923 232</li>
                </ul>
            </div>

            <div class="form-group col-12">
                <h4>Envie-nos um e-mail</h4>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="E-mail" aria-label="E-mail"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comentario</label>
                    </div>
                </form>

                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary text-light" type="button">
                        <i class="fa-solid fa-paper-plane"></i>
                        Enviar e-mail
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>